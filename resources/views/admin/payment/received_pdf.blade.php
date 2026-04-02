<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payment Receipt</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #555;
            font-size: 14px;
            line-height: 24px;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 5px;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
        }

        .heading {
            background: #eee;
            font-weight: bold;
        }

        .item {
            border-bottom: 1px solid #eee;
        }

        .total {
            font-weight: bold;
            border-top: 2px solid #eee;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .information {
            margin-bottom: 30px;
        }

        .logo {
            max-width: 100px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table>
            <tr>
                <td class="title">
                    <img src="{{ public_path('images/wh logo@4x-200h.png') }}" class="logo">
                </td>
                <td class="text-right">
                    Invoice #: {{ $payment->id }}<br>
                    Created: {{ \Carbon\Carbon::parse($payment->date)->format('d M, Y') }}<br>
                    Due: {{ \Carbon\Carbon::parse($payment->due_date ?? $payment->date)->format('d M, Y') }}
                </td>
            </tr>
        </table>

        <div class="information">
            <table>
                <tr>
                    <td class="text-left">
                        <strong>{{ config('app.name') }}</strong><br>
                        {{ $address->full_address }}<br>
                        {{ $address->email }}<br>
                        {{ $address->phone }}
                    </td>
                    <td class="text-right">
                        <strong>Agent</strong><br>
                        {{ $agent->name ?? 'N/A' }}<br>
                        {{ $agent->email ?? 'N/A' }}<br>
                        {{ $agent->phone ?? 'N/A' }}<br>
                        {{ $agent->address ?? 'N/A' }}
                    </td>
                </tr>
            </table>
        </div>

        <table>
            <tr class="heading">
                <td>Item</td>
                <td class="text-right">Price</td>
            </tr>
            <tr class="item">
                <td>{{ $payment->amount?->particulars ?? 'Payment Details' }}</td>
                <td class="text-right">{{ number_format($payment->amount?->amount, 2) }} {{ $payment->currency }}</td>
            </tr>
            <tr class="item">
                <td>Paid</td>
                <td class="text-right">{{ number_format($payment->paid, 2) }} {{ $payment->currency }}</td>
            </tr>
            <tr class="item">
                <td>Due</td>
                <td class="text-right">{{ number_format(($payment->amount?->amount ?? 0) - $payment->amount?->payments->sum('paid'), 2) }} {{ $payment->currency }}</td>
            </tr>
            <tr class="total">
                <td></td>
                <td class="text-right">Total: {{ number_format($payment->amount?->amount, 2) }} {{ $payment->currency }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
