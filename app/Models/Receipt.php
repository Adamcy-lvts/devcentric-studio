<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt_number',
        'received_from',
        'date',
        'amount',
        'payment_for',
        'deposit',
        'balance_due',
        'payment_method'
    ];

    const PAYMENT_METHODS = [
        'cash' => 'Cash',
        'debit_card' => 'Debit Card',
        'bank_transfer' => 'Bank Transfer',
        'pos' => 'POS'
    ];

    protected static function booted()
    {
        static::creating(function ($transaction) {
            $transaction->generateReceiptNumber();
        });
    }

    public function generateReceiptNumber()
    {
        // Use the transaction's date or current date if not set
        $date = Carbon::parse($this->date ?? now());

        // Create the base receipt number format: YMD (year, month, day)
        $baseNumber = $date->format('ymd');

        // Using a transaction to handle potential race conditions
        DB::transaction(function () use ($date, $baseNumber) {
            // Get the highest sequence number for receipts with this date prefix
            $latestReceipt = Receipt::where('receipt_number', 'like', $baseNumber . '%')
                ->orderByRaw('CAST(SUBSTRING(receipt_number, ' . (strlen($baseNumber) + 1) . ') AS UNSIGNED) DESC')
                ->lockForUpdate()
                ->first();
            
            $sequenceNumber = 1;
            if ($latestReceipt) {
                // Extract the numeric portion after the base number
                $lastSequenceStr = substr($latestReceipt->receipt_number, strlen($baseNumber));
                $sequenceNumber = (int)$lastSequenceStr + 1;
            }
            
            // Combine to create the final receipt number (format: YMD-000)
            $this->receipt_number = $baseNumber . str_pad($sequenceNumber, 3, '0', STR_PAD_LEFT);
        });
    }

    public function getReceiptUrlAttribute()
    {
        return url(route('verify.receipt', $this->id, false));
    }

    public function getQrCodeSvgAttribute()
    {
        return QrCode::size(100)->errorCorrection('H')->generate($this->receiptUrl);
    }
}
