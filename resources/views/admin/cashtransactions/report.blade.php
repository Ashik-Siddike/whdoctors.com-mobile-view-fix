@extends('admin.app')

@section('title')
    Cash Transaction Report
@endsection

@section('content')
<div class="container-fluid my-4">
    <div class="card p-3">
        <form method="GET" action="{{ route('cashtransaction.report') }}" class="row g-3">
            <div class="col-md-5">
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
            </div>
            <div class="col-md-5">
                <label class="form-label">End Date</label>
                <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Generate</button>
            </div>
        </form>
    </div>

    @if (isset($transactions) && $transactions->count())
    <div class="card mt-4 p-3" id="print-section">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5>
                Total Amount from {{ $startDate->format('d M Y') }} to {{ $endDate->format('d M Y') }}:
                <strong>{{ $totalAmount }}</strong>
            </h5>
            <button class="btn btn-secondary" onclick="printReport()">
                <i class="ri-printer-line me-1"></i> Print
            </button>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Currency</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $txn)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($txn->date)->format('d-M-Y') }}</td>
                    <td>{{ $txn->amount }}</td>
                    <td>{{ $txn->currency }}</td>
                    <td>{{ $txn->note }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @elseif(request('start_date') && request('end_date'))
    <div class="card mt-4 p-3">
        <p class="text-center mb-0">No transactions found for the selected date range.</p>
    </div>
    @endif
</div>
@endsection

@push('custom-scripts')
<script>
    function printReport() {
        const printContent = document.getElementById('print-section').innerHTML;
        const originalContent = document.body.innerHTML;

        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;
        location.reload();
    }
</script>
@endpush
