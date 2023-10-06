<?php

namespace App\Models;

use Carbon\Carbon;
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
        // Convert the transaction's date or current date into a Carbon instance
        $date = Carbon::parse($this->date ?? now());

        // Create the base receipt number format: dmy
        $baseNumber = $date->format('dmy');

        // Get the total receipts for this date and add 1
        $countForToday = Receipt::whereDate('date', $date)->count();
        $sequenceNumber = $countForToday + 1;

        // Combine to create the final receipt number
        $this->receipt_number = $baseNumber . str_pad($sequenceNumber, 3, '0', STR_PAD_LEFT);

    }

    public function getReceiptUrlAttribute()
    {
        return route('verify.receipt', $this->id);
    }

    public function getQrCodeSvgAttribute()
    {
        return QrCode::size(50)->generate($this->receiptUrl);
    }


}
