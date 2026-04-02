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
                                @if ($user)
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
                                <p class="detail-text mb-0" style="font-size: 8px">{{ $transaction->agent->name ?? 'N/A' }}</p>
                                </div>



                                    <div class="col-md-6 d-flex align-items-center mb-2">
                                        <h6 class="custom-label mb-0 me-2" style="font-size: 10px">Phone:</h6>
                                        <p class="detail-text mb-0" style="font-size: 8px">{{ $user->phone }}</p>
                                    </div>


                                    <div class="col-md-6 d-flex align-items-center mb-2">
                                        <h6 class="custom-label mb-0 me-2" style="font-size: 10px">Email:</h6>
                                        <p class="detail-text mb-0" style="font-size: 8px">{{ $user->email }}</p>
                                    </div>


                                    <div class="col-md-6 d-flex align-items-center mb-2">
                                        <h6 class="custom-label mb-0 me-2" style="font-size: 10px">Address:</h6>
                                        <p class="detail-text mb-0" style="font-size: 8px">{{ $user->address }}</p>
                                    </div>


                                    @else
                                    <p class="text-danger">Agent information not available</p>
                                    @endif
                                </div>


                                    @if (is_iterable($transaction) && count($transaction) > 0)
                                    <table class="table w-100">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 5%">SL NO</th>
                                                <th scope="col" style="width: 10%">Date</th>
                                                <th scope="col" style="width: 10%">Note</th>
                                                <th scope="col" style="width: 10%">Currency</th>
                                                <th scope="col" style="width: 10%">Amount</th>
                                                <th scope="col" style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="transactionTableBody">
                                            @php($sum = 0)
                                            @foreach ($transaction as $cashtransaction)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $cashtransaction->date }}</td>
                                                <td>{{ $cashtransaction->note }}</td>
                                                <td>{{ $cashtransaction->currency }}</td>
                                                <td>{{ $cashtransaction->amount }}</td>
                                                <td class="amount-action">
                                                    <div class="action-btn">
                                                        <a href="{{ route('cashtransaction.edit', $cashtransaction->id) }}" class="btn btn-edit"><i class="ri-edit-line"></i></a>
                                                        <a href="{{ route('cashtransaction.delete', $cashtransaction->id) }}" class="btn btn-delete"><i class="ri-delete-bin-2-line"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php($sum += $cashtransaction->amount)
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <table class="table w-100 border-0">
                                        <tr class="total-amount">
                                            <td style="width: 20%; border: none"></td>
                                            <td style="width: 50%; border: none; text-align: right">Total Amount </td>
                                            <td style="width: 30%; border: none">
                                                <h6 class="total-amount-value" id="totalAmount">{{ number_format($sum, 2) }}</h6>
                                            </td>
                                        </tr>
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
                            <input type="hidden" name="transaction_id" value="{{$id}}">
                            <div class="row">

                                 <div class="col-md-12">
                                    <label class="form-label">Particulars <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="particulars" placeholder="Enter description" required>
                                    @error('particulars')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                 <div class="col-md-12">
                                    <label class="form-label">Total Amount <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control" name="total_amount" placeholder="e.g., 1000.00" required>
                                    @error('total_amount')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Paid --}}
                                <div class="col-md-12">
                                    <label class="form-label">Paid Amount <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control" name="paid" placeholder="e.g., 500.00" required>
                                    @error('paid')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Dues --}}
                                <div class="col-md-12">
                                    <label class="form-label">Dues <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control" name="dues" placeholder="e.g., 500.00" required>
                                    @error('dues')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Currency --}}
                                <div class="col-md-12">
                                    <label class="form-label">Currency <span class="text-danger">*</span></label>
                                    <select class="form-control" name="currency" required>
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
                                    @error('currency')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Date --}}
                            <div class="col-md-12">
                                <label class="form-label">Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="date" id="transaction-date" required>
                                @error('date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Note --}}

                            <div class="col-md-12">
                                <label class="form-label">Additional Note</label>
                                <textarea class="form-control" name="note" rows="3" placeholder="Enter any additional notes"></textarea>
                                @error('note')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>




                            <div class="col-12 text-end mt-3">
                                <button type="submit" class="btn submit-button">
                                    Submit
                                    <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                    </span>
                                </button>
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

    </script>




@endpush

