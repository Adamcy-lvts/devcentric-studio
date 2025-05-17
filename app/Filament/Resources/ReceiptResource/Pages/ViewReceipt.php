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
                    public_path('img/offical_logo_black.png'),
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
                    'primary_path' => public_path('img/devcentric_logo.png'),
                    'checked_paths' => $altPaths ?? []
                ]);
            }

            // Generate QR code for verification URL
            $verifyUrl = route('verify.receipt', ['id' => $this->receipt->id]);
            $qrCodeSvg = QrCode::size(60)->generate($verifyUrl); // Reduced QR code size

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
                    // Set orientation to landscape
                    ->orientation(Orientation::Landscape)
                    ->withBrowsershot(function (Browsershot $browsershot) {
                        // Try to find installed browsers in the system
                        $chromePaths = [
                            config('app.chrome_path'), // First try the configured path
                            '/usr/bin/chromium-browser',
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

                        $browsershot->setChromePath($chromePath)
                            ->format('A4')
                            ->landscape() // Ensure landscape mode is set
                            ->margins(5, 5, 5, 5) // Minimal margins to maximize content area
                            ->showBackground()
                            ->waitUntilNetworkIdle() // Wait for Tailwind to initialize
                            ->userAgent('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36')
                            ->deviceScaleFactor(1.5) // Higher resolution
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
                    public_path('img/offical_logo_black.png'),
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
                // Convert to base64 for reliable embedding
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
                    'primary_path' => public_path('img/devcentric_logo.png'),
                    'checked_paths' => $altPaths ?? []
                ]);
            }

            // Generate QR code for verification URL
            $verifyUrl = route('verify.receipt', ['id' => $this->receipt->id]);
            $qrCodeSvg = QrCode::size(60)->generate($verifyUrl); // Compact QR code

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
                // Add CSS to ensure no extra space at the bottom
                $customCss = '
                <style>
                    html, body {
                        margin: 0;
                        padding: 0;
                        overflow: hidden;
                        width: 100%;
                    }
                    #capture-area {
                        display: inline-block;
                        box-sizing: border-box;
                        width: 100%;
                        max-width: 1280px;
                    }
                    @media print {
                        body {
                            margin: 0;
                            padding: 0;
                        }
                        #capture-area {
                            page-break-inside: avoid;
                        }
                    }
                </style>
            ';

                // Create HTML content with wrapper already prepared in the view
                $html = view('pdf-view.digital-receipt', [
                    'receipt' => $this->receipt,
                    'qrCode' => $qrCodeSvg,
                    'amountInWords' => $this->amountInWords,
                    'companyLogo' => $companyLogo,
                    'isPngMode' => true,
                    'customCss' => $customCss
                ])->render();

                // Configure Browsershot for PNG
                $browsershot = Browsershot::html($html)
                    ->setChromePath(config('app.chrome_path'))
                    ->windowSize(1280, 1000) // Wider window for wider receipt
                    ->waitUntilNetworkIdle() // Wait for Tailwind to initialize
                    ->showBackground()
                    ->userAgent('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36')
                    ->deviceScaleFactor(2) // Higher resolution for better quality
                    ->timeout(120)
                    ->noSandbox()
                    ->waitForFunction('document.fonts.ready') // Wait for fonts to load properly
                    // Use select to capture only the receipt itself
                    ->select('#capture-area')
                    ->ignoreHttpsErrors(); // Ignore SSL errors

                // Save PNG without any extra whitespace
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
