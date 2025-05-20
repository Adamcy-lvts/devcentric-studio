<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use NumberToWords\NumberToWords;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\PDF;
use Illuminate\Database\QueryException;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the invoices.
     */
    public function index()
    {
        $invoices = Invoice::latest()->paginate(10);
        return view('admin.invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new invoice.
     */
    public function create()
    {
        return view('admin.invoices.create');
    }

    /**
     * Store a newly created invoice in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'nullable|email|max:255',
            'client_phone' => 'nullable|string|max:20',
            'client_address' => 'nullable|string',
            'date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:date',
            'discount' => 'nullable|numeric|min:0',
            'tax_rate' => 'nullable|numeric|min:0|max:100',
            'deposit' => 'nullable|numeric|min:0',
            'payment_method' => 'nullable|string|in:' . implode(',', array_keys(Invoice::PAYMENT_METHODS)),
            'payment_terms' => 'nullable|integer|min:0',
            'status' => 'nullable|string|in:' . implode(',', array_keys(Invoice::STATUSES)),
            'notes' => 'nullable|string',
            'payment_instructions' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.name' => 'required|string|max:255',
            'items.*.description' => 'nullable|string',
            'items.*.quantity' => 'required|numeric|min:0.01',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();
            
            // Calculate subtotal from items
            $subtotal = 0;
            foreach ($request->items as $item) {
                $subtotal += $item['quantity'] * $item['unit_price'];
            }

            // Create invoice
            $invoice = Invoice::create([
                'client_name' => $request->client_name,
                'client_email' => $request->client_email,
                'client_phone' => $request->client_phone,
                'client_address' => $request->client_address,
                'date' => $request->date,
                'due_date' => $request->due_date,
                'subtotal' => $subtotal,
                'discount' => $request->discount ?? 0,
                'tax_rate' => $request->tax_rate ?? 0,
                'deposit' => $request->deposit ?? 0,
                'payment_method' => $request->payment_method,
                'payment_terms' => $request->payment_terms,
                'status' => $request->status ?? 'draft',
                'notes' => $request->notes,
                'payment_instructions' => $request->payment_instructions,
                'bank_name' => $request->bank_name,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
            ]);

            // Create invoice items
            foreach ($request->items as $itemData) {
                $invoice->items()->create([
                    'name' => $itemData['name'],
                    'description' => $itemData['description'] ?? null,
                    'quantity' => $itemData['quantity'],
                    'unit_price' => $itemData['unit_price'],
                ]);
            }

            DB::commit();
            
            return redirect()->route('admin.invoices.show', $invoice)
                ->with('success', 'Invoice created successfully.');
                
        } catch (QueryException $e) {
            DB::rollBack();
            Log::error('Invoice creation failed: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Failed to create invoice. Please try again.');
        }
    }

    /**
     * Display the specified invoice.
     */
    public function show(Invoice $invoice)
    {
        $invoice->load('items');
        return view('admin.invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified invoice.
     */
    public function edit(Invoice $invoice)
    {
        $invoice->load('items');
        return view('admin.invoices.edit', compact('invoice'));
    }

    /**
     * Update the specified invoice in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'nullable|email|max:255',
            'client_phone' => 'nullable|string|max:20',
            'client_address' => 'nullable|string',
            'date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:date',
            'discount' => 'nullable|numeric|min:0',
            'tax_rate' => 'nullable|numeric|min:0|max:100',
            'deposit' => 'nullable|numeric|min:0',
            'payment_method' => 'nullable|string|in:' . implode(',', array_keys(Invoice::PAYMENT_METHODS)),
            'payment_terms' => 'nullable|integer|min:0',
            'status' => 'nullable|string|in:' . implode(',', array_keys(Invoice::STATUSES)),
            'notes' => 'nullable|string',
            'payment_instructions' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.id' => 'nullable|exists:invoice_items,id',
            'items.*.name' => 'required|string|max:255',
            'items.*.description' => 'nullable|string',
            'items.*.quantity' => 'required|numeric|min:0.01',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();
            
            // Calculate subtotal from items
            $subtotal = 0;
            foreach ($request->items as $item) {
                $subtotal += $item['quantity'] * $item['unit_price'];
            }

            // Update invoice
            $invoice->update([
                'client_name' => $request->client_name,
                'client_email' => $request->client_email,
                'client_phone' => $request->client_phone,
                'client_address' => $request->client_address,
                'date' => $request->date,
                'due_date' => $request->due_date,
                'subtotal' => $subtotal,
                'discount' => $request->discount ?? 0,
                'tax_rate' => $request->tax_rate ?? 0,
                'deposit' => $request->deposit ?? 0,
                'payment_method' => $request->payment_method,
                'payment_terms' => $request->payment_terms,
                'status' => $request->status,
                'notes' => $request->notes,
                'payment_instructions' => $request->payment_instructions,
                'bank_name' => $request->bank_name,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
            ]);

            // Get existing item IDs
            $existingItemIds = $invoice->items->pluck('id')->toArray();
            $updatedItemIds = [];
            
            // Update or create invoice items
            foreach ($request->items as $itemData) {
                if (isset($itemData['id']) && in_array($itemData['id'], $existingItemIds)) {
                    // Update existing item
                    InvoiceItem::find($itemData['id'])->update([
                        'name' => $itemData['name'],
                        'description' => $itemData['description'] ?? null,
                        'quantity' => $itemData['quantity'],
                        'unit_price' => $itemData['unit_price'],
                    ]);
                    $updatedItemIds[] = $itemData['id'];
                } else {
                    // Create new item
                    $newItem = $invoice->items()->create([
                        'name' => $itemData['name'],
                        'description' => $itemData['description'] ?? null,
                        'quantity' => $itemData['quantity'],
                        'unit_price' => $itemData['unit_price'],
                    ]);
                    $updatedItemIds[] = $newItem->id;
                }
            }
            
            // Delete items that weren't updated or created
            $itemsToDelete = array_diff($existingItemIds, $updatedItemIds);
            if (!empty($itemsToDelete)) {
                InvoiceItem::whereIn('id', $itemsToDelete)->delete();
            }

            DB::commit();
            
            return redirect()->route('admin.invoices.show', $invoice)
                ->with('success', 'Invoice updated successfully.');
                
        } catch (QueryException $e) {
            DB::rollBack();
            Log::error('Invoice update failed: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Failed to update invoice. Please try again.');
        }
    }

    /**
     * Generate PDF for the invoice.
     */
    public function generatePDF(Invoice $invoice)
    {
        $invoice->load('items');
        
        // Get amount in words
        $numberToWords = app(NumberToWords::class);
        $amountInWords = ucfirst($numberToWords->toWords($invoice->total_amount, 'en')) . ' Naira';
        
        // Customize PDF options
        $options = [
            'paper' => 'a4',
            'orientation' => 'portrait',
        ];
        
        // Generate PDF
        $pdf = PDF::loadView('pdf-view.digital-invoice', [
            'invoice' => $invoice,
            'amountInWords' => $amountInWords,
        ])->setOptions($options);
        
        // Generate a filename for the PDF
        $filename = 'Invoice-' . $invoice->invoice_number . '.pdf';
        
        // Return PDF for download
        return $pdf->download($filename);
    }
    
    /**
     * Verify the invoice via QR code.
     */
    public function verify($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->load('items');
        
        // Get amount in words
        $numberToWords = app(NumberToWords::class);
        $amountInWords = ucfirst($numberToWords->toWords($invoice->total_amount, 'en')) . ' Naira';
        
        return view('invoices.verify', compact('invoice', 'amountInWords'));
    }

    /**
     * Remove the specified invoice from storage.
     */
    public function destroy(Invoice $invoice)
    {
        try {
            $invoice->delete();
            return redirect()->route('admin.invoices.index')
                ->with('success', 'Invoice deleted successfully.');
        } catch (QueryException $e) {
            Log::error('Invoice deletion failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete invoice. Please try again.');
        }
    }
    
    /**
     * Mark invoice as paid.
     */
    public function markAsPaid(Invoice $invoice)
    {
        $invoice->status = 'paid';
        $invoice->balance_due = 0;
        $invoice->deposit = $invoice->total_amount;
        $invoice->save();
        
        return redirect()->back()->with('success', 'Invoice marked as paid.');
    }
    
    /**
     * Send invoice via email.
     */
    public function sendEmail(Invoice $invoice)
    {
        // This is just a placeholder - you'd implement actual email sending logic
        // using Laravel Mail or Notification features
        
        $invoice->status = 'sent';
        $invoice->save();
        
        return redirect()->back()->with('success', 'Invoice sent via email.');
    }
}
