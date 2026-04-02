@extends('admin.app')

@section('title', 'Agent Transactions')

@section('content')
    <div class="container-fluid my-4">
        {{-- Show Agent Info --}}
        <div class="card mb-4">
            <div class="card-body">
                <h5>Transactions for Agent: {{ $agent->name }}</h5>
            </div>
        </div>

        {{-- Show Agent Transactions Table --}}
        <div class="card">
            <div class="card-body">
                @if ($transactions->isEmpty())
                    <p class="text-muted">No transactions found for this agent.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Dues</th>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $index => $transaction)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $transaction->dues }}</td>
                                    <td>{{ \Carbon\Carbon::parse($transaction->date)->format('d-m-Y') }}</td>
                                    <td>{{ $transaction->type }}</td>
                                    <td>{{ $transaction->note }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
