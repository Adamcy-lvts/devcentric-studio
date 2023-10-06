<x-filament::page>
    <div class="bg-gradient-to-r from-gray-100 to-gray-200 p-10 shadow-xl rounded-lg">

        <!-- Header -->
        <div class="flex justify-between items-start mb-8">
            <!-- Logo & Company Name -->
            <div class="flex items-center space-x-4">
                <img src="{{ asset('img/offical_logo_black.png') }}" alt="Company Logo"
                    class="w-16 h-16 shadow-md rounded-full">
                <h1 class="font-serif font-bold text-2xl text-gray-700">Devcentric Studio</h1>
            </div>

            <!-- Contact Details -->
            <div class="space-y-1 text-gray-600 italic">
                <p>Tel: 07060741999</p>
                <p>devcentric.studio@gmail.com</p>
                <p>www.devcentricstudio.com</p>
            </div>



            <!-- Receipt Number -->
            <div class="text-gray-600">
                <p class="font-bold text-xl">Receipt No: {{ $receipt->receipt_number }}</p>
            </div>
        </div>

        <!-- Body -->
        <div class="mb-6">

            <!-- Received From & Date -->
            <div class="flex justify-between items-center mb-6">
                <div class="relative w-1/2">
                    <p class="font-semibold text-gray-600">Received from: {{ $receipt->received_from }}</p>
                    <div class="border-b-2 border-dotted"></div>
                </div>

                <div class="relative w-1/2 text-right">
                    <p class="font-semibold text-gray-600">Date:
                        {{ \Carbon\Carbon::parse($receipt->date)->format('d-m-Y') }}</p>
                    <div class="border-b-2 border-dotted"></div>
                </div>
            </div>

            <!-- Amount in Words -->
            <div class="mb-4">
                <p class="font-semibold text-gray-600">Amount (in words): {{$amountInWords}}</p>
            </div>
            <!-- Amount -->
            <div class="flex justify-between items-center bg-gray-300 p-5 rounded-lg text-xl font-bold mb-8 shadow-md">
                <p>Total Amount:</p>
                <span>{{ formatNaira($receipt->amount) }}</span>
            </div>

            <!-- Payment For -->
            <div class="flex items-center mb-10">
                <span class="font-semibold text-gray-600 mr-4">Payment For:</span>
                <div class="relative flex-grow">
                    <p class="text-center">{{ $receipt->payment_for }}</p>
                    <div class="border-b-2 border-dotted w-full"></div>
                </div>
            </div>

        </div>

        <!-- Deposit & Balance Due Section -->
        <div class="flex flex-col mb-8">
            <div class="flex items-center space-x-8 mb-8">
                <!-- Deposit -->
                <div class="w-1/2 flex items-center relative">
                    <span class="font-semibold text-gray-600 mr-2">Deposit:</span>
                    <span class="ml-2">{{ formatNaira($receipt->deposit) }}</span>
                    <div class="border-b-2 border-dotted absolute bottom-0 left-0 right-0"></div>
                </div>

                <!-- Balance Due -->
                <div class="w-1/2 flex items-center relative">
                    <span class="font-semibold text-gray-600 mr-2">Balance Due:</span>
                    <span class="text-center ml-2">{{ formatNaira($receipt->balance_due) }}</span>
                    <div class="border-b-2 border-dotted absolute bottom-0 left-0 right-0"></div>
                </div>
            </div>

            <!-- Payment Methods & Authorized Signature -->
            <div class="flex justify-between">
                <!-- Payment Methods -->
                <div class="flex space-x-4 items-center">
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

{{-- <div style="background: linear-gradient(to right, #f7fafc, #edf2f7); padding: 10px; box-shadow: 0px 10px 15px -3px rgba(0, 0, 0, 0.1); border-radius: 10px;">

    <!-- Header -->
    <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 32px;">
        <!-- Logo & Company Name -->
        <div style="display: flex; align-items: center; gap: 16px;">
            <img src="{{ asset('img/offical_logo_black.png') }}" alt="Company Logo"
                 style="width: 64px; height: 64px; box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1); border-radius: 50%;">
            <h1 style="font-family: serif; font-weight: bold; font-size: 24px; color: #4a5568;">Devcentric Studio</h1>
        </div>

        <!-- Contact Details -->
        <div style="gap: 8px; color: #a0aec0; font-style: italic;">
            <p>Tel: 07060741999</p>
            <p>devcentric.studio@gmail.com</p>
            <p>www.devcentricstudio.com</p>
        </div>

        <!-- Receipt Number -->
        <div style="color: #a0aec0;">
            <p style="font-weight: bold; font-size: 20px;">Receipt No: {{ $receipt->receipt_number }}</p>
        </div>
    </div>

    <!-- Body -->
    <div style="margin-bottom: 24px;">
        <!-- Received From & Date -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <div style="position: relative; width: 50%;">
                <p style="font-weight: 600; color: #718096;">Received from: {{ $receipt->received_from }}</p>
                <div style="border-bottom: 2px dotted;"></div>
            </div>
            <div style="position: relative; width: 50%; text-align: right;">
                <p style="font-weight: 600; color: #718096;">Date:
                    {{ \Carbon\Carbon::parse($receipt->date)->format('d-m-Y') }}</p>
                <div style="border-bottom: 2px dotted;"></div>
            </div>
        </div>

        <!-- Amount in Words -->
        <div style="margin-bottom: 16px;">
            <p style="font-weight: 600; color: #718096;">Amount (in words): {{$amountInWords}}</p>
        </div>

        <!-- Amount -->
        <div style="display: flex; justify-content: space-between; align-items: center; background-color: #e2e8f0; padding: 5px; border-radius: 10px; font-size: 20px; font-weight: bold; margin-bottom: 32px; box-shadow: 0px 4px 6px -1px rgba(0, 0, 0, 0.1);">
            <p>Amount:</p>
            <span>{{ formatNaira($receipt->amount) }}</span>
        </div>

        <!-- Payment For -->
        <div style="display: flex; align-items: center; margin-bottom: 40px;">
            <span style="font-weight: 600; color: #718096; margin-right: 16px;">Payment For:</span>
            <div style="position: relative; flex: 1;">
                <p style="text-align: center;">{{ $receipt->payment_for }}</p>
                <div style="border-bottom: 2px dotted; width: 100%;"></div>
            </div>
        </div>
    </div>

    <!-- Deposit & Balance Due Section -->
    <div style="display: flex; flex-direction: column; margin-bottom: 32px;">
        <div style="display: flex; align-items: center; gap: 32px; margin-bottom: 32px;">
            <!-- Deposit -->
            <div style="width: 50%; display: flex; align-items: center; position: relative;">
                <span style="font-weight: 600; color: #718096; margin-right: 8px;">Deposit:</span>
                <span style="margin-left: 8px;">{{ formatNaira($receipt->deposit) }}</span>
                <div style="border-bottom: 2px dotted; position: absolute; bottom: 0; left: 0; right: 0;"></div>
            </div>

            <!-- Balance Due -->
            <div style="width: 50%; display: flex; align-items: center; position: relative;">
                <span style="font-weight: 600; color: #718096; margin-right: 8px;">Balance Due:</span>
                <span style="text-align: center; margin-left: 8px;">{{ formatNaira($receipt->balance_due) }}</span>
                <div style="border-bottom: 2px dotted; position: absolute; bottom: 0; left: 0; right: 0;"></div>
            </div>
        </div>

        <!-- Payment Methods & Authorized Signature -->
        <div style="display: flex; justify-content: space-between;">
            <!-- Payment Methods -->
            <div style="display: flex; gap: 16px; align-items: center;">
                <!-- Here are the checkboxes. Note that the inline styling might not match exactly how Tailwind presents them. -->
                <!-- ... -->
            </div>

            <!-- Authorized Signature -->
            <div style="flex: 1; display: flex; flex-direction: column; align-items: end;">
                <div style="display: flex; flex-direction: column; align-items: center;">
                    <div style="margin-bottom: 8px;">
                        {!! $receipt->qrCodeSvg !!}
                    </div>
                    <div style="border-bottom: 2px dotted; width: 192px; margin-bottom: 8px;"></div>
                    <p style="font-weight: 600; color: #718096;">Authorized Signature</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}


</x-filament::page>
