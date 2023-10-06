<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use Filament\Notifications\Notification;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VerifyReceiptController extends Controller
{
    public function verifyReceipt($id)
    {
        $receipt = Receipt::findOrFail($id);

        if (!$receipt) {
            return
                Notification::make()
                ->title('Receipt not found for the given transaction ID.')
                ->success()
                ->send();
        }

        $url = route('verify.receipt', ['id' => $receipt->id]);
        $qrCode = QrCode::size(100)->generate($url);

        return view('verify-receipt.verify-receipt', [
            'receipt' => $receipt,
            'qrCode' => $qrCode
 
        ]);
    }
}
