<?php

namespace App\Livewire;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Support\RawJs;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use NumberToWords\NumberToWords;

class InvoiceManager extends Component implements HasForms
{
    use InteractsWithForms;
    
    public $invoiceId;
    public $invoice;
    public $client_name;
    public $client_email;
    public $client_phone;
    public $client_address;
    public $date;
    public $due_date;
    public $payment_method;
    public $payment_terms;
    public $status;
    public $items = [];
    public $subtotal = 0;
    public $discount = 0;
    public $tax_rate = 0;
    public $tax_amount = 0;
    public $total_amount = 0;
    public $deposit = 0;
    public $balance_due = 0;
    public $notes;
    public $payment_instructions;
    public $bank_name;
    public $account_name;
    public $account_number;
    
    public $amountInWords;
    public $isViewMode = false;
    
    public function mount($id = null)
    {
        if ($id) {
            $this->invoiceId = $id;
            $this->invoice = Invoice::with('items')->findOrFail($id);
            $this->isViewMode = true;
            
            // Fill form with existing invoice data
            $this->form->fill([
                'client_name' => $this->invoice->client_name,
                'client_email' => $this->invoice->client_email,
                'client_phone' => $this->invoice->client_phone,
                'client_address' => $this->invoice->client_address,
                'date' => $this->invoice->date,
                'due_date' => $this->invoice->due_date,
                'payment_method' => $this->invoice->payment_method,
                'payment_terms' => $this->invoice->payment_terms,
                'status' => $this->invoice->status,
                'items' => $this->invoice->items->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'name' => $item->name,
                        'description' => $item->description,
                        'quantity' => $item->quantity,
                        'unit_price' => $item->unit_price,
                        'subtotal' => $item->quantity * $item->unit_price,
                    ];
                })->toArray(),
                'subtotal' => $this->invoice->subtotal,
                'discount' => $this->invoice->discount,
                'tax_rate' => $this->invoice->tax_rate,
                'tax_amount' => $this->invoice->tax_amount,
                'total_amount' => $this->invoice->total_amount,
                'deposit' => $this->invoice->deposit,
                'balance_due' => $this->invoice->balance_due,
                'notes' => $this->invoice->notes,
                'payment_instructions' => $this->invoice->payment_instructions,
                'bank_name' => $this->invoice->bank_name,
                'account_name' => $this->invoice->account_name,
                'account_number' => $this->invoice->account_number,
            ]);
            
            // Generate amount in words
            try {
                $numberToWords = app(NumberToWords::class);
                $this->amountInWords = ucfirst($numberToWords->toWords($this->invoice->total_amount, 'en')) . ' Naira';
            } catch (\Exception $e) {
                $this->amountInWords = 'Amount in words not available';
            }
        } else {
            // Set default values for new invoice
            $this->form->fill([
                'date' => now()->format('Y-m-d'),
                'due_date' => now()->addDays(30)->format('Y-m-d'),
                'payment_terms' => 30,
                'payment_method' => 'bank_transfer',
                'status' => 'draft',
                'items' => [
                    [
                        'name' => '',
                        'description' => '',
                        'quantity' => 1,
                        'unit_price' => 0,
                        'subtotal' => 0,
                    ]
                ],
                'bank_name' => 'Access Bank',
                'account_name' => 'Devcentric Studio Ltd.',
            ]);
        }
    }
    
    protected function getFormSchema()
    {
        return [
            TextInput::make('client_name')
                ->label('Client Name')
                ->required()
                ->disabled($this->isViewMode)
                ->maxLength(255),
            TextInput::make('client_email')
                ->label('Client Email')
                ->email()
                ->disabled($this->isViewMode)
                ->maxLength(255),
            TextInput::make('client_phone')
                ->label('Client Phone')
                ->tel()
                ->disabled($this->isViewMode)
                ->maxLength(20),
            Textarea::make('client_address')
                ->label('Client Address')
                ->disabled($this->isViewMode)
                ->rows(3),
            DatePicker::make('date')
                ->label('Invoice Date')
                ->disabled($this->isViewMode)
                ->required(),
            DatePicker::make('due_date')
                ->label('Due Date')
                ->disabled($this->isViewMode)
                ->required(),
            Select::make('payment_method')
                ->label('Payment Method')
                ->options(array_combine(
                    array_keys(Invoice::PAYMENT_METHODS),
                    array_values(Invoice::PAYMENT_METHODS)
                ))
                ->disabled($this->isViewMode),
            TextInput::make('payment_terms')
                ->label('Payment Terms (Days)')
                ->numeric()
                ->disabled($this->isViewMode),
            Select::make('status')
                ->label('Status')
                ->options(array_combine(
                    array_keys(Invoice::STATUSES),
                    array_values(Invoice::STATUSES)
                ))
                ->disabled($this->isViewMode),
            Repeater::make('items')
                ->label('Invoice Items')
                ->schema([
                    TextInput::make('name')
                        ->label('Item Name')
                        ->required()
                        ->disabled($this->isViewMode)
                        ->columnSpan(3),
                    Textarea::make('description')
                        ->label('Description')
                        ->rows(2)
                        ->disabled($this->isViewMode)
                        ->columnSpan(3),
                    TextInput::make('quantity')
                        ->label('Quantity')
                        ->numeric()
                        ->default(1)
                        ->disabled($this->isViewMode)
                        ->minValue(0.01)
                        ->required()
                        ->columnSpan(1)
                        ->reactive()
                        ->afterStateUpdated(function (Set $set, Get $get, $state) {
                            $unitPrice = floatval($get('unit_price') ?? 0);
                            $quantity = floatval($state ?? 0);
                            $set('subtotal', $unitPrice * $quantity);
                            $this->calculateTotals();
                        }),
                    TextInput::make('unit_price')
                        ->label('Unit Price')
                        ->required()
                        ->disabled($this->isViewMode)
                        ->prefix('₦')
                        ->numeric()
                        ->columnSpan(1)
                        ->reactive()
                        ->afterStateUpdated(function (Set $set, Get $get, $state) {
                            $unitPrice = floatval($state ?? 0);
                            $quantity = floatval($get('quantity') ?? 0);
                            $set('subtotal', $unitPrice * $quantity);
                            $this->calculateTotals();
                        }),
                    TextInput::make('subtotal')
                        ->label('Item Total')
                        ->disabled(true)
                        ->prefix('₦')
                        ->numeric()
                        ->columnSpan(1),
                ])
                ->columns(3)
                ->disabled($this->isViewMode),
            TextInput::make('subtotal')
                ->label('Subtotal')
                ->prefix('₦')
                ->disabled(true),
            TextInput::make('discount')
                ->label('Discount')
                ->prefix('₦')
                ->disabled($this->isViewMode)
                ->numeric()
                ->default(0)
                ->reactive()
                ->afterStateUpdated(function () {
                    $this->calculateTotals();
                }),
            TextInput::make('tax_rate')
                ->label('Tax Rate (%)')
                ->suffix('%')
                ->disabled($this->isViewMode)
                ->numeric()
                ->default(0)
                ->reactive()
                ->afterStateUpdated(function () {
                    $this->calculateTotals();
                }),
            TextInput::make('tax_amount')
                ->label('Tax Amount')
                ->prefix('₦')
                ->disabled(true),
            TextInput::make('total_amount')
                ->label('Total Amount')
                ->prefix('₦')
                ->disabled(true),
            TextInput::make('deposit')
                ->label('Deposit / Amount Paid')
                ->prefix('₦')
                ->numeric()
                ->disabled($this->isViewMode)
                ->default(0)
                ->reactive()
                ->afterStateUpdated(function () {
                    $this->calculateTotals();
                }),
            TextInput::make('balance_due')
                ->label('Balance Due')
                ->prefix('₦')
                ->disabled(true),
            Textarea::make('notes')
                ->label('Notes')
                ->disabled($this->isViewMode)
                ->rows(3),
            Textarea::make('payment_instructions')
                ->label('Payment Instructions')
                ->disabled($this->isViewMode)
                ->rows(3),
            TextInput::make('bank_name')
                ->label('Bank Name')
                ->disabled($this->isViewMode),
            TextInput::make('account_name')
                ->label('Account Name')
                ->disabled($this->isViewMode),
            TextInput::make('account_number')
                ->label('Account Number')
                ->disabled($this->isViewMode),
        ];
    }
    
    public function calculateTotals()
    {
        // Get the form data
        $formData = $this->form->getState();
        
        // Calculate subtotal from items
        $subtotal = 0;
        foreach ($formData['items'] as $item) {
            $subtotal += $item['quantity'] * $item['unit_price'];
        }
        
        // Calculate tax and total
        $this->form->fill([
            'subtotal' => $subtotal,
            'tax_amount' => ($subtotal - $formData['discount']) * ($formData['tax_rate'] / 100),
            'total_amount' => ($subtotal - $formData['discount']) * (1 + $formData['tax_rate'] / 100),
            'balance_due' => ($subtotal - $formData['discount']) * (1 + $formData['tax_rate'] / 100) - $formData['deposit'],
        ]);
    }
    
    public function saveInvoice()
    {
        $this->validate();
        $formData = $this->form->getState();
        
        try {
            DB::beginTransaction();
            
            if ($this->invoiceId) {
                // Update existing invoice
                $invoice = Invoice::findOrFail($this->invoiceId);
                $invoice->update([
                    'client_name' => $formData['client_name'],
                    'client_email' => $formData['client_email'],
                    'client_phone' => $formData['client_phone'],
                    'client_address' => $formData['client_address'],
                    'date' => $formData['date'],
                    'due_date' => $formData['due_date'],
                    'subtotal' => $formData['subtotal'],
                    'discount' => $formData['discount'],
                    'tax_rate' => $formData['tax_rate'],
                    'tax_amount' => $formData['tax_amount'],
                    'total_amount' => $formData['total_amount'],
                    'deposit' => $formData['deposit'],
                    'balance_due' => $formData['balance_due'],
                    'payment_method' => $formData['payment_method'],
                    'payment_terms' => $formData['payment_terms'],
                    'status' => $formData['status'],
                    'notes' => $formData['notes'],
                    'payment_instructions' => $formData['payment_instructions'],
                    'bank_name' => $formData['bank_name'],
                    'account_name' => $formData['account_name'],
                    'account_number' => $formData['account_number'],
                ]);
                
                // Delete existing items
                $invoice->items()->delete();
                
                // Create new items
                foreach ($formData['items'] as $itemData) {
                    $invoice->items()->create([
                        'name' => $itemData['name'],
                        'description' => $itemData['description'],
                        'quantity' => $itemData['quantity'],
                        'unit_price' => $itemData['unit_price'],
                    ]);
                }
                
                $message = 'Invoice updated successfully';
            } else {
                // Create new invoice
                $invoice = Invoice::create([
                    'client_name' => $formData['client_name'],
                    'client_email' => $formData['client_email'],
                    'client_phone' => $formData['client_phone'],
                    'client_address' => $formData['client_address'],
                    'date' => $formData['date'],
                    'due_date' => $formData['due_date'],
                    'subtotal' => $formData['subtotal'],
                    'discount' => $formData['discount'],
                    'tax_rate' => $formData['tax_rate'],
                    'tax_amount' => $formData['tax_amount'],
                    'total_amount' => $formData['total_amount'],
                    'deposit' => $formData['deposit'],
                    'balance_due' => $formData['balance_due'],
                    'payment_method' => $formData['payment_method'],
                    'payment_terms' => $formData['payment_terms'],
                    'status' => $formData['status'],
                    'notes' => $formData['notes'],
                    'payment_instructions' => $formData['payment_instructions'],
                    'bank_name' => $formData['bank_name'],
                    'account_name' => $formData['account_name'],
                    'account_number' => $formData['account_number'],
                ]);
                
                // Create invoice items
                foreach ($formData['items'] as $itemData) {
                    $invoice->items()->create([
                        'name' => $itemData['name'],
                        'description' => $itemData['description'],
                        'quantity' => $itemData['quantity'],
                        'unit_price' => $itemData['unit_price'],
                    ]);
                }
                
                $message = 'Invoice created successfully';
            }
            
            DB::commit();
            
            session()->flash('message', $message);
            return redirect()->route('invoices.show', $invoice->id);
            
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    
    public function render()
    {
        return view('livewire.invoice-manager');
    }
}
