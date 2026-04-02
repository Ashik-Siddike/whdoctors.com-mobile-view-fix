@extends('admin.app')

@section('title', 'Agent Transactions')

@section('content')
<div class="container my-4">
    <h4>Transactions for {{ $agents->name }}</h4>

         {{-- <div class="col-md-6">
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
                        </div> --}}

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Transaction Form --}}
    <form action="{{ route('agent.transactions.store', $agents->id) }}" method="POST" class="row g-3 mb-4">
        @csrf
        <div class="col-md-4">
            <input type="text" name="particulars" class="form-control" placeholder="Particulars" required>
        </div>
        <div class="col-md-2">
            <input type="number" step="0.01" name="total_amount" class="form-control" placeholder="Total" required>
        </div>
        <div class="col-md-2">
            <input type="number" step="0.01" name="paid" class="form-control" placeholder="Paid" required>
        </div>
        <div class="col-md-2">
            <input type="number" step="0.01" name="dues" class="form-control" placeholder="Dues" required>
        </div>
        <div class="col-md-2">
            <select name="currency" class="form-control" required>
                <option value="BDT" selected>BDT</option>
                <option value="USD">USD</option>
                <!-- Add others as needed -->
            </select>
        </div>
        <div class="col-md-3">
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="col-md-6">
            <input type="text" name="note" class="form-control" placeholder="Note (optional)">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-success w-100">Add Transaction</button>
        </div>
    </form>

    {{-- Transaction Table --}}
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Particulars</th>
                <th>Total</th>
                <th>Paid</th>
                <th>Dues</th>
                <th>Currency</th>
                <th>Date</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $index => $txn)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $txn->particulars }}</td>
                    <td>{{ $txn->total_amount }}</td>
                    <td>{{ $txn->paid }}</td>
                    <td>{{ $txn->dues }}</td>
                    <td>{{ $txn->currency }}</td>
                    <td>{{ $txn->date }}</td>
                    <td>{{ $txn->note }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
