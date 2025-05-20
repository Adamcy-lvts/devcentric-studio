@extends('layouts.app')

@section('title', 'Verify Invoice')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <div class="flex justify-between items-start">
                    <!-- Logo & Business details -->
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

                <hr class="my-6">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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

                <div class="mt-6">
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
                
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="border rounded-lg p-4">
                        @if($invoice->notes)
                            <div class="mb-4">
                                <h4 class="font-medium text-gray-900 mb-2">Notes</h4>
                                <div class="text-sm text-gray-600">
                                    {!! $invoice->notes !!}
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

                <div class="mt-6 text-center">
                    <p class="text-sm italic text-gray-600">This is an official verified invoice from DevCentric Studio.</p>
                    <p class="text-xs text-gray-500 mt-1">
                        This invoice was generated electronically and is valid without a physical signature.
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('admin.invoices.pdf', $invoice->id) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Download PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
