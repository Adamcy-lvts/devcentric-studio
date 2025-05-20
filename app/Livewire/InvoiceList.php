<?php

namespace App\Livewire;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class InvoiceList extends Component
{
    use WithPagination;
    
    public $search = '';
    public $status = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    
    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'sortField' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
    ];
    
    public function mount()
    {
        // Initialize the component
    }
    
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }
    
    public function render()
    {
        $invoices = Invoice::query()
            ->when($this->search, function ($query) {
                return $query->where(function ($query) {
                    $query->where('invoice_number', 'like', '%' . $this->search . '%')
                        ->orWhere('client_name', 'like', '%' . $this->search . '%')
                        ->orWhere('client_email', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->status, function ($query) {
                return $query->where('status', $this->status);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);
        
        return view('livewire.invoice-list', [
            'invoices' => $invoices,
            'statuses' => Invoice::STATUSES
        ]);
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function markAsPaid($invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        $invoice->status = 'paid';
        $invoice->balance_due = 0;
        $invoice->deposit = $invoice->total_amount;
        $invoice->save();
        
        session()->flash('message', 'Invoice marked as paid successfully!');
    }
}
