<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mb-5">
            <h1 class="text-2xl font-semibold text-gray-900">
                @if($isViewMode)
                    Invoice #{{ $invoice->invoice_number }}
                @else
                    {{ $invoiceId ? 'Edit Invoice' : 'Create New Invoice' }}
                @endif
            </h1>
        </div>

        @if(session('message'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('message') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            @if($isViewMode)
                <div class="p-6 border-b border-gray-200">
                    <div class="flex justify-between items-start">
                        <!-- Company Information -->
                        <div>
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center">
                                    <span class="text-lg font-bold text-white">DS</span>
                                </div>
                                <h2 class="text-xl font-bold">DevCentric Studio</h2>
                            </div>
                            <div class="mt-2 text-sm text-gray-600">
                                <p>RC: 6875953</p>
                                <p>Tel: 07060741999 | 07071940611</p>
                                <p>devcentric.studio@gmail.com</p>
                                <p>www.devcentricstudio.com</p>
                            </div>
                        </div>

                        <!-- Invoice Number & Status -->
                        <div class="text-right">
                            <h3 class="text-2xl font-bold text-indigo-600">INVOICE</h3>
                            <p class="text-lg font-semibold">{{ $invoice->invoice_number }}</p>
                            <div class="mt-2">
                                <span @class([
                                    'px-3 py-1 text-xs font-medium rounded-full',
                                    'bg-green-100 text-green-800' => $invoice->status === 'paid',
                                    'bg-yellow-100 text-yellow-800' => $invoice->status === 'partially_paid' || $invoice->status === 'sent',
                                    'bg-red-100 text-red-800' => $invoice->status === 'overdue',
                                    'bg-gray-100 text-gray-800' => $invoice->status === 'draft' || $invoice->status === 'cancelled',
                                ])>
                                    {{ ucfirst($invoice->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Client Information -->
                    <div class="border rounded-lg p-4">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-3">Bill To</h3>
                        <div class="space-y-2">
                            <p class="font-medium">{{ $invoice->client_name }}</p>
                            @if($invoice->client_email)
                                <p>{{ $invoice->client_email }}</p>
                            @endif
                            @if($invoice->client_phone)
                                <p>{{ $invoice->client_phone }}</p>
                            @endif
                            @if($invoice->client_address)
                                <p class="whitespace-pre-line">{{ $invoice->client_address }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Invoice Details -->
                    <div class="border rounded-lg p-4">
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-3">Invoice Details</h3>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="font-medium text-gray-600">Invoice Date</p>
                                <p>{{ date('d M Y', strtotime($invoice->date)) }}</p>
                            </div>
                            <div>
                                <p class="font-medium text-gray-600">Due Date</p>
                                <p>{{ date('d M Y', strtotime($invoice->due_date)) }}</p>
                            </div>
                            <div>
                                <p class="font-medium text-gray-600">Payment Terms</p>
                                <p>{{ $invoice->payment_terms }} days</p>
                            </div>
                            <div>
                                <p class="font-medium text-gray-600">Payment Method</p>
                                <p>{{ App\Models\Invoice::PAYMENT_METHODS[$invoice->payment_method] ?? 'Not specified' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Invoice Items -->
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-3">Invoice Items</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-3 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                    <th class="px-3 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item</th>
                                    <th class="px-3 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                    <th class="px-3 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qty</th>
                                    <th class="px-3 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Price</th>
                                    <th class="px-3 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($invoice->items as $index => $item)
                                    <tr>
                                        <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                                        <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->name }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-500">{{ $item->description }}</td>
                                        <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->quantity }}</td>
                                        <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">{{ formatNaira($item->unit_price) }}</td>
                                        <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ formatNaira($item->quantity * $item->unit_price) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Notes and additional information -->
                    <div class="border rounded-lg p-4">
                        @if($invoice->notes)
                            <div class="mb-4">
                                <h4 class="font-medium text-gray-900 mb-2">Notes</h4>
                                <div class="text-sm text-gray-600">
                                    {!! $invoice->notes !!}
                                </div>
                            </div>
                        @endif
                        
                        @if($invoice->payment_instructions)
                            <div>
                                <h4 class="font-medium text-gray-900 mb-2">Payment Instructions</h4>
                                <div class="text-sm text-gray-600">
                                    {!! $invoice->payment_instructions !!}
                                </div>
                            </div>
                        @endif

                        @if($invoice->bank_name || $invoice->account_name || $invoice->account_number)
                            <div class="mt-4 pt-4 border-t">
                                <h4 class="font-medium text-gray-900 mb-2">Bank Details</h4>
                                <div class="text-sm text-gray-600">
                                    @if($invoice->bank_name)
                                        <p><span class="font-medium">Bank:</span> {{ $invoice->bank_name }}</p>
                                    @endif
                                    @if($invoice->account_name)
                                        <p><span class="font-medium">Account Name:</span> {{ $invoice->account_name }}</p>
                                    @endif
                                    @if($invoice->account_number)
                                        <p><span class="font-medium">Account Number:</span> {{ $invoice->account_number }}</p>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Summary -->
                    <div class="border rounded-lg p-4">
                        <h4 class="font-medium text-gray-900 mb-2">Summary</h4>
                        <div class="space-y-2">
                            <div class="flex justify-between py-1 border-b">
                                <span class="text-gray-600">Subtotal:</span>
                                <span class="font-medium">{{ formatNaira($invoice->subtotal) }}</span>
                            </div>

                            @if($invoice->discount > 0)
                            <div class="flex justify-between py-1 border-b">
                                <span class="text-gray-600">Discount:</span>
                                <span class="font-medium text-red-600">-{{ formatNaira($invoice->discount) }}</span>
                            </div>
                            @endif

                            @if($invoice->tax_rate > 0)
                            <div class="flex justify-between py-1 border-b">
                                <span class="text-gray-600">Tax ({{ $invoice->tax_rate }}%):</span>
                                <span class="font-medium">{{ formatNaira($invoice->tax_amount) }}</span>
                            </div>
                            @endif

                            <div class="flex justify-between py-2 border-b font-medium text-lg">
                                <span>Total:</span>
                                <span class="text-indigo-600">{{ formatNaira($invoice->total_amount) }}</span>
                            </div>
                            
                            @if($invoice->deposit > 0)
                            <div class="flex justify-between py-1 border-b">
                                <span class="text-gray-600">Amount Paid:</span>
                                <span class="font-medium text-green-600">{{ formatNaira($invoice->deposit) }}</span>
                            </div>
                            
                            <div class="flex justify-between py-2 font-medium text-lg">
                                <span>Balance Due:</span>
                                <span class="text-red-600">{{ formatNaira($invoice->balance_due) }}</span>
                            </div>
                            @endif
                        </div>

                        <div class="mt-4 pt-4 border-t">
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Amount in Words:</span><br>
                                {{ $amountInWords }}
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6 flex justify-end space-x-4">
                    <a href="{{ route('admin.invoices.pdf', $invoice->id) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Download PDF
                    </a>
                    
                    @if($invoice->status !== 'paid' && $invoice->status !== 'cancelled')
                        <a href="{{ route('admin.invoices.edit', $invoice->id) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                            Edit Invoice
                        </a>
                    @endif
                </div>
            @else
                <div class="p-6">
                    <form wire:submit.prevent="saveInvoice" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-3">Client Information</h3>
                                <div class="space-y-4">
                                    {{ $this->form->render('client_name') }}
                                    {{ $this->form->render('client_email') }}
                                    {{ $this->form->render('client_phone') }}
                                    {{ $this->form->render('client_address') }}
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-3">Invoice Details</h3>
                                <div class="grid grid-cols-2 gap-4">
                                    {{ $this->form->render('date') }}
                                    {{ $this->form->render('due_date') }}
                                    {{ $this->form->render('payment_method') }}
                                    {{ $this->form->render('payment_terms') }}
                                    {{ $this->form->render('status') }}
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-3">Invoice Items</h3>
                            {{ $this->form->render('items') }}
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-3">Notes & Payment Details</h3>
                                <div class="space-y-4">
                                    {{ $this->form->render('notes') }}
                                    {{ $this->form->render('payment_instructions') }}
                                </div>
                                
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-3 mt-6">Banking Information</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    {{ $this->form->render('bank_name') }}
                                    {{ $this->form->render('account_name') }}
                                    {{ $this->form->render('account_number') }}
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-3">Invoice Summary</h3>
                                <div class="space-y-4">
                                    {{ $this->form->render('subtotal') }}
                                    {{ $this->form->render('discount') }}
                                    {{ $this->form->render('tax_rate') }}
                                    {{ $this->form->render('tax_amount') }}
                                    {{ $this->form->render('total_amount') }}
                                    {{ $this->form->render('deposit') }}
                                    {{ $this->form->render('balance_due') }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('invoices.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 transition">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 transition">
                                {{ $invoiceId ? 'Update Invoice' : 'Create Invoice' }}
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
