{{-- pdf-invoice view --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    {!! isset($customCss) ? $customCss : '' !!}
    <style>
        @page {
            margin: 0;
            size: A4 portrait;
        }

        body {
            font-family: 'Inter', sans-serif;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
            background: #f3f4f6;
            font-size: 7pt;
        }

        .invoice-container {
            width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            background: white;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Compact text sizes for PDF */
        .text-xs { font-size: 4px; }
        .text-sm { font-size: 6px; }
        .text-base { font-size: 7px; }
        .text-lg { font-size: 9px; }
        .text-xl { font-size: 11px; }
        .text-2xl { font-size: 13px; }
        .text-3xl { font-size: 15px; }
        .text-4xl { font-size: 17px; }
        .text-5xl { font-size: 21px; }

        /* Print optimization */
        @media print {
            body {
                background: white;
            }
            .invoice-container {
                width: 100%;
                margin: 0;
                box-shadow: none;
                min-height: auto;
            }
        }
        
        .pattern-diagonal-lines {
            background-image: repeating-linear-gradient(45deg, currentColor 0, currentColor 1px, transparent 0, transparent 50%);
            background-size: 10px 10px;
        }
    </style>
</head>

<body class="antialiased text-slate-800">
    <div id="capture-area" class="invoice-container flex flex-col relative p-8">
        <!-- Premium subtle background pattern -->
        <div
            class="absolute inset-0 opacity-5 pattern-diagonal-lines pattern-gray-700 pattern-size-2 pattern-bg-transparent">
        </div>

        <!-- Watermark/seal effect -->
       
        
        <!-- Watermark -->
        @if(isset($watermark) && !empty($watermark))
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-0 opacity-[0.03]">
            <img src="{{ $watermark }}" class="w-[500px] h-auto object-contain" alt="Watermark">
        </div>
        @endif

        <!-- Header -->
        <div class="relative z-10 flex justify-between items-center mb-4">
            <!-- Logo & RC -->
            <div class="flex flex-col items-start">
                @if (isset($companyLogo) && !empty($companyLogo))
                    <img src="{{ $companyLogo }}" alt="Company Logo" class="w-28 mb-2">
                @else
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center shadow-sm">
                            <span class="text-sm font-bold text-white">DS</span>
                        </div>
                        <span class="text-lg font-bold text-slate-900 tracking-tight">DevCentric Studio</span>
                    </div>
                @endif
                <span class="text-xs font-bold text-slate-500 tracking-widest">RC: {{ $companyDetails['rc_number'] ?? '6875953' }}</span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl font-black text-slate-100 tracking-[0.2em]">INVOICE</h1>
        </div>

        <!-- Info Bar -->
        <div class="relative z-10 bg-slate-50 rounded-lg p-3 mb-4 flex flex-wrap justify-between items-center gap-3 border border-slate-100">
            <div class="flex flex-col">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Invoice No</span>
                <span class="text-xs font-bold text-slate-800">{{ $invoice->invoice_number }}</span>
            </div>
            <div class="flex flex-col text-center">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Service Period</span>
                <span class="text-xs font-bold text-slate-800">April 2026 – April 2027</span>
            </div>
            <div class="flex flex-col text-right">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Date</span>
                <span class="text-xs font-bold text-slate-800">{{ date('d M Y', strtotime($invoice->date)) }}</span>
            </div>
        </div>

        <!-- Addresses -->
        <div class="relative z-10 flex justify-between mb-5 gap-10">
            <!-- Bill To -->
            <div class="w-1/2">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2 border-b border-slate-100 pb-1">Bill To</h3>
                <div class="text-slate-700">
                    <p class="font-bold text-xs text-slate-900 mb-1">{{ $invoice->client_name }}</p>
                    @if($invoice->client_address)
                        <p class="text-xs leading-relaxed mb-1 text-slate-500">{{ $invoice->client_address }}</p>
                    @endif
                    <div class="space-y-0.5 text-xs text-slate-500">
                        @if($invoice->client_email) <p class="flex items-center gap-2">{{ $invoice->client_email }}</p> @endif
                        @if($invoice->client_phone) <p class="flex items-center gap-2">{{ $invoice->client_phone }}</p> @endif
                    </div>
                </div>
            </div>

            <!-- From -->
            <div class="w-1/2 text-right">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2 border-b border-slate-100 pb-1">From</h3>
                <div class="text-slate-700">
                    <p class="font-bold text-xs text-slate-900 mb-1">{{ $companyDetails['name'] ?? 'Devcentric Studio Ltd.' }}</p>
                    <div class="space-y-0.5 text-xs text-slate-500">
                        <p>{{ $companyDetails['phone'] ?? '+234 706 074 1999' }}</p>
                        <p>{{ $companyDetails['email'] ?? 'info@devcentricstudios.com' }}</p>
                        <p>{{ $companyDetails['website'] ?? 'www.devcentricstudios.com' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Items Table -->
        <div class="relative z-10 mb-4">
            <table class="w-full">
                <thead>
                    <tr class="border-b-2 border-slate-100">
                        <th class="py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-wider w-12">#</th>
                        <th class="py-3 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Description</th>
                        <th class="py-3 text-center text-xs font-bold text-slate-400 uppercase tracking-wider w-24">Qty</th>
                        <th class="py-3 text-right text-xs font-bold text-slate-400 uppercase tracking-wider w-32">Price</th>
                        <th class="py-3 text-right text-xs font-bold text-slate-400 uppercase tracking-wider w-32">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($invoice->items as $index => $item)
                        <tr>
                            <td class="py-2 text-slate-400 text-xs font-medium">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                            <td class="py-2">
                                <p class="text-slate-800 font-bold text-xs">{{ $item->name }}</p>
                                @if($item->description)
                                    <p class="text-slate-500 text-xs mt-0.5">{{ $item->description }}</p>
                                @endif
                            </td>
                            <td class="py-2 text-center text-slate-600 text-xs">{{ $item->quantity }}</td>
                            <td class="py-2 text-right text-slate-600 text-xs">{{ formatNaira($item->unit_price) }}</td>
                            <td class="py-2 text-right text-slate-900 font-bold text-xs">{{ formatNaira($item->quantity * $item->unit_price) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Totals & Notes -->
        <div class="relative z-10 flex gap-12">
            <div class="w-7/12 space-y-4">
               
               
                    <!-- Bank Details -->
                    @if($invoice->status !== 'paid')
                    <div class="flex-1">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Payment Details</p>
                        <div class="bg-slate-50 rounded p-3 text-xs text-slate-600 space-y-1 border border-slate-100">
                            <div class="flex justify-between gap-2"><span class="text-slate-400">Bank:</span> <span class="font-medium text-slate-800 text-right">{{ $invoice->bank_name ?? 'Access Bank' }}</span></div>
                            <div class="flex justify-between gap-2"><span class="text-slate-400">Acc No:</span> <span class="font-bold text-slate-800 tracking-wider text-right">{{ $invoice->account_number ?? '0123456789' }}</span></div>
                            <div class="flex justify-between gap-2"><span class="text-slate-400">Name:</span> <span class="font-medium text-slate-800 text-right">{{ $invoice->account_name ?? 'Devcentric Studio Ltd.' }}</span></div>
                        </div>
                    </div>
                    @endif
                    
                    <!-- Notes -->
                    @if($invoice->notes)
                    <div class="flex-1">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Notes</p>
                        <p class="text-xs text-slate-500 leading-relaxed">{!! $invoice->notes !!}</p>
                    </div>
                    @endif
               
            </div>

            <div class="w-5/12">
                <div class="bg-slate-50 rounded-lg p-3 space-y-2 border border-slate-100">
                    <div class="flex justify-between text-xs">
                        <span class="text-slate-500">Subtotal</span>
                        <span class="font-bold text-slate-800">{{ formatNaira($invoice->subtotal) }}</span>
                    </div>
                    @if($invoice->discount > 0)
                    <div class="flex justify-between text-xs">
                        <span class="text-slate-500">Discount</span>
                        <span class="font-bold text-red-500">-{{ formatNaira($invoice->discount) }}</span>
                    </div>
                    @endif
                    @if($invoice->tax_rate > 0)
                    <div class="flex justify-between text-xs">
                        <span class="text-slate-500">VAT ({{ $invoice->tax_rate }}%)</span>
                        <span class="font-bold text-slate-800">{{ formatNaira($invoice->tax_amount) }}</span>
                    </div>
                    @endif
                    <div class="border-t border-slate-200 pt-3 mt-2 flex justify-between items-center">
                        <span class="text-xs font-bold text-slate-800">Total</span>
                        <span class="text-xs font-black text-indigo-600">{{ formatNaira($invoice->total_amount) }}</span>
                    </div>
                </div>
                 <!-- Amount in Words -->
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Amount in Words</p>
                    <p class="text-xs text-slate-600 italic capitalize border-l-2 border-slate-200 pl-3">{{ $amountInWords }}</p>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <div class="relative z-10 mt-auto  border-t border-slate-100 flex justify-between items-end">
            <div class="text-xs text-slate-400 italic">
                <p>Thank you for your business!</p>
                <p>This invoice is valid without a physical signature.</p>
            </div>
            
            <div class="flex flex-col items-center">
                <div class="mb-2 opacity-80">
                    {!! $qrCode !!}
                </div>
                <div class="w-32 border-b border-slate-300 mb-1"></div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Authorized Signature</p>
            </div>
        </div>
    </div>
</body>
</html>
