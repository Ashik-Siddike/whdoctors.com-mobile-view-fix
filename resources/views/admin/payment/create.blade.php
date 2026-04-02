@extends('admin.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">All Amounts</h4>
        <a href="{{ route('amount.create') }}" class="btn btn-primary">
            <i class="ri-add-line me-1"></i> Add New
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>Particulars</th>
                        <th>Amount</th>
                        <th>Paid</th>
                        <th>Dues</th>
                        <th>Date</th>
                        <th style="width: 200px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($amounts as $amount)
                    <tr>
                        <td>{{ $amount->particulars }}</td>
                        <td>{{ number_format($amount->amount, 2) }}</td>
                        <td>{{ number_format($amount->payments->sum('paid'), 2) }}</td>
                        <td>{{ number_format($amount->dues, 2) }}</td>
                        <td>{{ $amount->date->format('d M, Y') }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('payments.create', $amount->id) }}" class="btn btn-sm btn-info">
                                    <i class="ri-wallet-line me-1"></i> Payment
                                </a>
                                <a href="{{ route('amount.edit', $amount->id) }}" class="btn btn-sm btn-warning">
                                    <i class="ri-edit-2-line me-1"></i> Edit
                                </a>
                                {{-- Optional Delete Button
                                <form action="{{ route('amount.destroy', $amount->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="ri-delete-bin-6-line"></i>
                                    </button>
                                </form>
                                --}}
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No amounts found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
