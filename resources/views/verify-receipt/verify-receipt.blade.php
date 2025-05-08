
    {{-- Enhanced debugging information --}}
    <div class="bg-yellow-100 text-yellow-800 p-4 mb-4 rounded-md">
        <h3 class="font-bold">Debug Info:</h3>
        <p>Receipt ID: {{ $receipt->id ?? 'Not available' }}</p>
        <p>Receipt Number: {{ $receipt->receipt_number ?? 'Not available' }}</p>
        <p>Amount: {{ $receipt->amount ?? 'Not available' }}</p>
        <p>Amount in Words: {{ $amountInWords ?? 'Not available' }}</p>
        <p>Payment Method: {{ $receipt->payment_method ?? 'Not available' }}</p>
        <p>FormatNaira function: {{ function_exists('formatNaira') ? 'Available' : 'Not available' }}</p>
        
        {{-- Add a test button to check if JavaScript is working --}}
        <button onclick="document.getElementById('js-test').innerText = 'JavaScript is working!'" 
                class="mt-2 px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
            Test JavaScript
        </button>
        <span id="js-test" class="ml-2">Click to test JS</span>
    </div>
    
    {{-- Add a fallback formatter for the case where formatNaira isn't loaded --}}
    @php
        if (!function_exists('formatNaira')) {
            function formatNaira($amount) {
                $amount = floatval($amount);
                $fractionalPart = $amount - floor($amount);
                if ($fractionalPart > 0) {
                    return '₦' . number_format($amount, 2, '.', ',');
                }
                return '₦' . number_format($amount);
            }
        }
    @endphp
    
    <div>
        <!-- Receipt -->
        <div 
            class="bg-gradient-to-r from-slate-50 to-slate-100 p-6 md:p-10 shadow-2xl rounded-lg border border-gray-200 max-w-5xl mx-auto relative overflow-hidden">
            <!-- Premium subtle background pattern -->
            <div
                class="absolute inset-0 opacity-5 pattern-diagonal-lines pattern-gray-700 pattern-size-2 pattern-bg-transparent">
            </div>

            <!-- Watermark/seal effect -->
            <div class="absolute right-10 bottom-10 opacity-5 transform rotate-12">
                <svg class="w-56 h-56" viewBox="0 0 100 100">
                    <circle cx="50" cy="50" r="45" fill="none" stroke="currentColor" stroke-width="2">
                    </circle>
                    <text x="50" y="50" text-anchor="middle" dominant-baseline="middle" font-family="serif"
                        font-size="12">DEVCENTRIC</text>
                </svg>
            </div>

            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-center md:items-start mb-8 gap-4">
                <!-- Logo & Company Name -->
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('img/devcentric_logo.png') }}" alt="Company Logo" class="w-36 drop-shadow-md">
                    <br>
                    <p class="not-italic font-semibold text-sm">RC: 6875953</p>
                </div>

                <!-- Contact Details -->
                <div class="space-y-1 text-gray-600 italic text-sm md:text-base text-center md:text-right">
                    <p>Tel: 07060741999 | 07071940611</p>
                    <p>devcentric.studio@gmail.com</p>
                    <p>www.devcentricstudio.com</p>
                </div>

                <!-- Receipt Number -->
                <div
                    class="text-gray-700 bg-gray-100 px-4 py-2 rounded-md shadow-sm border border-gray-200 text-center md:text-right">
                    <p class="font-bold text-lg md:text-xl">Receipt No: {{ $receipt->receipt_number }}</p>
                </div>
            </div>

            <!-- Body -->
            <div class="mb-8">
                <!-- Received From & Date -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                    <div class="relative w-full md:w-1/2">
                        <p class="font-semibold text-gray-700">Received from: <span
                                class="font-normal">{{ $receipt->received_from }}</span></p>
                        <div class="border-b-2 border-dotted border-gray-300 mt-1"></div>
                    </div>

                    <div class="relative w-full md:w-1/2 text-left md:text-right">
                        <p class="font-semibold text-gray-700">Date:
                            <span
                                class="font-normal">{{ \Carbon\Carbon::parse($receipt->date)->format('d-m-Y') }}</span>
                        </p>
                        <div class="border-b-2 border-dotted border-gray-300 mt-1"></div>
                    </div>
                </div>

                <!-- Amount in Words -->
                <div class="mb-6 bg-gray-50 p-4 rounded-md border-l-4 border-indigo-500 shadow-sm">
                    <p class="font-semibold text-gray-700">Amount (in words): <span
                            class="font-normal italic">{{ $amountInWords }}</span></p>
                </div>

                <!-- Amount -->
                <div
                    class="flex justify-between items-center bg-gradient-to-r from-indigo-50 to-blue-50 p-5 rounded-lg text-xl font-bold mb-8 shadow-md border border-indigo-100">
                    <p class="text-gray-700">Total Amount:</p>
                    <span class="text-indigo-700">{{ formatNaira($receipt->amount) }}</span>
                </div>

                <!-- Payment For -->
                <div class="flex flex-col md:flex-row items-start md:items-center mb-10 gap-2">
                    <span class="font-semibold text-gray-700 md:mr-4 whitespace-nowrap">Payment For:</span>
                    <div class="relative flex-grow w-full">
                        <p class="text-left md:text-center p-2 bg-gray-50 rounded-md">{{ $receipt->payment_for }}</p>
                        <div class="border-b-2 border-dotted border-gray-300 w-full"></div>
                    </div>
                </div>
            </div>

            <!-- Deposit & Balance Due Section -->
            <div class="flex flex-col mb-8">
                <div class="flex flex-col md:flex-row md:items-center gap-6 mb-8">
                    <!-- Deposit -->
                    <div class="w-full md:w-1/2 flex flex-col md:flex-row md:items-center relative">
                        <span class="font-semibold text-gray-700 mb-1 md:mb-0 md:mr-2">Deposit:</span>
                        <span
                            class="md:ml-2 p-2 bg-gray-50 rounded-md w-full md:w-auto text-center">{{ formatNaira($receipt->deposit) }}</span>
                        <div
                            class="border-b-2 border-dotted border-gray-300 absolute bottom-0 left-0 right-0 md:hidden">
                        </div>
                    </div>

                    <!-- Balance Due -->
                    <div class="w-full md:w-1/2 flex flex-col md:flex-row md:items-center relative mt-4 md:mt-0">
                        <span class="font-semibold text-gray-700 mb-1 md:mb-0 md:mr-2">Balance Due:</span>
                        <span
                            class="md:ml-2 p-2 bg-gray-50 rounded-md w-full md:w-auto text-center text-red-600">{{ formatNaira($receipt->balance_due) }}</span>
                        <div
                            class="border-b-2 border-dotted border-gray-300 absolute bottom-0 left-0 right-0 md:hidden">
                        </div>
                    </div>
                </div>

                <!-- Payment Methods & Authorized Signature -->
                <div class="flex flex-col md:flex-row justify-between gap-8">
                    <!-- Payment Methods -->
                    <div class="flex flex-wrap gap-4 items-center">
                        <p class="font-semibold text-gray-700 w-full md:w-auto">Payment Method:</p>
                        <label
                            class="flex items-center space-x-2 text-gray-600 bg-white px-3 py-2 rounded-md shadow-sm border border-gray-200">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600" value="cash"
                                @if ($receipt->payment_method == 'cash') checked @endif>
                            <span>Cash</span>
                        </label>

                        <label
                            class="flex items-center space-x-2 text-gray-600 bg-white px-3 py-2 rounded-md shadow-sm border border-gray-200">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600" value="pos"
                                @if ($receipt->payment_method == 'pos') checked @endif>
                            <span>POS</span>
                        </label>

                        <label
                            class="flex items-center space-x-2 text-gray-600 bg-white px-3 py-2 rounded-md shadow-sm border border-gray-200">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600" value="bank_transfer"
                                @if ($receipt->payment_method == 'bank_transfer') checked @endif>
                            <span>Bank Transfer</span>
                        </label>
                    </div>

                    <!-- Authorized Signature -->
                    <div class="flex-1 flex flex-col items-center md:items-end">
                        <div class="flex flex-col items-center">
                            <div class="mb-2 bg-white p-1 rounded-md shadow-sm">
                                {!! $receipt->qrCodeSvg !!}
                            </div>
                            <div class="border-b-2 border-gray-400 w-48 mb-2"></div>
                            <p class="font-semibold text-gray-700">Authorized Signature</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-10 pt-6 border-t border-gray-200 text-center text-gray-500 text-sm italic">
                <p>Thank you for your business!</p>
                <p class="mt-1">This receipt was generated electronically and is valid without a physical signature.</p>
            </div>
        </div>
    </div>

    <style>
        .pattern-diagonal-lines {
            background-image: repeating-linear-gradient(45deg, currentColor 0, currentColor 1px, transparent 0, transparent 50%);
            background-size: 10px 10px;
            opacity: 0.5; /* Ensure visibility */
            pointer-events: none; /* Don't interfere with elements below */
        }
        
        /* Ensure guest layout doesn't interfere with our styling */
        body {
            background-color: #f3f4f6;
            min-height: 100vh;
        }
        
        /* Ensure the container is properly visible */
        .receipt-container {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
    </style>

