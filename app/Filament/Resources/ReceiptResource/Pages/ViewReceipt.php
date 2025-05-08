<?php

namespace App\Filament\Resources\ReceiptResource\Pages;

use Exception;
use App\Models\Receipt;
use Illuminate\Support\Str;
use NumberToWords\NumberToWords;
use Filament\Resources\Pages\Page;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Log;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\File;
use Filament\Notifications\Notification;
use Spatie\LaravelPdf\Enums\Orientation;
use App\Filament\Resources\ReceiptResource;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ViewReceipt extends Page
{
    protected static string $resource = ReceiptResource::class;

    protected static string $view = 'filament.resources.receipt-resource.pages.view-receipt';

    public $receipt;
    public $amountInWords;

    public function mount($record)
    {
        $this->receipt = Receipt::findOrFail($record);

        try {
            // Convert amount to words
            $this->amountInWords = $this->convertAmountToWords($this->receipt->amount);
        } catch (\Exception $e) {
            Log::error('Error converting amount to words: ' . $e->getMessage());
            $this->amountInWords = 'Amount in words not available';
        }
    }

    /**
     * Download receipt as PDF
     */
    public function downloadPdf()
    {
        try {
            // Logo path debugging
            $logoPath = public_path('img/devcentric_logo.png');
            Log::info('Looking for logo at path: ' . $logoPath);
            if (!File::exists($logoPath)) {
                // Try alternative paths
                $altPaths = [
                    public_path('img/devcentric_logo.png'),
                    public_path('images/devcentric_logo.png'),
                    public_path('images/devcentric_logo.png'),
                    public_path('assets/img/devcentric_logo.png'),
                    public_path('assets/images/devcentric_logo.png')
                ];

                Log::warning('Primary logo path not found. Checking alternatives...');
                foreach ($altPaths as $altPath) {
                    Log::info('Checking alternative logo path: ' . $altPath);
                    if (File::exists($altPath)) {
                        $logoPath = $altPath;
                        Log::info('Found logo at alternative path: ' . $altPath);
                        break;
                    }
                }
            }

            // Prepare company logo as base64
            $companyLogo = null;
            if (File::exists($logoPath)) {
                // Convert to base64 for reliable PDF embedding
                $logoData = base64_encode(File::get($logoPath));
                $mimeType = File::mimeType($logoPath);
                $companyLogo = "data:{$mimeType};base64,{$logoData}";
                Log::info('Logo prepared successfully', [
                    'path' => $logoPath,
                    'mime' => $mimeType,
                    'data_length' => strlen($logoData)
                ]);
            } else {
                Log::warning('Company logo file not found at any checked paths', [
                    'primary_path' => public_path('img/offical_logo_black.png'),
                    'checked_paths' => $altPaths ?? []
                ]);

                // Create a fallback text-based logo
                $companyLogo = "data:image/svg+xml;base64," . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><rect width="60" height="60" rx="30" fill="#4f46e5" opacity="0.1"/><text x="30" y="35" font-family="Arial" font-size="20" font-weight="bold" text-anchor="middle" fill="#4f46e5">DS</text></svg>');
                Log::info('Created fallback text-based logo');
            }

            // Generate QR code for verification URL
            $verifyUrl = route('verify.receipt', ['id' => $this->receipt->id]);
            $qrCodeSvg = QrCode::size(100)->generate($verifyUrl);

            // Create a unique filename
            $fileName = sprintf(
                'receipt_%s_%s.pdf',
                $this->receipt->receipt_number,
                now()->format('Ymd-His')
            );

            // Create directory if it doesn't exist
            $directory = storage_path("app/public/receipts/" . date('Y/m'));
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            $filePath = $directory . '/' . $fileName;

            try {
                // Generate PDF using Spatie PDF with properly prepared data
                $pdf = Pdf::view('pdf-view.digital-receipt', [
                    'receipt' => $this->receipt,
                    'qrCode' => $qrCodeSvg,
                    'amountInWords' => $this->amountInWords,
                    'companyLogo' => $companyLogo,
                    'isPdfMode' => true,
                ])
                    ->format('a4')
                    ->withBrowsershot(function (Browsershot $browsershot) {
                        // Try to find installed browsers in the system
                        $chromePaths = [
                            config('app.chrome_path'), // First try the configured path
                            '/usr/bin/chromium-browser', // Then try chromium
                            '/usr/bin/chromium',
                            '/usr/bin/google-chrome',
                            '/usr/bin/google-chrome-stable'
                        ];

                        $chromePath = null;
                        foreach ($chromePaths as $path) {
                            if ($path && file_exists($path) && is_executable($path)) {
                                $chromePath = $path;
                                break;
                            }
                        }

                        if (!$chromePath) {
                            Log::warning('Could not find Chrome or Chromium executable.');
                        }

                        $browsershot->setChromePath($chromePath)
                            ->format('A4')
                            ->margins(10, 10, 10, 10) // Add slightly larger margins
                            ->showBackground()
                            ->waitUntilNetworkIdle()
                            ->scale(0.9) // Slightly scale down to ensure fitting on page
                            ->preferCssPageSize(true)
                            ->timeout(120)
                            ->noSandbox();
                    });

                $pdf->save($filePath);

                if (!File::exists($filePath)) {
                    throw new Exception("PDF file was not created at: {$filePath}");
                }

                // Log successful PDF generation
                Log::info('PDF Receipt Generated Successfully', [
                    'file' => $filePath,
                    'size' => File::size($filePath),
                    'receipt_id' => $this->receipt->id,
                    'receipt_number' => $this->receipt->receipt_number,
                    'logo_included' => !is_null($companyLogo)
                ]);

                Notification::make()
                    ->title('Receipt PDF generated successfully')
                    ->success()
                    ->send();

                return response()->download($filePath, $fileName, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment; filename="' . $fileName . '"'
                ])->deleteFileAfterSend(true);
            } catch (Exception $e) {
                Log::error('PDF Generation Error', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                    'receipt_id' => $this->receipt->id
                ]);

                throw $e;
            }
        } catch (Exception $e) {
            Log::error('Receipt Download Failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'receipt_id' => $this->receipt->id ?? null
            ]);

            Notification::make()
                ->title('Error generating receipt PDF')
                ->body('An error occurred while generating the PDF. Please try again.')
                ->danger()
                ->persistent()
                ->send();

            return null;
        }
    }

    /**
     * Download receipt as PNG
     */
    public function downloadPng()
    {
        try {
            // Logo path debugging
            $logoPath = public_path('img/devcentric_logo.png');
            Log::info('Looking for logo at path: ' . $logoPath);
            if (!File::exists($logoPath)) {
                // Try alternative paths
                $altPaths = [
                    public_path('img/devcentric_logo.png'),
                    public_path('images/devcentric_logo.png'),
                    public_path('images/devcentric_logo.png'),
                    public_path('assets/img/devcentric_logo.png'),
                    public_path('assets/images/devcentric_logo.png')
                ];

                Log::warning('Primary logo path not found. Checking alternatives...');
                foreach ($altPaths as $altPath) {
                    Log::info('Checking alternative logo path: ' . $altPath);
                    if (File::exists($altPath)) {
                        $logoPath = $altPath;
                        Log::info('Found logo at alternative path: ' . $altPath);
                        break;
                    }
                }
            }

            // Prepare company logo as base64
            $companyLogo = null;
            if (File::exists($logoPath)) {
                // Convert to base64 for reliable PDF embedding
                $logoData = base64_encode(File::get($logoPath));
                $mimeType = File::mimeType($logoPath);
                $companyLogo = "data:{$mimeType};base64,{$logoData}";
                Log::info('Logo prepared successfully', [
                    'path' => $logoPath,
                    'mime' => $mimeType,
                    'data_length' => strlen($logoData)
                ]);
            } else {
                Log::warning('Company logo file not found at any checked paths', [
                    'primary_path' => public_path('img/offical_logo_black.png'),
                    'checked_paths' => $altPaths ?? []
                ]);

                // Create a fallback text-based logo
                $companyLogo = "data:image/svg+xml;base64," . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><rect width="60" height="60" rx="30" fill="#4f46e5" opacity="0.1"/><text x="30" y="35" font-family="Arial" font-size="20" font-weight="bold" text-anchor="middle" fill="#4f46e5">DS</text></svg>');
                Log::info('Created fallback text-based logo');
            }
            // Generate QR code for verification URL
            $verifyUrl = route('verify.receipt', ['id' => $this->receipt->id]);
            $qrCodeSvg = QrCode::size(100)->generate($verifyUrl);

            // Create a unique filename
            $fileName = sprintf(
                'receipt_%s_%s.png',
                $this->receipt->receipt_number,
                now()->format('Ymd-His')
            );

            // Create directory if it doesn't exist
            $directory = storage_path("app/public/receipts/" . date('Y/m'));
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            $filePath = $directory . '/' . $fileName;

            try {
                // For PNG, we'll render HTML then use Browsershot directly
                $html = view('pdf-view.digital-receipt', [
                    'receipt' => $this->receipt,
                    'qrCode' => $qrCodeSvg,
                    'amountInWords' => $this->amountInWords,
                    'companyLogo' => $companyLogo,
                    'isPngMode' => true,
                ])->render();

                // Configure Browsershot for PNG
                $browsershot = Browsershot::html($html)
                    ->setChromePath(config('app.chrome_path'))
                    ->windowSize(900, 1200) // More appropriate size for full receipt
                    ->waitUntilNetworkIdle()
                    ->showBackground()
                    ->scale(0.9) // Slightly scale down to ensure complete capture
                    ->timeout(120)
                    ->noSandbox();

                // Save PNG 
                $browsershot->save($filePath);

                if (!File::exists($filePath)) {
                    throw new Exception("PNG file was not created at: {$filePath}");
                }

                // Log successful PNG generation
                Log::info('PNG Receipt Generated Successfully', [
                    'file' => $filePath,
                    'size' => File::size($filePath),
                    'receipt_id' => $this->receipt->id,
                    'receipt_number' => $this->receipt->receipt_number,
                    'logo_included' => !is_null($companyLogo)
                ]);

                Notification::make()
                    ->title('Receipt PNG generated successfully')
                    ->success()
                    ->send();

                return response()->download($filePath, $fileName, [
                    'Content-Type' => 'image/png',
                    'Content-Disposition' => 'attachment; filename="' . $fileName . '"'
                ])->deleteFileAfterSend(true);
            } catch (Exception $e) {
                Log::error('PNG Generation Error', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                    'receipt_id' => $this->receipt->id
                ]);

                throw $e;
            }
        } catch (Exception $e) {
            Log::error('Receipt PNG Download Failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'receipt_id' => $this->receipt->id ?? null
            ]);

            Notification::make()
                ->title('Error generating receipt PNG')
                ->body('An error occurred while generating the PNG. Please try again.')
                ->danger()
                ->persistent()
                ->send();

            return null;
        }
    }

    /**
     * Convert a decimal amount to words with proper currency formatting
     * 
     * @param float $amount The amount to convert
     * @return string The amount in words
     */
    private function convertAmountToWords($amount)
    {
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getCurrencyTransformer('en');

        // Convert to kobo (smallest unit) for the transformer
        $amountInKobo = (int)($amount * 100);

        // Convert to words
        $amountInWords = $numberTransformer->toWords($amountInKobo, 'NGN');

        // Replace any currency-specific text with our preferred format
        $amountInWords = str_replace('Nairas', 'Naira', $amountInWords);
        $amountInWords = str_replace('nairas', 'Naira', $amountInWords);
        $amountInWords = str_replace('cent', 'Kobo', $amountInWords);
        $amountInWords = str_replace('cents', 'Kobo', $amountInWords);

        return ucfirst($amountInWords);
    }
}
