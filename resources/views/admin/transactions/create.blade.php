@extends('admin.app')

@section('title', 'Transaction')

@section('content')
<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header d-flex justify-content-between align-items-center">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Transaction</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('transactions') }}">Transaction</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create Transaction</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{ route('transactions') }}" class="add-new">
                        All Transactions <i class="ms-1 ri-list-ordered-2"></i>
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('transaction.store') }}" method="POST" class="row g-4">
                        @csrf

                        {{-- Agent --}}
                        <div class="col-md-6">
                            <label class="form-label">Agent Name <span class="text-danger">*</span></label>
                            <select class="form-control single-select2" name="agent_id" required>
                                <option disabled selected>-- Select Agent --</option>
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                @endforeach
                            </select>
                            @error('agent_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Particulars --}}
                        <div class="col-md-6">
                            <label class="form-label">Particulars <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="particulars" placeholder="Enter description" required>
                            @error('particulars')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Total Amount --}}
                        <div class="col-md-4">
                            <label class="form-label">Total Amount <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control" name="total_amount" placeholder="e.g., 1000.00" required>
                            @error('total_amount')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Paid --}}
                        <div class="col-md-4">
                            <label class="form-label">Paid Amount <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control" name="paid" placeholder="e.g., 500.00" required>
                            @error('paid')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Dues --}}
                        <div class="col-md-4">
                            <label class="form-label">Dues <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control" name="dues" placeholder="e.g., 500.00" required>
                            @error('dues')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Currency --}}
                        <div class="col-md-4">
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
                     <div class="col-md-4">
                        <label class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="date" id="transaction-date" required>
                        @error('date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Note --}}

                    <div class="col-md-4">
                        <label class="form-label">AdditionalNote</label>
                        <textarea class="form-control" name="note" rows="3" placeholder="Enter any additional notes"></textarea>
                        @error('note')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                        {{-- Submit --}}
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary submit-button">
                                Submit
                                <span class="spinner-border spinner-border-sm d-none ms-1" role="status"></span>
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
    $('.submit-button').click(function(e){
        $(this).css('opacity', '1');
        $(this).find('.spinner-border').removeClass('d-none');
        $(this).attr('disabled', true);
        $(this).closest('form').submit();
    });

    // Optional: If you want to use a JS datepicker instead of input type="date"
    // $('#datepicker').datepicker({
    //     format: 'yyyy-mm-dd',
    //     autoclose: true,
    //     todayHighlight: true
    // });

     // Set max date as yesterday


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
