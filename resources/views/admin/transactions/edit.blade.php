@extends('admin.app')

@section('title', 'Edit Transaction')

@section('content')
<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header d-flex justify-content-between align-items-center">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Edit Transaction</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('transactions') }}">Transaction</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{ route('transactions') }}" class="add-new">
                        All Transactions <i class="ms-1 ri-list-ordered-2"></i>
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('transaction.update', $transaction->id) }}" method="POST" class="row g-4">
                        @csrf
                        @method('PUT')

                        {{-- Agent --}}
                        <div class="col-md-6">
                            <label class="form-label">Agent Name <span class="text-danger">*</span></label>
                            <select class="form-control single-select2" name="agent_id" required>
                                <option disabled>-- Select Agent --</option>
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->id }}" {{ $transaction->agent_id == $agent->id ? 'selected' : '' }}>{{ $agent->name }}</option>
                                @endforeach
                            </select>
                            @error('agent_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Particulars --}}
                        <div class="col-md-6">
                            <label class="form-label">Particulars <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="particulars" value="{{ old('particulars', $transaction->particulars) }}" required>
                            @error('particulars')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Total Amount --}}
                        <div class="col-md-4">
                            <label class="form-label">Total Amount <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control" name="total_amount" value="{{ old('total_amount', $transaction->total_amount) }}" required>
                            @error('total_amount')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Paid --}}
                        <div class="col-md-4">
                            <label class="form-label">Paid Amount <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control" name="paid" value="{{ old('paid', $transaction->paid) }}" required>
                            @error('paid')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Dues --}}
                        <div class="col-md-4">
                            <label class="form-label">Dues <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control" name="dues" value="{{ old('dues', $transaction->dues) }}" required>
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
                                    <option value="{{ $code }}" {{ old('currency', $transaction->currency) === $code ? 'selected' : '' }}>{{ $code }} - {{ $name }}</option>
                                @endforeach
                            </select>
                            @error('currency')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Date --}}
                        <div class="col-md-4">
                            <label class="form-label">Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date" id="transaction-date"
                                value="{{ old('date', \Carbon\Carbon::parse($transaction->date)->format('Y-m-d')) }}" required>
                            @error('date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Note --}}
                        <div class="col-md-4">
                            <label class="form-label">AdditionalNote</label>
                            <textarea class="form-control" name="note" rows="3">{{ old('note', $transaction->note) }}</textarea>
                            @error('note')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary submit-button">
                                Update
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
    document.addEventListener('DOMContentLoaded', function () {
        const dateInput = document.getElementById('transaction-date');
        if (dateInput) {
            const today = new Date();
            today.setDate(today.getDate() - 1);
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            const maxDate = `${yyyy}-${mm}-${dd}`;
            dateInput.max = maxDate;
        }

        const totalInput = document.querySelector('input[name="total_amount"]');
        const paidInput = document.querySelector('input[name="paid"]');
        const duesInput = document.querySelector('input[name="dues"]');

        function updateDues() {
            const total = parseFloat(totalInput.value) || 0;
            const paid = parseFloat(paidInput.value) || 0;
            duesInput.value = (total - paid).toFixed(2);
        }

        totalInput.addEventListener('input', updateDues);
        paidInput.addEventListener('input', updateDues);
    });
</script>
@endpush
