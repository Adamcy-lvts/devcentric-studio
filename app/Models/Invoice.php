<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'client_name',
        'client_email',
        'client_phone',
        'client_address',
        'date',
        'due_date',
        'subtotal',
        'discount',
        'tax_rate',
        'tax_amount',
        'total_amount',
        'deposit',
        'balance_due',
        'payment_method',
        'payment_terms',
        'status',
        'notes',
        'payment_instructions',
        'bank_name',
        'account_name',
        'account_number',
    ];

    const PAYMENT_METHODS = [
        'cash' => 'Cash',
        'debit_card' => 'Debit Card',
        'bank_transfer' => 'Bank Transfer',
        'pos' => 'POS'
    ];

    const STATUSES = [
        'draft' => 'Draft',
        'sent' => 'Sent',
        'paid' => 'Paid',
        'overdue' => 'Overdue',
        'partially_paid' => 'Partially Paid',
        'cancelled' => 'Cancelled',
    ];

    /**
     * Get the items for this invoice
     */
    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    protected static function booted()
    {
        static::creating(function ($invoice) {
            $invoice->generateInvoiceNumber();
            
            // Calculate tax amount if tax rate is set
            if ($invoice->tax_rate > 0 && $invoice->subtotal > 0) {
                $invoice->tax_amount = $invoice->subtotal * ($invoice->tax_rate / 100);
            }
            
            // Calculate total amount
            $invoice->total_amount = ($invoice->subtotal - $invoice->discount) + $invoice->tax_amount;
            
            // Calculate balance due
            $invoice->balance_due = $invoice->total_amount - $invoice->deposit;
            
            // Set default status if not specified
            if (!$invoice->status) {
                $invoice->status = 'draft';
            }
            
            // Set default payment terms if not specified
            if (!$invoice->payment_terms) {
                $invoice->payment_terms = 30;
            }
        });
        
        static::saving(function ($invoice) {
            // Only recalculate if values are not already set (e.g., from form)
            // This prevents conflicts with Filament form calculations
            if ($invoice->isDirty(['subtotal', 'discount', 'tax_rate', 'deposit'])) {
                if ($invoice->tax_rate > 0 && $invoice->subtotal > 0) {
                    $invoice->tax_amount = ($invoice->subtotal - $invoice->discount) * ($invoice->tax_rate / 100);
                } else {
                    $invoice->tax_amount = 0;
                }

                $invoice->total_amount = ($invoice->subtotal - $invoice->discount) + $invoice->tax_amount;
                $invoice->balance_due = $invoice->total_amount - $invoice->deposit;
            }
        });
    }

    /**
     * Calculate tax amount if tax rate is set
     */
    public function calculateTotals()
    {
        // Calculate tax amount if tax rate is set
        if ($this->tax_rate > 0 && $this->subtotal > 0) {
            $this->tax_amount = ($this->subtotal - $this->discount) * ($this->tax_rate / 100);
        } else {
            $this->tax_amount = 0;
        }
        
        // Calculate total amount
        $this->total_amount = ($this->subtotal - $this->discount) + $this->tax_amount;
        
        // Calculate balance due
        $this->balance_due = $this->total_amount - $this->deposit;
        
        return $this;
    }

    public function generateInvoiceNumber()
    {
        // Use the invoice's date or current date if not set
        $date = Carbon::parse($this->date ?? now());

        // Create the base invoice number format: INV-YMD (year, month, day)
        $baseNumber = 'INV-' . $date->format('ymd');

        // Using a transaction to handle potential race conditions
        DB::transaction(function () use ($date, $baseNumber) {
            // Get the highest sequence number for invoices with this date prefix
            $latestInvoice = Invoice::where('invoice_number', 'like', $baseNumber . '%')
                ->orderByRaw('CAST(SUBSTRING(invoice_number, ' . (strlen($baseNumber) + 1) . ') AS UNSIGNED) DESC')
                ->lockForUpdate()
                ->first();
            
            $sequenceNumber = 1;
            if ($latestInvoice) {
                // Extract the numeric portion after the base number
                $lastSequenceStr = substr($latestInvoice->invoice_number, strlen($baseNumber));
                $sequenceNumber = (int)$lastSequenceStr + 1;
            }
            
            // Combine to create the final invoice number (format: INV-YMD-000)
            $this->invoice_number = $baseNumber . '-' . str_pad($sequenceNumber, 3, '0', STR_PAD_LEFT);
        });
    }

    public function getInvoiceUrlAttribute()
    {
        return url(route('verify.invoice', $this->id, false));
    }

    public function getQrCodeSvgAttribute()
    {
        return QrCode::size(80)->errorCorrection('H')->generate($this->invoiceUrl);
    }

    /**
     * Calculate the subtotal based on invoice items
     */
    public function calculateSubtotal()
    {
        $subtotal = $this->items->sum(function ($item) {
            return $item->quantity * $item->unit_price;
        });
        
        $this->subtotal = $subtotal;
        return $subtotal;
    }

    /**
     * Check if invoice is overdue
     */
    public function isOverdue()
    {
        return $this->status !== 'paid' && Carbon::parse($this->due_date)->isPast();
    }

    /**
     * Update invoice status based on payment and due date
     */
    public function updateStatus()
    {
        // If fully paid
        if ($this->balance_due <= 0) {
            $this->status = 'paid';
        }
        // If partially paid
        elseif ($this->deposit > 0) {
            $this->status = 'partially_paid';
        }
        // If overdue
        elseif (Carbon::parse($this->due_date)->isPast()) {
            $this->status = 'overdue';
        }
        // Otherwise keep status as is or set to sent
        elseif ($this->status == 'draft') {
            $this->status = 'sent';
        }
        
        $this->save();
        return $this->status;
    }
}
