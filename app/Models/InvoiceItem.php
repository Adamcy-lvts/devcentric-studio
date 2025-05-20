<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'name',
        'description',
        'quantity',
        'unit_price',
        'tax_rate',
        'tax_amount',
    ];

    /**
     * Get the invoice that owns the item
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Get the item total (quantity * unit_price)
     */
    public function getItemTotalAttribute()
    {
        return $this->quantity * $this->unit_price;
    }

    /**
     * Calculate tax amount based on item total and tax rate
     */
    public function calculateTaxAmount()
    {
        if ($this->tax_rate > 0) {
            $this->tax_amount = $this->item_total * ($this->tax_rate / 100);
            return $this->tax_amount;
        }
        
        return 0;
    }
}
