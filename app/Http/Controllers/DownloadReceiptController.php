<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Receipt;
use Illuminate\Http\Request;
use NumberToWords\NumberToWords;
use Illuminate\Support\Facades\Log;
use Spatie\Browsershot\Browsershot;
use Filament\Notifications\Notification;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DownloadReceiptController extends Controller
{
    public function downloadReceipt($receipt_id)
    {
        try {
            // Fetch the receipt by ID
            $receipt = Receipt::findOrFail($receipt_id);

            // Convert amount to words
            $amountInWords = $this->convertAmountToWords($receipt->amount);

            // Generate QR code for verification URL
            $verifyUrl = route('verify.receipt', ['id' => $receipt->id]);
            $qrCode = QrCode::size(100)->generate($verifyUrl);

            // Render the PDF view
            $html = view('pdf-view.digital-receipt', [ 
                'receipt' => $receipt,
                'qrCode' => $qrCode,
                'amountInWords' => $amountInWords,
            ])->render();

            // Create a unique filename
            $pdfName = 'receipt_' . $receipt->receipt_number . '_' . now()->format('YmdHis') . '.pdf';
            $receiptPath = storage_path("app/{$pdfName}");

            // Generate PDF using Browsershot
            Browsershot::html($html)
                ->noSandbox()
                ->showBackground()
                ->format('A4')
                ->save($receiptPath);

            // Return download response
            return response()->download($receiptPath, $pdfName, [
                'Content-Type' => 'application/pdf',
            ])->deleteFileAfterSend(true);
        } catch (Exception $e) {
            // Log any exceptions
            Log::error("Error downloading receipt: {$e->getMessage()}");
            
            // Return to previous page with error message
            return back()->with('error', 'Could not download the receipt. Please try again later.');
        }
    }
    
    /**
     * Download receipt as PNG image
     */
    public function downloadReceiptPng($receipt_id)
    {
        try {
            // Fetch the receipt by ID
            $receipt = Receipt::findOrFail($receipt_id);

            // Convert amount to words
            $amountInWords = $this->convertAmountToWords($receipt->amount);

            // Render the PDF view
            $html = view('pdf-view.digital-receipt', [ 
                'receipt' => $receipt,
                'qrCode' => QrCode::size(100)->generate(route('verify.receipt', $receipt->id)),
                'amountInWords' => $amountInWords,
            ])->render();

            // Create a unique filename
            $pngName = 'receipt_' . $receipt->receipt_number . '_' . now()->format('YmdHis') . '.png';
            $receiptPath = storage_path("app/{$pngName}");

            // Generate PNG using Browsershot
            Browsershot::html($html)
                ->noSandbox()
                ->windowSize(800, 1000)
                ->save($receiptPath);

            // Return download response
            return response()->download($receiptPath, $pngName, [
                'Content-Type' => 'image/png',
            ])->deleteFileAfterSend(true);
        } catch (Exception $e) {
            // Log any exceptions
            Log::error("Error downloading receipt as PNG: {$e->getMessage()}");
            
            // Return to previous page with error message
            return back()->with('error', 'Could not download the receipt as PNG. Please try again later.');
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
