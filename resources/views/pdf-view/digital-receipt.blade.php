<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice {{ $receipt->receipt_number }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {!! isset($customCss) ? $customCss : '' !!}
    <style>
        @page {
            margin: 0.3cm;
            size: A4 landscape;
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
                        <text x="0" y="4" font-size="1.5" fill="currentColor" opacity="0.7">SECURE RECEIPT RC:6875953
                            SECURE RECEIPT RC:6875953 SECURE RECEIPT</text>
                        <text x="0" y="6" font-size="1.5" fill="currentColor" opacity="0.7">DEVCENTRIC STUDIO AUTHENTIC
                            DOCUMENT DEVCENTRIC STUDIO AUTHENTIC DOCUMENT</text>
                        <text x="0" y="8" font-size="1.5" fill="currentColor" opacity="0.7">SECURE RECEIPT RC:6875953
                            SECURE RECEIPT RC:6875953 SECURE RECEIPT</text>
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
                    <textPath href="#curve" startOffset="50%" text-anchor="middle">OFFICIAL RECEIPT</textPath>
                </text>

                <!-- Establishment year -->
                <text x="50" y="75" text-anchor="middle" font-family="Arial, sans-serif" font-size="3.5"
                    font-weight="bold">EST. 2023</text>
            </svg>
        </div>

        <!-- Header -->
        <div class="flex justify-between items-start relative z-10 mb-4 gap-4">
            <!-- Logo & Company Name -->
            <div class="flex items-center">
                @if (isset($companyLogo) && !empty($companyLogo))
                    <img src="{{ $companyLogo }}" alt="Company Logo" class="h-9 mr-2 drop-shadow-md">
                @else
                    <img src="{{ asset('img/devcentric_logo.png') }}" alt="Company Logo" class="h-9 mr-2 drop-shadow-md">
                @endif
                <p class="not-italic font-semibold text-xs">RC: 6875953</p>
            </div>

            <!-- Contact Details -->
            <div class="text-gray-600 italic text-xs text-right">
                <p>Tel: 07060741999 | 07071940611</p>
                <p>devcentric.studio@gmail.com</p>
                <p>www.devcentricstudio.com</p>
            </div>

            <!-- Receipt Number -->
            <div class="text-gray-700 bg-gray-100 px-3 py-1 rounded shadow-sm border border-gray-200 text-right">
                <p class="font-bold text-base">Receipt No: {{ $receipt->receipt_number }}</p>
            </div>
        </div>

        <!-- Received From & Date -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <div class="relative w-full md:w-1/2">
                <p class="font-semibold text-gray-700">Received from: <span class="font-normal">{{ $receipt->received_from }}</span>
                </p>
                <div class="border-b-2 border-dotted border-gray-300 mt-1"></div>
            </div>

            <div class="relative w-full md:w-1/2 text-left md:text-right">
                <p class="font-semibold text-gray-700">Date:
                    <span class="font-normal">{{ \Carbon\Carbon::parse($receipt->date)->format('d-m-Y') }}</span>
                </p>
                <div class="border-b-2 border-dotted border-gray-300 mt-1"></div>
            </div>
        </div>

        <!-- Amount in Words -->
        <div class="mb-6 bg-gray-50 p-4 rounded-md border-l-4 border-indigo-500 shadow-sm">
            <p class="font-semibold text-gray-700">Amount (in words): <span class="font-normal italic">{{ $amountInWords }}</span></p>
        </div>

        <!-- Amount -->
        <div class="flex justify-between items-center bg-gradient-to-r from-indigo-50 to-blue-50 p-5 rounded-lg text-lg font-bold mb-4 shadow-md border border-indigo-100">
            <p class="text-gray-700">Total Amount:</p>
            <span class="text-indigo-700">{{ formatNaira($receipt->amount) }}</span>
        </div>

        <!-- Payment For -->
        <div class="flex items-start mb-6 gap-2">
            <span class="font-semibold text-gray-700 whitespace-nowrap">Payment For:</span>
            <div class="relative flex-grow">
                <p class="text-left p-2 bg-gray-50 rounded-md">{{ $receipt->payment_for }}</p>
                <div class="border-b-2 border-dotted border-gray-300 w-full"></div>
            </div>
        </div>

        <!-- Deposit & Balance Due Section -->
        <div class="flex flex-col mb-4">
            <div class="flex flex-col md:flex-row md:items-center gap-6 mb-4">
                <!-- Deposit -->
                <div class="w-full md:w-1/2 flex flex-col md:flex-row md:items-center relative">
                    <span class="font-semibold text-gray-700 mb-1 md:mb-0 md:mr-2">Deposit:</span>
                    <span class="md:ml-2 p-2 bg-gray-50 rounded-md w-full md:w-auto text-center text-green-600 font-semibold">{{ formatNaira($receipt->deposit) }}</span>
                    <div class="border-b-2 border-dotted border-gray-300 absolute bottom-0 left-0 right-0 md:hidden">
                    </div>
                </div>

                <!-- Balance Due -->
                <div class="w-full md:w-1/2 flex flex-col md:flex-row md:items-center relative mt-4 md:mt-0">
                    <span class="font-semibold text-gray-700 mb-1 md:mb-0 md:mr-2">Balance Due:</span>
                    <span class="md:ml-2 p-2 bg-gray-50 rounded-md w-full md:w-auto text-center text-red-600 font-semibold">{{ formatNaira($receipt->balance_due) }}</span>
                    <div class="border-b-2 border-dotted border-gray-300 absolute bottom-0 left-0 right-0 md:hidden">
                    </div>
                </div>
            </div>

            <!-- Payment Methods & Authorized Signature -->
            <div class="flex flex-col md:flex-row justify-between gap-8">
                <!-- Payment Methods -->
                <div class="flex flex-wrap gap-4 items-center">
                    <p class="font-semibold text-gray-700 w-full md:w-auto">Payment Method:</p>
                    <label class="flex items-center space-x-2 text-gray-600 bg-white px-3 py-2 rounded-md shadow-sm border border-gray-200">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600" value="cash" @if ($receipt->payment_method == 'cash') checked @endif>
                        <span>Cash</span>
                    </label>

                    <label class="flex items-center space-x-2 text-gray-600 bg-white px-3 py-2 rounded-md shadow-sm border border-gray-200">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600" value="pos" @if ($receipt->payment_method == 'pos') checked @endif>
                        <span>POS</span>
                    </label>

                    <label class="flex items-center space-x-2 text-gray-600 bg-white px-3 py-2 rounded-md shadow-sm border border-gray-200">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600" value="bank_transfer" @if ($receipt->payment_method == 'bank_transfer') checked @endif>
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
        <div class="mt-2 pt-2 border-t border-gray-200 text-center text-gray-500 text-xs italic relative z-10">
            <p>Thank you for your business!</p>
            <p>This receipt was generated electronically and is valid without a physical signature.</p>
        </div>
    </div>
</body>

