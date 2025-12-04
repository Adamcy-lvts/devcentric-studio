<x-filament::page>
    <!-- Download Actions Buttons -->
    <div class="flex flex-wrap justify-end gap-4 mb-6">
        <x-filament::button color="primary" wire:click="downloadPdf" icon="heroicon-o-document-arrow-down"
            class="filament-page-button-action">
            Download PDF
        </x-filament::button>

        <x-filament::button color="success" wire:click="downloadPng" icon="heroicon-o-photo"
            class="filament-page-button-action">
            Download PNG
        </x-filament::button>
    </div>

    <div class="flex justify-center w-full">
        <div id="invoice-container" class="bg-white p-8 md:p-12 shadow-xl rounded-lg border border-gray-100 w-full max-w-5xl mx-auto relative overflow-hidden">
            <!-- Premium subtle background pattern -->
            <div
                class="absolute inset-0 opacity-5 pattern-diagonal-lines pattern-gray-700 pattern-size-2 pattern-bg-transparent">
            </div>

            <!-- Watermark/seal effect -->
            <div class="absolute right-10 bottom-10 opacity-5 transform rotate-12">
                <svg class="w-56 h-56" viewBox="0 0 100 100">
                    <!-- Complex background pattern -->
                    <defs>
                        <pattern id="microtext" patternUnits="userSpaceOnUse" width="100" height="100">
                            <text x="0" y="2" font-size="1.5" fill="currentColor" opacity="0.7">DEVCENTRIC STUDIO AUTHENTIC DOCUMENT DEVCENTRIC STUDIO AUTHENTIC DOCUMENT</text>
                            <text x="0" y="4" font-size="1.5" fill="currentColor" opacity="0.7">SECURE INVOICE RC:6875953 SECURE INVOICE RC:6875953 SECURE INVOICE</text>
                            <text x="0" y="6" font-size="1.5" fill="currentColor" opacity="0.7">DEVCENTRIC STUDIO AUTHENTIC DOCUMENT DEVCENTRIC STUDIO AUTHENTIC DOCUMENT</text>
                            <text x="0" y="8" font-size="1.5" fill="currentColor" opacity="0.7">SECURE INVOICE RC:6875953 SECURE INVOICE RC:6875953 SECURE INVOICE</text>
                        </pattern>
                    </defs>
                    
                    <!-- Microtext background circle -->
                    <circle cx="50" cy="50" r="42" fill="url(#microtext)" opacity="0.4"></circle>
                    
                    <!-- Outer circle with intricate pattern -->
                    <circle cx="50" cy="50" r="45" fill="none" stroke="currentColor" stroke-width="2"></circle>
                    <circle cx="50" cy="50" r="44" fill="none" stroke="currentColor" stroke-width="0.3"></circle>
                    <circle cx="50" cy="50" r="43" fill="none" stroke="currentColor" stroke-width="0.2" stroke-dasharray="1,2"></circle>
                    
                    <!-- Middle decorative elements -->
                    <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="1"></circle>
                    <circle cx="50" cy="50" r="36" fill="none" stroke="currentColor" stroke-width="0.5" stroke-dasharray="3,2"></circle>
                    <circle cx="50" cy="50" r="34" fill="none" stroke="currentColor" stroke-width="0.3" stroke-dasharray="1,1"></circle>
                    
                    <!-- Unique pattern elements - waves -->
                    <path d="M30,50 Q40,45 50,50 Q60,55 70,50" fill="none" stroke="currentColor" stroke-width="0.3"></path>
                    <path d="M30,52 Q40,57 50,52 Q60,47 70,52" fill="none" stroke="currentColor" stroke-width="0.3"></path>
                    
                    <!-- Geometric security elements -->
                    <polygon points="50,28 52,30 50,32 48,30" fill="currentColor" opacity="0.7"></polygon>
                    <polygon points="50,68 52,70 50,72 48,70" fill="currentColor" opacity="0.7"></polygon>
                    <polygon points="28,50 30,52 28,54 26,52" fill="currentColor" opacity="0.7"></polygon>
                    <polygon points="72,50 74,52 72,54 70,52" fill="currentColor" opacity="0.7"></polygon>
                    
                    <!-- Company name with subtle shadow effect -->
                    <text x="50" y="42" text-anchor="middle" dominant-baseline="middle" font-family="Arial, sans-serif" font-size="9" font-weight="bold" fill="currentColor">DEVCENTRIC</text>
                    <text x="50" y="42.3" text-anchor="middle" dominant-baseline="middle" font-family="Arial, sans-serif" font-size="9" font-weight="bold" fill="currentColor" opacity="0.3">DEVCENTRIC</text>
                    <text x="50" y="52" text-anchor="middle" dominant-baseline="middle" font-family="Arial, sans-serif" font-size="7" font-weight="bold" fill="currentColor">STUDIO</text>
                    <text x="50" y="52.3" text-anchor="middle" dominant-baseline="middle" font-family="Arial, sans-serif" font-size="7" font-weight="bold" fill="currentColor" opacity="0.3">STUDIO</text>
                    
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
                    <text x="50" y="62" text-anchor="middle" font-family="monospace" font-size="2.5" font-weight="bold">RC: 6875953</text>
                    
                    <!-- Text curved around bottom semicircle -->
                    <path id="curve" d="M20,65 A30,30 0 0,0 80,65" fill="none" stroke="none"></path>
                    <text font-family="Arial, sans-serif" font-size="4" font-weight="bold">
                        <textPath href="#curve" startOffset="50%" text-anchor="middle">OFFICIAL INVOICE</textPath>
                    </text>
                    
                    <!-- Establishment year -->
                    <text x="50" y="75" text-anchor="middle" font-family="Arial, sans-serif" font-size="3.5" font-weight="bold">EST. 2023</text>
                </svg>
            </div>

            <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-0 opacity-[0.03]">
                <img src="{{ asset('img/devcentric_logo_1.png') }}" class="w-[500px] h-auto object-contain" alt="Watermark">
            </div>

            <!-- Header -->
            <div class="relative z-10 flex flex-col md:flex-row justify-between items-center mb-8">
                <!-- Logo & RC -->
                <div class="flex flex-col items-start">
                    <img src="{{ asset($companyDetails['logo']) }}" alt="Company Logo" class="w-48 mb-2">
                    <span class="text-xs font-bold text-gray-500 tracking-widest">RC: {{ $companyDetails['rc_number'] }}</span>
                </div>

                <!-- Title -->
                <h1 class="text-5xl font-black text-gray-100 tracking-[0.2em] mt-4 md:mt-0">INVOICE</h1>
            </div>

            <!-- Info Bar -->
            <div class="relative z-10 bg-gray-50 rounded-lg p-4 mb-10 flex flex-wrap justify-between items-center gap-4 border border-gray-100">
                <div class="flex flex-col">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Invoice No</span>
                    <span class="text-lg font-bold text-gray-800">{{ $invoice->invoice_number }}</span>
                </div>
                <div class="flex flex-col text-center">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Service Period</span>
                    <span class="text-lg font-bold text-gray-800">April 2026 – April 2027</span>
                </div>
                <div class="flex flex-col text-right">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Date</span>
                    <span class="text-lg font-bold text-gray-800">{{ date('d M Y', strtotime($invoice->date)) }}</span>
                </div>
            </div>

            <!-- Addresses -->
            <div class="relative z-10 flex flex-col md:flex-row justify-between mb-12 gap-10">
                <!-- Bill To -->
                <div class="w-full md:w-1/2">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4 border-b border-gray-100 pb-2">Bill To</h3>
                    <div class="text-gray-700">
                        <p class="font-bold text-xl text-gray-900 mb-1">{{ $invoice->client_name }}</p>
                        @if($invoice->client_address)
                            <p class="text-sm leading-relaxed mb-2 text-gray-500">{{ $invoice->client_address }}</p>
                        @endif
                        <div class="space-y-1 text-sm text-gray-500">
                            @if($invoice->client_email) <p class="flex items-center gap-2">{{ $invoice->client_email }}</p> @endif
                            @if($invoice->client_phone) <p class="flex items-center gap-2">{{ $invoice->client_phone }}</p> @endif
                        </div>
                    </div>
                </div>

                <!-- From -->
                <div class="w-full md:w-1/2 md:text-right">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4 border-b border-gray-100 pb-2">From</h3>
                    <div class="text-gray-700">
                        <p class="font-bold text-xl text-gray-900 mb-1">{{ $companyDetails['name'] }}</p>
                        <div class="space-y-1 text-sm text-gray-500">
                            <p>{{ $companyDetails['phone'] }}</p>
                            <p>{{ $companyDetails['email'] }}</p>
                            <p>{{ $companyDetails['website'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Items Table -->
            <div class="relative z-10 mb-6">
                <table class="w-full">
                    <thead>
                        <tr class="border-b-2 border-gray-100">
                            <th class="py-3 text-left text-xs font-bold text-gray-400 uppercase tracking-wider w-12">#</th>
                            <th class="py-3 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Description</th>
                            <th class="py-3 text-center text-xs font-bold text-gray-400 uppercase tracking-wider w-24">Qty</th>
                            <th class="py-3 text-right text-xs font-bold text-gray-400 uppercase tracking-wider w-32">Price</th>
                            <th class="py-3 text-right text-xs font-bold text-gray-400 uppercase tracking-wider w-32">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($invoice->items as $index => $item)
                            <tr class="py-2">
                                <td class="py-4 text-gray-400 text-sm font-medium">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                <td class="py-4">
                                    <p class="text-gray-800 font-bold text-sm">{{ $item->name }}</p>
                                    @if($item->description)
                                        <p class="text-gray-500 text-xs mt-1">{{ $item->description }}</p>
                                    @endif
                                </td>
                                <td class="py-4 text-center text-gray-600 text-sm">{{ $item->quantity }}</td>
                                <td class="py-4 text-right text-gray-600 text-sm">{{ formatNaira($item->unit_price) }}</td>
                                <td class="py-4 text-right text-gray-900 font-bold text-sm">{{ formatNaira($item->quantity * $item->unit_price) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Totals & Notes -->
            <div class="relative z-10 flex flex-col md:flex-row gap-12">
                <div class="w-full md:w-7/12 space-y-8">
                  
                    <!-- Bank Details -->
                    @if($invoice->status !== 'paid')
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Payment Details</p>
                        <div class="bg-gray-50 rounded p-4 text-sm text-gray-600 space-y-1 border border-gray-100">
                            <div class="flex justify-between"><span class="text-gray-400">Bank:</span> <span class="font-medium text-gray-800">{{ $invoice->bank_name ?? 'Access Bank' }}</span></div>
                            <div class="flex justify-between"><span class="text-gray-400">Account No:</span> <span class="font-bold text-gray-800 tracking-wider">{{ $invoice->account_number ?? '0123456789' }}</span></div>
                            <div class="flex justify-between"><span class="text-gray-400">Account Name:</span> <span class="font-medium text-gray-800">{{ $invoice->account_name ?? 'Devcentric Studio Ltd.' }}</span></div>
                        </div>
                    </div>
                    @endif
                    
                    <!-- Notes -->
                    @if($invoice->notes)
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Notes</p>
                        <p class="text-sm text-gray-500">{!! $invoice->notes !!}</p>
                    </div>
                    @endif
                </div>

                <div class="w-full md:w-5/12">
                    <div class="bg-gray-50 rounded-lg p-6 space-y-3 border border-gray-100">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Subtotal</span>
                            <span class="font-bold text-gray-800">{{ formatNaira($invoice->subtotal) }}</span>
                        </div>
                        @if($invoice->discount > 0)
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Discount</span>
                            <span class="font-bold text-red-500">-{{ formatNaira($invoice->discount) }}</span>
                        </div>
                        @endif
                        @if($invoice->tax_rate > 0)
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">VAT ({{ $invoice->tax_rate }}%)</span>
                            <span class="font-bold text-gray-800">{{ formatNaira($invoice->tax_amount) }}</span>
                        </div>
                        @endif
                        <div class="border-t border-gray-200 pt-4 mt-2 flex justify-between items-center">
                            <span class="text-base font-bold text-gray-800">Total</span>
                            <span class="text-2xl font-black text-indigo-600">{{ formatNaira($invoice->total_amount) }}</span>
                        </div>
                    </div>

                      <!-- Amount in Words -->
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Amount in Words</p>
                        <p class="text-sm text-gray-600 italic capitalize border-l-2 border-gray-200 pl-3">{{ $amountInWords }}</p>
                    </div>

                </div>
            </div>

            <!-- Footer -->
            <div class="relative z-10 mt-16 pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-end">
                <div class="text-xs text-gray-400 italic mb-4 md:mb-0">
                    <p>Thank you for your business!</p>
                    <p>This invoice is valid without a physical signature.</p>
                </div>
                
                <div class="flex flex-col items-center">
                    <div class="mb-2 opacity-80">
                        {!! $invoice->qrCodeSvg !!}
                    </div>
                    <div class="w-32 border-b border-gray-300 mb-1"></div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Authorized Signature</p>
                </div>
            </div>
        </div>
    </div>
    <style>
        .pattern-diagonal-lines {
            background-image: repeating-linear-gradient(45deg, currentColor 0, currentColor 1px, transparent 0, transparent 50%);
            background-size: 10px 10px;
        }
    </style>
</x-filament::page>
