{{-- pdf-invoice view --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {!! isset($customCss) ? $customCss : '' !!}
    <style>
        @page {
            margin: 0.3cm;
            size: A4 portrait;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.2;
            font-size: 10pt;
        }

        .pattern-diagonal-lines {
            background-image: repeating-linear-gradient(45deg, currentColor 0, currentColor 1px, transparent 0, transparent 50%);
            background-size: 10px 10px;
        }

        .checkbox {
            position: relative;
            width: 14px;
            height: 14px;
            border: 1px solid #a0aec0;
            border-radius: 3px;
            margin-right: 4px;
        }

        .checkbox.checked {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }

        .checkbox.checked:after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 8px;
            color: white;
        }

        p {
            margin-top: 0;
            margin-bottom: 0.2em;
        }

        /* Utilities for tighter spacing */
        .tighter {
            letter-spacing: -0.01em;
        }

        .wide-layout {
            max-width: 1280px;
            /* Wider layout */
            margin: 0 auto;
        }

        .text-xs {
            font-size: 0.7rem;
        }

        .text-sm {
            font-size: 0.8rem;
        }

        .text-base {
            font-size: 0.9rem;
        }

        .text-lg {
            font-size: 1rem;
        }

        .text-xl {
            font-size: 1.1rem;
        }

        .gap-1 {
            gap: 0.25rem;
        }

        .gap-2 {
            gap: 0.5rem;
        }

        .px-2 {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .py-1 {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }

        .px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .receipt-section {
            margin-bottom: 0.5rem;
        }

        /* Table styles for invoice items */
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }

        .invoice-table th {
            background-color: #f3f4f6;
            text-align: left;
            padding: 8px;
            font-weight: 600;
            border-bottom: 1px solid #e5e7eb;
        }

        .invoice-table td {
            padding: 8px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
        }

        .invoice-table tr:nth-child(even) {
            background-color: #fafafa;
        }

        .invoice-table tr:hover {
            background-color: #f9fafb;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div id="capture-area"
        class="wide-layout p-4 bg-gradient-to-r from-slate-50 to-slate-100 shadow-lg rounded border border-gray-200 relative overflow-hidden">
        <!-- Background pattern -->
        <div class="absolute inset-0 opacity-5 pattern-diagonal-lines pattern-gray-700"></div>

        <!-- Watermark/seal effect -->
        <div class="absolute right-10 bottom-10 opacity-5 transform rotate-12">
            <svg class="w-56 h-56" viewBox="0 0 100 100">
                <!-- Complex background pattern -->
                <defs>
                    <pattern id="microtext" patternUnits="userSpaceOnUse" width="100" height="100">
                        <text x="0" y="2" font-size="1.5" fill="currentColor" opacity="0.7">DEVCENTRIC STUDIO AUTHENTIC
                            DOCUMENT DEVCENTRIC STUDIO AUTHENTIC DOCUMENT</text>
                        <text x="0" y="4" font-size="1.5" fill="currentColor" opacity="0.7">SECURE INVOICE RC:6875953
                            SECURE INVOICE RC:6875953 SECURE INVOICE</text>
                        <text x="0" y="6" font-size="1.5" fill="currentColor" opacity="0.7">DEVCENTRIC STUDIO AUTHENTIC
                            DOCUMENT DEVCENTRIC STUDIO AUTHENTIC DOCUMENT</text>
                        <text x="0" y="8" font-size="1.5" fill="currentColor" opacity="0.7">SECURE INVOICE RC:6875953
                            SECURE INVOICE RC:6875953 SECURE INVOICE</text>
                    </pattern>
                </defs>

                <!-- Microtext background circle -->
                <circle cx="50" cy="50" r="42" fill="url(#microtext)" opacity="0.4"></circle>

                <!-- Outer circle with intricate pattern -->
                <circle cx="50" cy="50" r="45" fill="none" stroke="currentColor" stroke-width="2">
                </circle>
                <circle cx="50" cy="50" r="44" fill="none" stroke="currentColor" stroke-width="0.3">
                </circle>
                <circle cx="50" cy="50" r="43" fill="none" stroke="currentColor" stroke-width="0.2"
                    stroke-dasharray="1,2"></circle>

                <!-- Middle decorative elements -->
                <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="1">
                </circle>
                <circle cx="50" cy="50" r="36" fill="none" stroke="currentColor" stroke-width="0.5"
                    stroke-dasharray="3,2"></circle>
                <circle cx="50" cy="50" r="34" fill="none" stroke="currentColor" stroke-width="0.3"
                    stroke-dasharray="1,1"></circle>

                <!-- Unique pattern elements - waves -->
                <path d="M30,50 Q40,45 50,50 Q60,55 70,50" fill="none" stroke="currentColor" stroke-width="0.3">
                </path>
                <path d="M30,52 Q40,57 50,52 Q60,47 70,52" fill="none" stroke="currentColor" stroke-width="0.3">
                </path>

                <!-- Geometric security elements -->
                <polygon points="50,28 52,30 50,32 48,30" fill="currentColor" opacity="0.7"></polygon>
                <polygon points="50,68 52,70 50,72 48,70" fill="currentColor" opacity="0.7"></polygon>
                <polygon points="28,50 30,52 28,54 26,52" fill="currentColor" opacity="0.7"></polygon>
                <polygon points="72,50 74,52 72,54 70,52" fill="currentColor" opacity="0.7"></polygon>

                <!-- Company name with subtle shadow effect -->
                <text x="50" y="42" text-anchor="middle" dominant-baseline="middle" font-family="Arial, sans-serif"
                    font-size="9" font-weight="bold" fill="currentColor">DEVCENTRIC</text>
                <text x="50" y="42.3" text-anchor="middle" dominant-baseline="middle" font-family="Arial, sans-serif"
                    font-size="9" font-weight="bold" fill="currentColor" opacity="0.3">DEVCENTRIC</text>
                <text x="50" y="52" text-anchor="middle" dominant-baseline="middle" font-family="Arial, sans-serif"
                    font-size="7" font-weight="bold" fill="currentColor">STUDIO</text>
                <text x="50" y="52.3" text-anchor="middle" dominant-baseline="middle" font-family="Arial, sans-serif"
                    font-size="7" font-weight="bold" fill="currentColor" opacity="0.3">STUDIO</text>

                <!-- Radial lines with varied lengths and thicknesses -->
                <g stroke="currentColor">
                    <line x1="50" y1="10" x2="50" y2="22" stroke-width="0.6"></line>
                    <line x1="50" y1="78" x2="50" y2="90" stroke-width="0.6"></line>
                    <line x1="10" y1="50" x2="22" y2="50" stroke-width="0.6"></line>
                    <line x1="78" y1="50" x2="90" y2="50" stroke-width="0.6"></line>

                    <!-- Diagonal lines with varied lengths -->
                    <line x1="25" y1="25" x2="34" y2="34" stroke-width="0.4"></line>
                    <line x1="75" y1="25" x2="66" y2="34" stroke-width="0.4"></line>
                    <line x1="25" y1="75" x2="34" y2="66" stroke-width="0.4"></line>
                    <line x1="75" y1="75" x2="66" y2="66" stroke-width="0.4"></line>

                    <!-- Additional diagonal security lines -->
                    <line x1="36" y1="25" x2="40" y2="29" stroke-width="0.2"></line>
                    <line x1="64" y1="25" x2="60" y2="29" stroke-width="0.2"></line>
                    <line x1="36" y1="75" x2="40" y2="71" stroke-width="0.2"></line>
                    <line x1="64" y1="75" x2="60" y2="71" stroke-width="0.2"></line>
                </g>

                <!-- Unique RC number in small print -->
                <text x="50" y="62" text-anchor="middle" font-family="monospace" font-size="2.5"
                    font-weight="bold">RC: 6875953</text>

                <!-- Text curved around bottom semicircle -->
                <path id="curve" d="M20,65 A30,30 0 0,0 80,65" fill="none" stroke="none"></path>
                <text font-family="Arial, sans-serif" font-size="4" font-weight="bold">
                    <textPath href="#curve" startOffset="50%" text-anchor="middle">OFFICIAL INVOICE</textPath>
                </text>

                <!-- Establishment year -->
                <text x="50" y="75" text-anchor="middle" font-family="Arial, sans-serif" font-size="3.5"
                    font-weight="bold">EST. 2023</text>
            </svg>
        </div>

        <!-- Header -->
        <div class="flex justify-between items-start relative z-10 mb-2 gap-4">
            <!-- Logo & RC -->
            <div class="flex items-center">
                @if (isset($companyLogo) && !empty($companyLogo))
                    <img src="{{ $companyLogo }}" alt="Company Logo" class="h-9 mr-2 drop-shadow-md">
                @else
                    <div class="w-9 h-9 bg-indigo-50 rounded-full flex items-center justify-center mr-2">
                        <span class="text-base font-bold text-indigo-600">DS</span>
                    </div>
                @endif
                <div>
                    <p class="text-xs font-semibold mt-1">RC: 6875953</p>
                </div>
            </div>

            <!-- Contact Details -->
            <div class="text-gray-600 italic text-xs text-right">
                <p>Tel: 07060741999 | 07071940611</p>
                <p>devcentric.studio@gmail.com</p>
                <p>www.devcentricstudio.com</p>
            </div>

            <!-- Invoice Number -->
            <div class="text-gray-700 bg-gray-100 px-3 py-1 rounded shadow-sm border border-gray-200 text-right">
                <p class="font-bold text-base">Invoice No: {{ $invoice->invoice_number }}</p>
            </div>
        </div>

        <!-- Client and Invoice Details -->
        <div class="flex flex-col md:flex-row justify-between items-start mb-6 gap-4">
            <!-- Client Information -->
            <div class="w-full md:w-1/2 bg-white p-4 rounded shadow-sm">
                <h3 class="font-bold text-base text-gray-700 border-b border-gray-200 pb-1 mb-2">Client Information</h3>
                <p><span class="font-semibold">Name:</span> {{ $invoice->client_name }}</p>
                @if($invoice->client_email)
                <p><span class="font-semibold">Email:</span> {{ $invoice->client_email }}</p>
                @endif
                @if($invoice->client_phone)
                <p><span class="font-semibold">Phone:</span> {{ $invoice->client_phone }}</p>
                @endif
                @if($invoice->client_address)
                <p><span class="font-semibold">Address:</span> {{ $invoice->client_address }}</p>
                @endif
            </div>

            <!-- Invoice Details -->
            <div class="w-full md:w-1/2 bg-white p-4 rounded shadow-sm">
                <h3 class="font-bold text-base text-gray-700 border-b border-gray-200 pb-1 mb-2">Invoice Details</h3>
                <div class="flex justify-between items-center py-1">
                    <span class="font-semibold">Invoice Date:</span>
                    <span>{{ \Carbon\Carbon::parse($invoice->date)->format('d-m-Y') }}</span>
                </div>
                <div class="flex justify-between items-center py-1">
                    <span class="font-semibold">Due Date:</span>
                    <span>{{ \Carbon\Carbon::parse($invoice->due_date)->format('d-m-Y') }}</span>
                </div>
                <div class="flex justify-between items-center py-1">
                    <span class="font-semibold">Status:</span>
                    <span class="px-2 py-1 rounded text-xs {{ $invoice->status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ ucfirst($invoice->status) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Invoice Items Table -->
        <div class="bg-white rounded shadow-sm p-4 mb-6">
            <h3 class="font-bold text-base text-gray-700 border-b border-gray-200 pb-1 mb-3">Items</h3>
            <table class="invoice-table">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="40%">Description</th>
                        <th width="15%">Quantity</th>
                        <th width="20%">Unit Price</th>
                        <th width="20%">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->items as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <div class="font-semibold">{{ $item->name }}</div>
                            @if ($item->description)
                            <div class="text-xs text-gray-500">{{ $item->description }}</div>
                            @endif
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ formatNaira($item->unit_price) }}</td>
                        <td>{{ formatNaira($item->quantity * $item->unit_price) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Summary and Totals -->
        <div class="flex flex-col md:flex-row gap-6 mb-6">
            <!-- Left side: Notes & Terms -->
            <div class="w-full md:w-1/2 bg-white p-4 rounded shadow-sm">
                @if($invoice->notes)
                <div class="mb-4">
                    <h3 class="font-bold text-sm text-gray-700 border-b border-gray-200 pb-1 mb-2">Notes</h3>
                    <p class="text-sm text-gray-600">{{ $invoice->notes }}</p>
                </div>
                @endif
                
                <div>
                    <h3 class="font-bold text-sm text-gray-700 border-b border-gray-200 pb-1 mb-2">Terms & Conditions</h3>
                    <ul class="text-xs text-gray-600 pl-4 list-disc">
                        <li>Payment is due within {{ $invoice->payment_terms ?? 30 }} days</li>
                        <li>Please include invoice number on your payment</li>
                        <li>All prices are in Nigerian Naira (₦)</li>
                    </ul>
                </div>
            </div>

            <!-- Right side: Totals -->
            <div class="w-full md:w-1/2 bg-white p-4 rounded shadow-sm">
                <div class="flex justify-between items-center py-1 border-b border-gray-100">
                    <span class="text-gray-600">Subtotal:</span>
                    <span>{{ formatNaira($invoice->subtotal) }}</span>
                </div>
                
                @if($invoice->discount > 0)
                <div class="flex justify-between items-center py-1 border-b border-gray-100">
                    <span class="text-gray-600">Discount:</span>
                    <span class="text-red-600">-{{ formatNaira($invoice->discount) }}</span>
                </div>
                @endif
                
                @if($invoice->tax_rate > 0)
                <div class="flex justify-between items-center py-1 border-b border-gray-100">
                    <span class="text-gray-600">VAT ({{ $invoice->tax_rate }}%):</span>
                    <span>{{ formatNaira($invoice->tax_amount) }}</span>
                </div>
                @endif
                
                <div class="flex justify-between items-center py-2 border-b border-gray-200 font-bold text-base">
                    <span>Total:</span>
                    <span class="text-indigo-700">{{ formatNaira($invoice->total_amount) }}</span>
                </div>
                
                @if($invoice->deposit > 0)
                <div class="flex justify-between items-center py-1 border-b border-gray-100">
                    <span class="text-gray-600">Deposit Paid:</span>
                    <span class="text-green-600">{{ formatNaira($invoice->deposit) }}</span>
                </div>
                
                <div class="flex justify-between items-center py-2 font-bold">
                    <span>Balance Due:</span>
                    <span class="text-red-600">{{ formatNaira($invoice->balance_due) }}</span>
                </div>
                @endif
            </div>
        </div>

        <!-- Payment Details -->
        <div class="mb-6 bg-white p-4 rounded shadow-sm">
            <h3 class="font-bold text-base text-gray-700 border-b border-gray-200 pb-1 mb-3">Payment Details</h3>
            
            <div class="flex flex-col md:flex-row justify-between gap-4">
                <!-- Payment Methods -->
                <div class="w-full md:w-1/2">
                    <p class="font-semibold text-sm mb-2">Payment Methods:</p>
                    
                    <div class="flex flex-wrap gap-2">
                        <label class="flex items-center space-x-2 text-gray-600 bg-gray-50 px-2 py-1 rounded border border-gray-200">
                            <input type="checkbox" class="form-checkbox h-3 w-3 text-indigo-600" value="cash"
                                @if ($invoice->payment_method == 'cash') checked @endif>
                            <span class="text-xs">Cash</span>
                        </label>

                        <label class="flex items-center space-x-2 text-gray-600 bg-gray-50 px-2 py-1 rounded border border-gray-200">
                            <input type="checkbox" class="form-checkbox h-3 w-3 text-indigo-600" value="pos"
                                @if ($invoice->payment_method == 'pos') checked @endif>
                            <span class="text-xs">POS</span>
                        </label>

                        <label class="flex items-center space-x-2 text-gray-600 bg-gray-50 px-2 py-1 rounded border border-gray-200">
                            <input type="checkbox" class="form-checkbox h-3 w-3 text-indigo-600" value="bank_transfer"
                                @if ($invoice->payment_method == 'bank_transfer') checked @endif>
                            <span class="text-xs">Bank Transfer</span>
                        </label>
                    </div>

                    @if($invoice->payment_instructions)
                    <div class="mt-2 text-xs bg-gray-50 p-2 rounded border border-gray-200">
                        <p class="font-semibold">Payment Instructions:</p>
                        <p class="text-gray-600">{{ $invoice->payment_instructions }}</p>
                    </div>
                    @endif
                </div>

                <!-- Bank Account Details -->
                <div class="w-full md:w-1/2">
                    <p class="font-semibold text-sm mb-2">Bank Account Details:</p>
                    <table class="w-full text-xs">
                        <tr>
                            <td class="font-semibold py-1">Bank Name:</td>
                            <td>{{ $invoice->bank_name ?? 'Access Bank' }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-1">Account Name:</td>
                            <td>{{ $invoice->account_name ?? 'Devcentric Studio Ltd.' }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-1">Account Number:</td>
                            <td>{{ $invoice->account_number ?? '0123456789' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Authorized Signature & QR Code -->
        <div class="flex justify-end mb-6">
            <div class="flex flex-col items-center">
                <div class="mb-2 bg-white p-1 rounded shadow-sm">
                    {!! $invoice->qrCodeSvg !!}
                </div>
                <div class="border-b-2 border-gray-400 w-48 mb-2"></div>
                <p class="font-semibold text-gray-700">Authorized Signature</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-2 pt-2 border-t border-gray-200 text-center text-gray-500 text-xs italic relative z-10">
            <p>Thank you for your business!</p>
            <p>This invoice was generated electronically and is valid without a physical signature.</p>
        </div>
    </div>
</body>

</html>
