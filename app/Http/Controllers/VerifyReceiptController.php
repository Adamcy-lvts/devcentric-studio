<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use NumberToWords\NumberToWords;
use Illuminate\Support\Facades\Log;
use Filament\Notifications\Notification;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VerifyReceiptController extends Controller
{
    public function verifyReceipt($id)
    {
        try {
            $receipt = Receipt::findOrFail($id);
            
            // Convert amount to words
            $amountInWords = $this->convertAmountToWords($receipt->amount);
            
            return view('verify-receipt.verify-receipt', [
                'receipt' => $receipt,
                'amountInWords' => $amountInWords
            ]);
        } catch (\Exception $e) {
            Log::error("Error verifying receipt: {$e->getMessage()}");
            
            return back()->with('error', 'Could not verify receipt. It may not exist or has been deleted.');
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
