{{-- pdf-receipt view --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt {{ $receipt->receipt_number }}</title>
    <style>
        @page {
            margin: 1cm 1cm;
            size: A4 portrait;
        }

        html,
        body {
            height: auto;
            margin: 0;
            padding: 0;
        }

        .receipt-container {
            width: 100%;
            margin: 0 auto;
            padding: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            background: linear-gradient(to right, #f8fafc, #f1f5f9);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
            box-sizing: border-box;
        }

        /* Background pattern effect */
        .pattern-diagonal-lines {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: repeating-linear-gradient(45deg, rgba(0, 0, 0, 0.02) 0, rgba(0, 0, 0, 0.02) 1px, transparent 0, transparent 50%);
            background-size: 10px 10px;
            opacity: 0.5;
            z-index: 0;
        }

        /* Watermark/seal effect */
        .watermark {
            position: absolute;
            right: 10%;
            bottom: 10%;
            opacity: 0.05;
            transform: rotate(12deg);
            z-index: 0;
        }

        .watermark svg {
            width: 200px;
            height: 200px;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
            flex-wrap: wrap;
        }

        .logo-company {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo {
            width: 80px;
            height: auto;
            object-fit: contain;
            /* Ensure logo displays properly */
            display: block;
        }

        .company-info {
            font-style: italic;
            font-size: 9pt;
            color: #64748b;
            text-align: right;
        }

        .receipt-number {
            text-align: right;
            font-size: 12pt;
            font-weight: bold;
            color: #1e293b;
            padding: 8px 12px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .rc-number {
            font-style: normal;
            font-weight: 600;
            font-size: 9pt;
        }

        /* Body */
        .body-section {
            position: relative;
            z-index: 1;
            margin-bottom: 15px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .field {
            width: 48%;
            position: relative;
        }

        .field-label {
            font-weight: 600;
            color: #475569;
            margin-bottom: 3px;
            font-size: 9pt;
        }

        .field-value {
            margin-top: 3px;
            border-bottom: 1px dotted #cbd5e0;
            padding-bottom: 3px;
            font-size: 10pt;
        }

        .amount-words {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f8fafc;
            border-left: 4px solid #6366f1;
            border-radius: 4px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            font-size: 9pt;
        }

        .amount-words .field-value {
            font-style: italic;
            border-bottom: none;
        }

        .amount-box {
            background: linear-gradient(to right, #f0f4ff, #e0e7ff);
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 12pt;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            border: 1px solid #e0e7ff;
        }

        .amount-box span:last-child {
            color: #4f46e5;
        }

        .payment-for {
            margin-bottom: 15px;
        }

        .payment-for .field-value {
            padding: 8px;
            text-align: center;
            background-color: #f8fafc;
            border-radius: 4px;
        }

        /* Deposit & Balance Due Section */
        .deposit-section {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .deposit-field {
            flex: 1;
            display: flex;
            align-items: center;
            background-color: #f8fafc;
            padding: 8px;
            border-radius: 4px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .deposit-field .field-label {
            margin-right: 8px;
            margin-bottom: 0;
        }

        .deposit-field .field-value {
            margin-top: 0;
            border-bottom: none;
            flex: 1;
            text-align: center;
            padding: 4px;
            background-color: white;
            border-radius: 4px;
        }

        .deposit-field:nth-child(2) .field-value {
            color: #ef4444;
        }

        /* Payment Methods & Signature */
        .payment-signature {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .payment-method {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .payment-method-label {
            font-weight: 600;
            color: #475569;
            font-size: 9pt;
            margin-bottom: 5px;
            display: block;
            width: 100%;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            background-color: white;
            padding: 6px 10px;
            border-radius: 4px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            font-size: 9pt;
        }

        .checkbox {
            width: 12px;
            height: 12px;
            border: 1px solid #a0aec0;
            border-radius: 3px;
            margin-right: 6px;
            display: inline-block;
            position: relative;
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

        .signature {
            text-align: center;
        }

        .qrcode {
            background-color: white;
            padding: 6px;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 5px;
        }

        .qrcode svg {
            width: 80px;
            height: 80px;
        }

        .signature-line {
            width: 120px;
            border-bottom: 2px solid #94a3b8;
            margin: 8px auto;
        }

        .signature-text {
            text-align: center;
            font-weight: 600;
            color: #475569;
            font-size: 9pt;
        }

        /* Footer */
        .footer {
            margin-top: 10px;
            text-align: center;
            font-size: 7pt;
            color: #64748b;
            font-style: italic;
            border-top: 1px solid #e2e8f0;
            padding-top: 5px;
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>
    <div class="receipt-container">
        <!-- Background pattern -->
        <div class="pattern-diagonal-lines"></div>

        <!-- Watermark/seal effect -->
        <!-- Removed the DEVCENTRIC watermark as requested -->

        <!-- Header -->
        <div class="header">
            <!-- Logo & Company Name -->
            <div class="logo-company">
                @if (isset($companyLogo) && !empty($companyLogo))
                    <img src="{{ $companyLogo }}" alt="Company Logo" class="logo">
                @else
                    <!-- Fallback SVG logo -->
                    <div class="logo"
                        style="background-color: #f0f4ff; border-radius: 50%; width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                        <span style="font-weight: bold; color: #4f46e5; font-size: 24px;">DS</span>
                    </div>
                @endif
                <div>
                    <h1 style="font-size: 14pt; font-weight: bold; margin: 0 0 3px 0; color: #1e293b;">Devcentric Studio
                    </h1>
                    <p class="rc-number">RC: 6875953</p>
                </div>
            </div>

            <!-- Contact Details -->
            <div class="company-info">
                <p style="margin: 0 0 2px 0;">Tel: 07060741999 | 07071940611</p>
                <p style="margin: 0 0 2px 0;">devcentric.studio@gmail.com</p>
                <p style="margin: 0 0 2px 0;">www.devcentricstudio.com</p>
            </div>

            <!-- Receipt Number -->
            <div class="receipt-number">
                <p style="margin: 0;">Receipt No: {{ $receipt->receipt_number }}</p>
            </div>
        </div>

        <!-- Body -->
        <div class="body-section">
            <!-- Received From & Date -->
            <div class="row">
                <div class="field">
                    <div class="field-label">Received from:</div>
                    <div class="field-value">{{ $receipt->received_from }}</div>
                </div>
                <div class="field" style="text-align: right;">
                    <div class="field-label">Date:</div>
                    <div class="field-value">{{ \Carbon\Carbon::parse($receipt->date)->format('d-m-Y') }}</div>
                </div>
            </div>

            <!-- Amount in Words -->
            <div class="amount-words">
                <div class="field-label">Amount (in words):</div>
                <div class="field-value">{{ $amountInWords }}</div>
            </div>

            <!-- Amount -->
            <div class="amount-box">
                <span>Total Amount:</span>
                <span>₦{{ number_format($receipt->amount, 2) }}</span>
            </div>

            <!-- Payment For -->
            <div class="payment-for">
                <div class="field-label">Payment For:</div>
                <div class="field-value">{{ $receipt->payment_for }}</div>
            </div>

            <!-- Deposit & Balance Due Section -->
            <div class="deposit-section">
                <div class="deposit-field">
                    <div class="field-label">Deposit:</div>
                    <div class="field-value">₦{{ number_format($receipt->deposit, 2) }}</div>
                </div>
                <div class="deposit-field">
                    <div class="field-label">Balance Due:</div>
                    <div class="field-value">₦{{ number_format($receipt->balance_due, 2) }}</div>
                </div>
            </div>

            <!-- Payment Methods & Signature -->
            <div class="payment-signature">
                <div>
                    <div class="payment-method-label">Payment Method:</div>
                    <div class="payment-method">
                        <div class="checkbox-group">
                            <div class="checkbox {{ $receipt->payment_method == 'cash' ? 'checked' : '' }}"></div>
                            <span>Cash</span>
                        </div>
                        <div class="checkbox-group">
                            <div class="checkbox {{ $receipt->payment_method == 'pos' ? 'checked' : '' }}"></div>
                            <span>POS</span>
                        </div>
                        <div class="checkbox-group">
                            <div class="checkbox {{ $receipt->payment_method == 'bank_transfer' ? 'checked' : '' }}">
                            </div>
                            <span>Bank Transfer</span>
                        </div>
                    </div>
                </div>
                <div class="signature">
                    <div class="qrcode">
                        {!! $qrCode !!}
                    </div>
                    <div class="signature-line"></div>
                    <div class="signature-text">Authorized Signature</div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p style="margin: 0 0 3px 0;">Thank you for your business!</p>
            <p style="margin: 0;">This receipt was generated electronically and is valid without a physical signature.
            </p>
        </div>
    </div>
</body>

</html>
