@extends('admin.app')
@section('title', 'Payment Receipt')

@section('content')
<style>
        .content-body{
            background-color: #fff !important;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {


            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
            .invoice-box.rtl {
                direction: rtl;
                font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            }

            .invoice-box.rtl table {
                text-align: right;
            }

            .invoice-box.rtl table tr td:nth-child(2) {
                text-align: left;
            }


            @media print {
                @page {
                    size: A4 portrait;
                    margin: 20mm;
                }

                .invoice-box {
                                box-shadow: none !important;
                                border: none !important;
                            }

                body, html {
                    margin: 0;
                    padding: 0;
                    width: 100%;
                    height: auto;
                    font-size: 12px;
                }

                .sidebar,
                .navbar,
                .footer {
                    display: none !important;
                    height: 0 !important;
                    margin: 0 !important;
                    padding: 0 !important;
                    visibility: hidden !important;
                }

                .custom-form1 {
                    padding-left: 45px !important;
                }

                .content {
                    position: absolute !important;
                    left: 10px !important;
                    top: 0 !important;
                    width: calc(100% - 60px) !important;
                    height: 100% !important;
                    transition: all 0.5s ease !important;
                    overflow: auto !important;
                }

                .noPrint {
                    display: none !important;
                }
                .print-btn {
                    display: none !important;
                }

                .yesPrint {
                    display: block !important;
                }

                .print-btn {
                    display: none !important;  /* Hide the print button when printing */
                }
            }

    </style>

                <div class="container py-4 noPrint">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="mb-0">Invoice</h4>
                            <a href="{{ route('amount.index') }}" class="btn btn-outline-secondary">
                                <i class="ri-arrow-left-line me-1"></i> Back to Amounts
                            </a>
                        </div>
                    </div>

                    <div class="invoice-box">
                        <table cellpadding="0" cellspacing="0">
                            <tr class="top">
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td class="title">
                                                {{-- <img src="{{ asset('path/to/your/logo.png') }}" style="width: 100%; max-width: 300px" /> --}}
                                                <img class="logo-icon" src="{{asset('images/wh logo@4x-200h.png')}}" style="width: 100%; max-width: 100px" >
                                            </td>

                                            <td>
                                                Invoice #: {{ $payment->id }}<br />
                                                Created: {{ \Carbon\Carbon::parse($payment->date)->format('d M, Y') }}<br />
                                                Due: {{ \Carbon\Carbon::parse($payment->due_date ?? $payment->date)->format('d M, Y') }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr class="information">
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td>
                                                {{ config('app.name') }}<br />
                                                {{$address->full_address}}<br />
                                                {{  $address->email }}<br />
                                                {{ $address->phone }}
                                            </td>

                                    <td>

                                        {{-- <h3>Agent: {{ $agent->name ?? 'N/A' }}</h3> --}}
                                        {{-- @foreach ($amounts as $amount)
                                            {{ $amounts->agent->name ?? 'N/A' }}<br />
                                        @endforeach --}}

                                    {{ $agent->name ?? 'N/A' }}<br />
                                    {{ $agent->email ?? 'N/A' }}<br />
                                    {{ $agent->phone ?? 'N/A' }}<br />
                                    {{$agent->address ?? 'N/A' }}<br />
                                </td>



                                        </tr>
                                    </table>
                                </td>
                            </tr>



                            <tr class="heading">
                                <td>Item</td>
                                <td>Price</td>
                            </tr>

                            <tr class="item">
                                <td>{{ $payment->amount?->particulars ?? 'Payment Details' }}</td>
                                <td>{{ number_format($payment->amount?->amount, 2) }} {{ $payment->currency }}</td>
                            </tr>

                            <tr class="item">
                                <td>Paid</td>
                                <td>{{ number_format($payment->paid, 2) }} {{ $payment->currency }}</td>
                            </tr>

                            <tr class="item last">
                                <td>Due</td>
                                <td>{{ number_format(($payment->amount?->amount ?? 0) - $payment->amount?->payments->sum('paid'), 2) }} {{ $payment->currency }}</td>
                            </tr>

                            <tr class="total">
                                <td></td>
                                <td>Total: {{ number_format($payment->amount?->amount, 2) }} {{ $payment->currency }}</td>
                            </tr>
                        </table>
                           {{-- <div class="text-center mt-4 noPrint">
                                <button class="btn btn-secondary me-2 print-btn" onclick="window.print()">
                                    <i class="ri-printer-line me-1"></i> Print
                                </button>

                                <button class="btn btn-success" onclick="downloadPDF()">
                                    <i class="ri-download-line me-1"></i> Download PDF
                                </button>
                            </div> --}}


                            <div class="text-center mt-4 noPrint">
    <button class="btn btn-secondary me-2 print-btn" onclick="window.print()">
        <i class="ri-printer-line me-1"></i> Print
    </button>

    <a href="{{ route('admin.download.received', $payment->id) }}" class="btn btn-success">
        <i class="ri-download-line me-1"></i> Download PDF
    </a>
</div>



{{--
                              <div class="text-center mt-4 noPrint">
                                    <button class="btn btn-secondary me-2 print-btn" onclick="window.print()">
                                        <i class="ri-printer-line me-1"></i> Print
                                    </button>

                                    <a href="{{ route('admin.payment.downloadReceived', ['payment_id' => $payment->id]) }}" class="btn btn-success">
                                        <i class="ri-download-line me-1"></i> Download PDF
                                    </a>
                                </div> --}}


                    </div>



@endsection


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    function downloadPDF() {
        const element = document.querySelector('.invoice-box');

        const opt = {
            margin:       0.5,
            filename:     'invoice_{{ $payment->id }}.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
        };

        html2pdf().set(opt).from(element).save();
    }
</script> --}}


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function downloadPDF() {
        const $element = $('.invoice-box');
        const $controls = $('.noPrint');

        $controls.hide();

        const opt = {
            margin:       0.5,
            filename:     'invoice_{{ $payment->id }}.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
        };

        html2pdf().set(opt).from($element[0]).save().then(function () {
            $controls.show();
        });
    }
</script>


