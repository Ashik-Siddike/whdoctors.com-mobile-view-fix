@extends('admin.app')
@section('title')
    Cash Transaction
@endsection

@push('custom-style')
   {{-- Datatable css  --}}
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">


   <style>
            .logo-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 11px 22px;
            margin-bottom: 10px;
            background: #fff;
            border-bottom: 2px solid #ddd;
        }

            .logo img {
                height: 50px;
                max-width: 100%;
            }

            .nav-info {
                display: flex;
                gap: 20px;
            }

            .nav-item {
                display: flex;
                align-items: center;
                gap: 8px;
                font-size: 14px;
                color: #333;
            }
            /* Hide logo and nav info in normal view */
.logo-content, .nav-info {
    display: none !important;
}





 @media print {


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
        margin: 0px !important;
        padding: 0px !important;
        visibility: hidden !important;
    }

    .custom-form1{
        padding-left: 45px !important;
    }
    .content {
    position: absolute !important;
    left: 10px !important;
    top: 0 !important;
    width: calc(100% - 60px) !important;
    height: 100% !important;
    transition: all .5s ease !important;
    overflow: auto !important;
}

    .noPrint {
        display: none;
    }

    .yesPrint {
        display: block;
    }

    .card-body {
        padding: 20px;
    }

    .print-btn {
        display: none;  /* Hide the print button when printing */
    }
    .card-body {
        padding-left: 45px !important;
        page-break-inside: avoid;
    }

    /* Remove extra margins */
    .col-8 {

        width: 100%;
        padding: 0;
        margin: 0;
    }


    .card-body.yesPrint {
    display: flex !important;
    flex-direction: column;
    width: 100%; /* Full width */
    min-height: 100vh; /* Ensure full viewport height */
    max-width: 100%; /* Ensure it doesn’t overflow */
    padding: 0;
    margin: 0;
}

    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000;
    }

    table th, table td {
        border: 1px solid #000;
        padding: 5px;
        text-align: left;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }

    /* লোগো এবং নেভিগেশন আইটেম হাইড করুন */
    .logo-content, .nav-info {
        display: none !important;
    }

    /* প্রিন্ট-এ এক্সট্রা বাটন বা UI উপাদান হাইড করুন */
    .print-btn, .add-new, .action-btn {
        display: none !important;
    }
    #phone, #email, #full_address {
    font-weight: bold;
    color: #333;
}

/* Specific styling for dynamic content section */
/* #phone {
    font-size: 1.2rem;

#email {
    font-size: 1rem;
}

#full_address {
    font-size: 1rem;
    color: #555;
}
#logo-icon {
    display: block !important;
}

.logo-content, .nav-info {
        display: block !important;
    } */


    #logo-icon {
        display: block !important;
        margin: 0 auto; /* center horizontally */
    }

    .logo-content,
    .nav-info {
        display: block !important;
        text-align: center; /* center text inside */
        margin: 0 auto;
    }

    #phone,
    #email,
    #full_address {
        text-align: center;
        display: block;
        text-align: center; /* center text inside */
        margin: 0 auto;
        color: #333;
    }

    #full_address {
        font-size: 1rem;
        color: #555;
    }

}
/* This CSS rule will make .col-8 behave like .col-12 */




   </style>
@endpush

@section('content')
    <div class="container-fluid my-4">
        <div class="row">

            <div class="col-8">
                <div class="card table-card">
                    <div class="card-header table-header noPrint">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Cash Transaction</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{route('transactions')}}">Transaction</a>
                                    </li>
                                    <li class="breadcrumb-item active" >Cash Transaction Report</li>

                                    <li class="breadcrumb-item active" aria-current="page">Cash Transaction</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="d-flex">
                            {{-- <button type="button" class="print-btn me-3"
                            onclick="printJS({ printable: 'printDiv', type: 'html', css: '/css/admin/css/style.css' });">
                                <i class="me-1 ri-printer-line"></i>Print</button> --}}
                                <button type="button" class="print-btn me-3"
                                onclick="window.print();">
                            <i class="me-1 ri-printer-line"></i> Print
                        </button>

                            <a href="{{route('transactions')}}" class="add-new"><i class="me-1 ri-list-ordered-2"></i>Transaction</a>
                        </div>
                    </div>
                    <div class="card-body yesPrint" id="printDiv">

                        <div class="card-body custom-form1">
                            <div class="row ">
                                @if ($agents)
                                <div class="logo-content">
                                    <a href="{{ route('dashboard') }}" class="logo">
                                        <img class="logo-icon"  id="logo-icon" src="{{ asset('images/wh logo@4x-200h.png') }}" height="50" alt="logo">
                                    </a>
                                    <div class="nav-info">
                                        <div class="nav-item">
                                            <span id="phone">{{ getTopNavData('phone') }}</span>
                                        </div>
                                        <div class="nav-item">
                                            <span  id="email">{{ getTopNavData('email') }}</span>
                                        </div>
                                        <div class="nav-item">
                                            <span  id="full_address">{{ getTopNavData('full_address') }}</span>
                                        </div>
                                    </div>
                                </div>

                               <div class="col-md-6 d-flex align-items-center">
                                <h6 class="custom-label mb-0 me-2" style="font-size: 10px">Agent Name:</h6>
                                <p class="detail-text mb-0" style="font-size: 8px">{{ $agents->name ?? 'N/A' }}</p>
                                </div>



                                    <div class="col-md-6 d-flex align-items-center mb-2">
                                        <h6 class="custom-label mb-0 me-2" style="font-size: 10px">Phone:</h6>
                                        <p class="detail-text mb-0" style="font-size: 8px">{{ $agents->phone }}</p>
                                    </div>


                                    <div class="col-md-6 d-flex align-items-center mb-2">
                                        <h6 class="custom-label mb-0 me-2" style="font-size: 10px">Email:</h6>
                                        <p class="detail-text mb-0" style="font-size: 8px">{{ $agents->email }}</p>
                                    </div>


                                    <div class="col-md-6 d-flex align-items-center mb-2">
                                        <h6 class="custom-label mb-0 me-2" style="font-size: 10px">Address:</h6>
                                        <p class="detail-text mb-0" style="font-size: 8px">{{ $agents->address }}</p>
                                    </div>


                                    @else
                                    <p class="text-danger">Agent information not available</p>
                                    @endif
                                </div>


                                    @if (!empty($transactions) && count($transactions) > 0)
                                <table class="table w-100 table-bordered">
                                    <thead class="table-light fw-bold">
                                        <tr>
                                            <th style="width: 10%;">SL NO</th>
                                            <th style="width: 20%;">Particulars</th>
                                            <th style="width: 10%;">Total</th>
                                            <th style="width: 10%;">Paid</th>
                                            <th style="width: 10%;">Dues</th>
                                            <th style="width: 30%;">Note</th>
                                            <th style="width: 15%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalAmount = 0;
                                            $totalPaid = 0;
                                            $totalDues = 0;
                                        @endphp

                                        @foreach ($transactions as $cashtransaction)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $cashtransaction->particulars }}</td>
                                                <td>{{ number_format($cashtransaction->total_amount, 2) }}</td>
                                                <td>{{ number_format($cashtransaction->paid, 2) }}</td>
                                                <td>{{ number_format($cashtransaction->dues, 2) }}</td>
                                                <td>{{ $cashtransaction->note }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-warning btn-dues"
                                                        data-id="{{ $cashtransaction->id }}"
                                                        data-particulars="{{ $cashtransaction->particulars }}"
                                                        data-total="{{ $cashtransaction->total_amount }}"
                                                        data-paid="{{ $cashtransaction->paid }}"
                                                        data-dues="{{ $cashtransaction->dues }}"
                                                        data-note="{{ $cashtransaction->note }}"
                                                        data-currency="{{ $cashtransaction->currency }}"
                                                        data-date="{{ $cashtransaction->date }}"
                                                        title="Pay Dues">
                                                        <i class="ri-wallet-line"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @php
                                                $totalAmount += $cashtransaction->total_amount;
                                                $totalPaid += $cashtransaction->paid;
                                                $totalDues += $cashtransaction->dues;
                                            @endphp
                                        @endforeach
                                    </tbody>

                                    @if ($transactions->count() > 0)
                                        <tfoot class="table-light fw-bold">
                                            <tr>
                                                <th colspan="2" class="text-end">Total:</th>
                                                <th>{{ number_format($totalAmount, 2) }}</th>
                                                <th>{{ number_format($totalPaid, 2) }}</th>
                                                <th>{{ number_format($totalDues, 2) }}</th>
                                                <th colspan="2"></th>
                                            </tr>
                                        </tfoot>
                                    @endif
                                </table>


                                @else
                                    <div class="alert alert-warning text-center">No transactions found.</div>
                                @endif


                        </div>

                    </div>
                </div>
            </div>


            <div class="col-4 noPrint">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Cash Transaction Create</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{route('transactions')}}">Transaction</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Cash Transaction</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card-body custom-form">
                        <form action="{{ route('transaction.store') }}" method="POST">
                            @csrf

                            <div class="row">


                               <div class="row">

                                <div class="col-md-6">
                                    <label class="form-label">Agent Name <span class="text-danger">*</span></label>
                                    <select class="form-control single-select2" disabled>
                                        <option selected>{{ $agents->name ?? 'N/A' }}</option>
                                    </select>
                                    <input type="hidden" name="agent_id" value="{{ $agents->id ?? '' }}">
                                    @error('agent_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label class="form-label">Particulars <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="particulars" id="form-particulars" placeholder="Enter description" required>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Total Amount <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control" name="total_amount" id="form-total-amount" placeholder="e.g., 1000.00" required>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Paid Amount <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control" name="paid" id="form-paid" placeholder="e.g., 500.00" required>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Dues <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control" name="dues" id="form-dues" placeholder="e.g., 500.00" required>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Currency <span class="text-danger">*</span></label>
                                    <select class="form-control" name="currency" id="form-currency" required>
                                        @foreach ([
                                            'BDT' => 'Bangladeshi Taka',
                                            'USD' => 'US Dollar',
                                            'GBP' => 'British Pound',
                                            'INR' => 'Indian Rupee',
                                            'PKR' => 'Pakistani Rupee',
                                            'AUD' => 'Australian Dollar',
                                            'CAD' => 'Canadian Dollar',
                                            'SAR' => 'Saudi Riyal',
                                            'AED' => 'UAE Dirham',
                                            'EUR' => 'Euro',
                                            'JPY' => 'Japanese Yen',
                                            'CNY' => 'Chinese Yuan'
                                        ] as $code => $name)
                                            <option value="{{ $code }}" {{ $code === 'BDT' ? 'selected' : '' }}>{{ $code }} - {{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date" id="transaction-date" required>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Additional Note</label>
                                    <textarea class="form-control" name="note" id="form-note" rows="3" placeholder="Enter any additional notes"></textarea>
                                </div>

                                <div class="col-12 text-end mt-3">
                                    <button type="submit" class="btn submit-button">
                                        Submit
                                        <span class="ms-1 spinner-border spinner-border-sm d-none" role="status"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('custom-scripts')

 <script>

function printTransaction() {
    printJS({
        printable: 'printDiv',
        type: 'html',
        css: ['/css/admin/css/style.css'],
        scanStyles: false,
        style: '@media print { .print-btn, .add-new { display: none !important; } }'
    });
}
 $(document).ready(function () {
        // Dynamically set the image source
        var imageUrl = '{{ asset("images/wh logo@4x-200h.png") }}';
        $('#logo-icon').attr('src', imageUrl);

        // Access dynamic content from PHP embedded in HTML
        var phone = $('#phone').text();
        var email = $('#email').text();
        var fullAddress = $('#full_address').text();

        console.log(phone); // Outputs: 123-456-7890
        console.log(email); // Outputs: contact@example.com
        console.log(fullAddress); // Outputs: 123 Main Street, City, Country
    });
$(document).ready(function () {
    // Update the total amount dynamically when the delete button is clicked
    $(".btn-delete").on("click", function (e) {
        e.preventDefault();
        var row = $(this).closest('tr');

        // Check if amount exists
        var amountText = row.find('.amount-action').text();
        if (!amountText) {
            alert("Amount is missing, cannot proceed with deletion.");
            return;
        }

        var amount = parseFloat(amountText);
        var currentTotal = parseFloat($('#totalAmount').text());

        // Subtract the deleted amount from the total
        var newTotal = currentTotal - amount;
        $('#totalAmount').text(newTotal.toFixed(2));

        // Optionally, confirm deletion with AJAX or direct redirection
        var deleteUrl = $(this).attr("href");
        $.ajax({
            url: deleteUrl,
            method: 'DELETE',
            success: function(response) {
                row.remove(); // Remove the row from the table
                alert("Transaction deleted successfully!");
            },
            error: function(xhr, status, error) {
                alert("Error deleting transaction: " + error);
            }
        });
    });

    // Optional: Action buttons visibility or other dynamic features
    $(".btn-edit").on("click", function (e) {
        // Additional edit functionality
    });
});



document.addEventListener('DOMContentLoaded', function () {
            const dateInput = document.getElementById('transaction-date');
            if (dateInput) {
                const today = new Date();
                today.setDate(today.getDate() - 1); // গতকালের তারিখ
                const yyyy = today.getFullYear();
                const mm = String(today.getMonth() + 1).padStart(2, '0');
                const dd = String(today.getDate()).padStart(2, '0');
                const maxDate = `${yyyy}-${mm}-${dd}`;
                dateInput.max = maxDate;
                dateInput.value = maxDate; // ✅ auto set করে দেওয়া হচ্ছে
            }

            $('.submit-button').click(function () {
                $(this).prop('disabled', true);
                $(this).find('.spinner-border').removeClass('d-none');
                $(this).closest('form').submit();
            });
        });


            // total_amount
            document.addEventListener('DOMContentLoaded', function () {
                const totalInput = document.querySelector('input[name="total_amount"]');
                const paidInput = document.querySelector('input[name="paid"]');
                const duesInput = document.querySelector('input[name="dues"]');

                function updateDues() {
                    const total = parseFloat(totalInput.value) || 0;
                    const paid = parseFloat(paidInput.value) || 0;
                    let dues = total - paid;

                    duesInput.value = dues.toFixed(2);
                }

                totalInput.addEventListener('input', updateDues);
                paidInput.addEventListener('input', updateDues);
            });


            $(document).ready(function () {
        $('.btn-dues').click(function () {
            let dues = $(this).data('dues');
            let id = $(this).data('id');
            let particulars = $(this).data('particulars');

            // Set values in modal
            $('#modal-dues').val(dues);
            $('#modal-particulars').val(particulars + ' (Dues)');

            // Show modal
            $('#duesModal').modal('show');
        });
    });

document.addEventListener('DOMContentLoaded', function () {
    const duesButtons = document.querySelectorAll('.btn-dues');

    duesButtons.forEach(button => {
        button.addEventListener('click', function () {
            const oldPaid = parseFloat(this.dataset.paid) || 0;
            const total = parseFloat(this.dataset.total) || 0;
            const dues = parseFloat(this.dataset.dues) || 0;

            document.getElementById('form-particulars').value = this.dataset.particulars || '';
            document.getElementById('form-total-amount').value = total;
            document.getElementById('form-paid').value = ''; // নতুন যেটা দিবেন, সেটা এখানে টাইপ করবেন
            document.getElementById('form-paid').setAttribute('data-oldpaid', oldPaid);
            document.getElementById('form-dues').value = dues;
            document.getElementById('form-note').value = this.dataset.note || '';
            document.getElementById('form-currency').value = this.dataset.currency || 'BDT';
            document.getElementById('transaction-date').value = this.dataset.date || '';

            document.getElementById('form-particulars').focus();

            window.scrollTo({
                top: document.querySelector('form').offsetTop - 100,
                behavior: 'smooth'
            });
        });
    });

    // 🔁 Paid input change: update dues & total amount
    document.getElementById('form-paid').addEventListener('input', function () {
        const oldPaid = parseFloat(this.getAttribute('data-oldpaid')) || 0;
        const newPaid = parseFloat(this.value) || 0;
        const totalBefore = parseFloat(document.getElementById('form-total-amount').value) || 0;

        const newTotalPaid = oldPaid + newPaid;
        const newDues = totalBefore - newTotalPaid;

        // Optional: If you want to reflect combined paid into total amount
        // document.getElementById('form-total-amount').value = totalBefore; // Keep same
        document.getElementById('form-dues').value = newDues.toFixed(2);
    });
});



    </script>




@endpush

