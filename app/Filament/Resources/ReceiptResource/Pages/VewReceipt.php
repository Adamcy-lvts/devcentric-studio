<?php

namespace App\Filament\Resources\ReceiptResource\Pages;

use App\Models\Receipt;
use NumberToWords\NumberToWords;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\ReceiptResource;

class ViewReceipt extends Page
{
    protected static string $resource = ReceiptResource::class;

    protected static string $view = 'filament.resources.receipt-resource.pages.view-receipt';

    public $receipt;
    public $amountInWords;

    public function mount($record)
    {
        $this->receipt = Receipt::findOrFail($record);

        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getCurrencyTransformer('en');

        $amount = $this->receipt->amount * 100;

        // Convert a number to words
        $this->amountInWords = $numberTransformer->toWords($amount,'NGN');

        $this->amountInWords = str_replace('Nairas', 'Naira', $this->amountInWords);
    }

}
