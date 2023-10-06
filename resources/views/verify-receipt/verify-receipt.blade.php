<x-guest-layout>
    <div class="bg-gradient-to-r from-gray-100 to-gray-200 p-4 md:p-10 shadow-xl rounded-lg">

    <!-- Header -->
    <div class="flex flex-wrap justify-between items-start mb-8">
        <!-- Logo & Company Name -->
        <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 space-x-0 md:space-x-4 w-full md:w-auto mb-4 md:mb-0">
            <img src="{{ asset('img/offical_logo_black.png') }}" alt="Company Logo"
                class="w-16 h-16 shadow-md rounded-full">
            <h1 class="font-serif font-bold text-xl md:text-2xl text-gray-700">Devcentric Studio</h1>
        </div>

        <!-- Contact Details -->
        <div class="space-y-1 text-gray-600 italic mb-4 md:mb-0">
            <p>Tel: 07060741999</p>
            <p>devcentric.studio@gmail.com</p>
            <p>www.devcentricstudio.com</p>
        </div>

        <!-- Receipt Number -->
        <div class="text-gray-600 w-full mt-4 md:mt-0">
            <p class="font-bold text-lg md:text-xl">Receipt No: {{ $receipt->receipt_number }}</p>
        </div>
    </div>

    <!-- Body -->
    <div class="mb-6">
        <!-- Received From & Date -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <div class="relative w-full md:w-1/2 mb-4 md:mb-0">
                <p class="font-semibold text-gray-600">Received from: {{ $receipt->received_from }}</p>
                <div class="border-b-2 border-dotted"></div>
            </div>

            <div class="relative w-full md:w-1/2 text-right">
                <p class="font-semibold text-gray-600">Date:
                    {{ \Carbon\Carbon::parse($receipt->date)->format('d-m-Y') }}</p>
                <div class="border-b-2 border-dotted"></div>
            </div>
        </div>

        <!-- Amount in Words -->
        <div class="mb-4">
            <p class="font-semibold text-gray-600">Total Amount (in words): {{$amountInWords}}</p>
        </div>
        <!-- Amount -->
        <div class="flex justify-between items-center bg-gray-300 p-5 rounded-lg text-xl font-bold mb-8 shadow-md">
            <p>Amount:</p>
            <span>{{ formatNaira($receipt->amount) }}</span>
        </div>

        <!-- Payment For -->
        <div class="flex flex-col md:flex-row items-center mb-10">
            <span class="font-semibold text-gray-600 mr-4 mb-4 md:mb-0">Payment For:</span>
            <div class="relative flex-grow">
                <p class="text-center">{{ $receipt->payment_for }}</p>
                <div class="border-b-2 border-dotted w-full"></div>
            </div>
        </div>
    </div>

    <!-- Deposit & Balance Due Section -->
    <div class="flex flex-col mb-8">
        <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-8 mb-8">
            <!-- Deposit -->
            <div class="w-full md:w-1/2 flex items-center relative">
                <span class="font-semibold text-gray-600 mr-2">Deposit:</span>
                <span class="ml-2">{{ formatNaira($receipt->deposit) }}</span>
                <div class="border-b-2 border-dotted absolute bottom-0 left-0 right-0"></div>
            </div>

            <!-- Balance Due -->
            <div class="w-full md:w-1/2 flex items-center relative">
                <span class="font-semibold text-gray-600 mr-2">Balance Due:</span>
                <span class="text-center ml-2">{{ formatNaira($receipt->balance_due) }}</span>
                <div class="border-b-2 border-dotted absolute bottom-0 left-0 right-0"></div>
            </div>
        </div>

        <!-- Payment Methods & Authorized Signature -->
        <div class="flex flex-col md:flex-row justify-between">
            <!-- Payment Methods -->
            <div class="flex space-x-4 items-center mb-4 md:mb-0">
                <label class="flex items-center space-x-2 text-gray-600">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" value="cash"
                        @if ($receipt->payment_method == 'cash') checked @endif>
                    <span>Cash</span>
                </label>

                <label class="flex items-center space-x-2 text-gray-600">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" value="pos"
                        @if ($receipt->payment_method == 'pos') checked @endif>
                    <span>POS</span>
                </label>

                <label class="flex items-center space-x-2 text-gray-600">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" value="bank_transfer"
                        @if ($receipt->payment_method == 'bank transfer') checked @endif>
                    <span>Bank Transfer</span>
                </label>
            </div>

            <!-- Authorized Signature -->
            <div class="flex-1 flex flex-col items-end">
                <div class="flex flex-col items-center">
                    <div class="mb-2">
                        {!! $receipt->qrCodeSvg !!}
                    </div>
                    <div class="border-b-2 border-dotted w-48 mb-2"></div>
                    <p class="font-semibold text-gray-600">Authorized Signature</p>
                </div>
            </div>
        </div>
    </div>
</div>
</x-guest-layout>