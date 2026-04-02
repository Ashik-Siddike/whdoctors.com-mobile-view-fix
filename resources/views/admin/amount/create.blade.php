@extends('admin.app')
@section('title')
    Amount Create
@endsection

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header table-header d-flex justify-content-between align-items-center">
            <div>
                <div class="table-title h5 mb-1 fw-semibold">Create Amount</div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 small">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Amount</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('amount.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="ri-arrow-left-line me-1"></i> Back to List
                </a>
                {{-- <a href="{{ route('cashtransaction.report') }}" class="btn btn-sm btn-outline-primary">
                    <i class="ri-file-chart-line me-1"></i> Report
                </a> --}}
            </div>
        </div>
    </div>

    {{-- Form --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('amount.store') }}" method="POST">
                @csrf

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="agent_id" class="form-label">Agent</label>
                        <select name="agent_id" class="form-select" required>
                            <option value="">-- Select Agent --</option>
                            @foreach($agents as $agent)
                                <option value="{{ $agent->id }}" {{ old('agent_id') == $agent->id ? 'selected' : '' }}>
                                    {{ $agent->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="particulars" class="form-label">Particulars</label>
                        <input type="text" name="particulars" class="form-control" value="{{ old('particulars', $amount->particulars ?? '') }}" required>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount', $amount->amount ?? '') }}" required>
                    </div>

                    <div class="col-md-4">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" class="form-control"
                            value="{{ old('date', isset($amount) ? $amount->date->format('Y-m-d') : now()->format('Y-m-d')) }}"
                            required>
                    </div>

                    <div class="col-md-4">
                        <label for="currency" class="form-label">Currency</label>
                        <select name="currency" class="form-select" required>
                            @foreach(['BDT','USD','INR','PKR'] as $currency)
                                <option value="{{ $currency }}" {{ old('currency', $amount->currency ?? 'BDT') == $currency ? 'selected' : '' }}>
                                    {{ $currency }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="note" class="form-label">Note</label>
                    <textarea name="note" class="form-control" rows="3">{{ old('note', $amount->note ?? '') }}</textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="ri-save-line me-1"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
