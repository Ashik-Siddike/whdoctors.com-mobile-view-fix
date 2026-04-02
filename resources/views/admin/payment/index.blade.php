@extends('admin.app')
@section('title')
    Payments
@endsection
@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Payments</h4>
        <a href="{{ route('amount.index') }}" class="btn btn-outline-secondary">
            <i class="ri-arrow-left-line me-1"></i> Back to Amounts
        </a>
    </div>

    <div class="row g-4">
        {{-- Left Column: Payments Table --}}
        <div class="col-md-8">
            <div class="card shadow-sm h-100">
                <div class="card-header fw-semibold">All Payments</div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Particulars</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Currency</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                       <tbody>
                            @php
                                $runningTotals = []; // amount_id অনুযায়ী paid হিসেব রাখতে
                            @endphp

                            @forelse($payments as $payment)
                                @php
                                    $amount = $payment->amount;
                                    $amountId = $payment->amount_id;
                                    $totalAmount = $amount?->amount ?? 0;

                                    // পূর্ববর্তী পর্যন্ত paid হিসেব (যদি থাকে)
                                    $runningPaid = $runningTotals[$amountId] ?? 0;

                                    // এই পেমেন্ট যোগ করো
                                    $runningPaid += $payment->paid;

                                    // আপডেট হিসেব রাখো
                                    $runningTotals[$amountId] = $runningPaid;

                                    // due হিসাব করো
                                    $due = $totalAmount - $runningPaid;
                                @endphp
                                <tr>
                                    <td>{{ $amount?->particulars ?? '-' }}</td>
                                    <td>{{ number_format($totalAmount, 2) }}</td>
                                    <td>{{ number_format($payment->paid, 2) }}</td> {{-- This payment --}}
                                    <td>{{ number_format($due, 2) }}</td>
                                    <td>{{ $payment->currency }}</td>
                                    <td>{{ \Carbon\Carbon::parse($payment->date)->format('d M, Y') }}</td>

                                    <td>
                                        <a href="{{ route('payment.received', $payment->id) }}" target="_blank" class="text-success" title="Money Received">
                                            <i class="ri-hand-coin-line fs-5"></i>
                                        </a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No payments found.</td>
                                </tr>
                            @endforelse
                            </tbody>


                        <tfoot>
                        <tr class="table-success">
                            <td><strong>Total</strong></td>
                            <td><strong>{{ number_format($grandSummary['totalAmount'], 2) }}</strong></td>
                            <td><strong>{{ number_format($grandSummary['totalPaid'], 2) }}</strong></td>
                            <td><strong>{{ number_format($grandSummary['due'], 2) }}</strong></td>
                            <td colspan="3"><strong>Paid {{ $grandSummary['times'] }} times</strong></td>
                        </tr>
                    </tfoot>




                    </table>
                </div>
            </div>
        </div>

        {{-- Right Column: Create Payment Form --}}
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-header fw-semibold">Create Payment</div>
                <div class="card-body">
                    <form action="{{ route('payment.store') }}" method="POST">
                        @csrf

                        {{-- <div class="mb-3">
                            <label for="amount_id" class="form-label">Select Amount</label>
                            <select name="amount_id" class="form-select" required>
                                <option value="">-- Select --</option>
                                @foreach($amounts as $amount)
                                    <option value="{{ $amount->id }}">{{ $amount->particulars }}</option>
                                @endforeach
                            </select>
                        </div> --}}



                        {{-- <div class="mb-3">
                            <label for="amount_id" class="form-label">Select Amount</label>
                            <select name="amount_id" id="amount_id" class="form-select" required>
                                <option value="">-- Select Amount --</option>
                                @foreach($amounts as $amount)
                                    <option value="{{ $amount->id }}">
                                        {{ $amount->particulars }} ({{ $amount->agent->name ?? 'N/A' }})
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}


                        <select name="amount_id" id="amount_id" class="form-select" required>
    <option value="">-- Select Amount --</option>
    @foreach($amounts as $amount)
        <option value="{{ $amount->id }}">
            {{ $amount->particulars }} ({{ $amount->agent->name ?? 'N/A' }})
        </option>
    @endforeach
</select>





                        <div class="mb-3">
                            <label for="paid" class="form-label">Paid Amount</label>
                            <input type="number" step="0.01" name="paid" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Payment Date</label>
                            <input type="date" name="date" class="form-control" value="{{ now()->format('Y-m-d') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="currency" class="form-label">Currency</label>
                            <select name="currency" class="form-select" required>
                                @foreach(['BDT','USD','INR','PKR'] as $currency)
                                    <option value="{{ $currency }}">{{ $currency }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <textarea name="note" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="ri-check-line me-1"></i> Submit
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    document.querySelector('select[name="amount_id"]').addEventListener('change', function () {
        const amountId = this.value;
        if (amountId) {
            fetch(`/amount/${amountId}/dues`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('total-amount').value = data.total.toFixed(2);
                    document.getElementById('total-paid').value = data.paid.toFixed(2);
                    document.getElementById('due-amount').value = data.dues.toFixed(2);
                });
        } else {
            document.getElementById('total-amount').value = '';
            document.getElementById('total-paid').value = '';
            document.getElementById('due-amount').value = '';
        }
    });
</script>
@endpush
