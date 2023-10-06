<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Browsershot\Browsershot;
use Filament\Notifications\Notification;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DownloadReceiptController extends Controller
{
    public function downloadReceipt($receipt_id)
    {
        try {
            // Fetch the receipt associated with the provided transaction ID
            $receipt = Receipt::where('receipt_id', $receipt_id)->first();

            if (!$receipt) {
                return
                    Notification::make()
                    ->title('Receipt not found for the given transaction ID.')
                    ->success()
                    ->send();
            }

            $url = route('transaction.receipt', ['id' => $receipt->id]);
            $qrCode = QrCode::size(100)->generate($url);

            $html = view('pdf-view.digital-receipt', [ 
                'receipt' => $receipt,
                'qrCode' => $qrCode,
            ])->render();

            $pdfName = $receipt->received_from . '-' . $receipt->receipt_number . '_receipt.pdf';
            $receiptPath = storage_path("app/{$pdfName}");

            Browsershot::html($html)
                ->noSandbox()
                ->setChromePath(config('app.chrome_path'))
                ->showBackground()
                ->format('A4')
                ->save($receiptPath);

            // Send success notification
            Notification::make()
                ->title('Receipt downloaded successfully.')
                ->success()
                ->send();

            return response()->download($receiptPath, $pdfName, [
                'Content-Type' => 'application/pdf',
            ])->deleteFileAfterSend(true);
        } catch (Exception $e) {
            // Handle the exception
            // Log any exceptions that may arise during this process
            Log::error("Error downloading receipt: {$e->getMessage()}");

            return
                Notification::make()
                ->title('Error processing the receipt.')
                ->danger() // Assuming there's an error() method for error notifications.
                ->send();
        }
    }
}
