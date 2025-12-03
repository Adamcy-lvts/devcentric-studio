<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use App\Filament\Resources\InvoiceResource;
use App\Models\Invoice;
use Exception;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use NumberToWords\NumberToWords;
use Filament\Infolists\Infolist;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Enums\Orientation;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Filament\Notifications\Notification;

class ViewInvoice extends ViewRecord
{
    protected static string $resource = InvoiceResource::class;
    
    protected static string $view = 'filament.resources.invoice-resource.pages.view-invoice';
    
    public $invoice;
    public $amountInWords;
    public $companyDetails;
    
    public function mount(int|string $record): void
    {
        parent::mount($record);
        
        // Set the invoice variable for the view
        $this->invoice = $this->record;
        
        $this->companyDetails = [
            'name' => 'Devcentric Studio Ltd.',
            'rc_number' => '6875953',
            'email' => 'info@devcentricstudios.com',
            'website' => 'www.devcentricstudios.com',
            'phone' => '+234 706 074 1999 | +234 707 194 0611',
            'logo' => 'img/devcentric_logo.png',
        ];

        try {
            // Convert amount to words
            $this->amountInWords = $this->convertAmountToWords($this->record->total_amount);
        } catch (Exception $e) {
            Log::error('Error converting amount to words: ' . $e->getMessage());
            $this->amountInWords = 'Amount in words not available';
        }
    }

    
    
    /**
     * Download invoice as PDF
     */
    public function downloadPdf()
    {
        try {
            // Logo path debugging
            $logoPath = public_path('img/devcentric_logo.png');
            if (!File::exists($logoPath)) {
                // Try alternative paths
                $altPaths = [
                    public_path('img/offical_logo_black.png'),
                    public_path('images/devcentric_logo.png'),
                    public_path('assets/img/devcentric_logo.png'),
                    public_path('assets/images/devcentric_logo.png')
                ];

                foreach ($altPaths as $altPath) {
                    if (File::exists($altPath)) {
                        $logoPath = $altPath;
                        break;
                    }
                }
            }

            // Prepare company logo as base64
            $companyLogo = null;
            if (File::exists($logoPath)) {
                $logoData = base64_encode(File::get($logoPath));
                $mimeType = File::mimeType($logoPath);
                $companyLogo = "data:{$mimeType};base64,{$logoData}";
            }

            // Prepare watermark as base64
            $watermarkPath = public_path('img/devcentric_logo_1.png');
            $watermark = null;
            if (File::exists($watermarkPath)) {
                $watermarkData = base64_encode(File::get($watermarkPath));
                $watermarkMimeType = File::mimeType($watermarkPath);
                $watermark = "data:{$watermarkMimeType};base64,{$watermarkData}";
            }

            // Generate QR code for verification URL
            $verifyUrl = route('verify.invoice', ['id' => $this->invoice->id]);
            $qrCodeSvg = QrCode::size(60)->generate($verifyUrl);

            // Create a unique filename
            $fileName = sprintf(
                'invoice_%s_%s.pdf',
                $this->invoice->invoice_number,
                now()->format('Ymd-His')
            );

            // Create directory if it doesn't exist
            $directory = storage_path("app/public/invoices/" . date('Y/m'));
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            $filePath = $directory . '/' . $fileName;

            try {
                // Generate PDF using Spatie PDF
                $pdf = Pdf::view('pdf-view.digital-invoice', [
                    'invoice' => $this->invoice,
                    'qrCode' => $qrCodeSvg,
                    'amountInWords' => $this->amountInWords,
                    'companyLogo' => $companyLogo,
                    'watermark' => $watermark,
                    'isPdfMode' => true,
                    'companyDetails' => $this->companyDetails,
                ])
                    ->format('a4')
                    ->orientation(Orientation::Portrait) // Invoices are usually portrait
                    ->withBrowsershot(function (Browsershot $browsershot) {
                        $chromePaths = [
                            config('app.chrome_path'),
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

                        // Only set Chrome path if found
                        if ($chromePath) {
                            $browsershot->setChromePath($chromePath);
                        }

                        $browsershot->format('A4')
                            ->margins(5, 5, 5, 5)
                            ->showBackground()
                            ->waitUntilNetworkIdle()
                            ->userAgent('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36')
                            ->deviceScaleFactor(1.5)
                            ->timeout(120)
                            ->noSandbox();
                    });

                $pdf->save($filePath);

                if (!File::exists($filePath)) {
                    throw new Exception("PDF file was not created at: {$filePath}");
                }

                Notification::make()
                    ->title('Invoice PDF generated successfully')
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
                    'invoice_id' => $this->invoice->id
                ]);

                throw $e;
            }
        } catch (Exception $e) {
            Log::error('Invoice Download Failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'invoice_id' => $this->invoice->id ?? null
            ]);

            Notification::make()
                ->title('Error generating invoice PDF')
                ->body('An error occurred while generating the PDF. Please try again.')
                ->danger()
                ->persistent()
                ->send();

            return null;
        }
    }

    /**
     * Download invoice as PNG
     */
    public function downloadPng()
    {
        try {
            // Logo path debugging
            $logoPath = public_path('img/devcentric_logo.png');
            if (!File::exists($logoPath)) {
                // Try alternative paths
                $altPaths = [
                    public_path('img/offical_logo_black.png'),
                    public_path('images/devcentric_logo.png'),
                    public_path('assets/img/devcentric_logo.png'),
                    public_path('assets/images/devcentric_logo.png')
                ];

                foreach ($altPaths as $altPath) {
                    if (File::exists($altPath)) {
                        $logoPath = $altPath;
                        break;
                    }
                }
            }

            // Prepare company logo as base64
            $companyLogo = null;
            if (File::exists($logoPath)) {
                $logoData = base64_encode(File::get($logoPath));
                $mimeType = File::mimeType($logoPath);
                $companyLogo = "data:{$mimeType};base64,{$logoData}";
            }

            // Prepare watermark as base64
            $watermarkPath = public_path('img/devcentric_logo_1.png');
            $watermark = null;
            if (File::exists($watermarkPath)) {
                $watermarkData = base64_encode(File::get($watermarkPath));
                $watermarkMimeType = File::mimeType($watermarkPath);
                $watermark = "data:{$watermarkMimeType};base64,{$watermarkData}";
            }

            // Generate QR code for verification URL
            $verifyUrl = route('verify.invoice', ['id' => $this->invoice->id]);
            $qrCodeSvg = QrCode::size(60)->generate($verifyUrl);

            // Create a unique filename
            $fileName = sprintf(
                'invoice_%s_%s.png',
                $this->invoice->invoice_number,
                now()->format('Ymd-His')
            );

            // Create directory if it doesn't exist
            $directory = storage_path("app/public/invoices/" . date('Y/m'));
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            $filePath = $directory . '/' . $fileName;

            try {
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
                </style>
            ';

                $html = view('pdf-view.digital-invoice', [
                    'invoice' => $this->invoice,
                    'qrCode' => $qrCodeSvg,
                    'amountInWords' => $this->amountInWords,
                    'companyLogo' => $companyLogo,
                    'watermark' => $watermark,
                    'isPngMode' => true,
                    'customCss' => $customCss,
                    'companyDetails' => $this->companyDetails,
                ])->render();

                $browsershot = Browsershot::html($html)
                    ->setChromePath(config('app.chrome_path'))
                    ->windowSize(900, 1200) // Portrait aspect ratio
                    ->waitUntilNetworkIdle()
                    ->showBackground()
                    ->userAgent('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36')
                    ->deviceScaleFactor(2)
                    ->timeout(120)
                    ->noSandbox()
                    ->waitForFunction('document.fonts.ready')
                    ->select('#capture-area')
                    ->ignoreHttpsErrors();

                $browsershot->save($filePath);

                if (!File::exists($filePath)) {
                    throw new Exception("PNG file was not created at: {$filePath}");
                }

                Notification::make()
                    ->title('Invoice PNG generated successfully')
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
                    'invoice_id' => $this->invoice->id
                ]);

                throw $e;
            }
        } catch (Exception $e) {
            Log::error('Invoice PNG Download Failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'invoice_id' => $this->invoice->id ?? null
            ]);

            Notification::make()
                ->title('Error generating invoice PNG')
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
