@extends('admin.app')
@section('title', 'Agent Report')
<style>
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
        margin: 0 !important;
        padding: 0 !important;
        visibility: hidden !important;
    }

    .custom-form1 {
        padding-left: 45px !important;
    }

    .content {
        position: absolute !important;
        left: 10px !important;
        top: 0 !important;
        width: calc(100% - 60px) !important;
        height: 100% !important;
        transition: all 0.5s ease !important;
        overflow: auto !important;
    }


    .btn, .form-control, .card-header, nav, footer {
        display: none !important;
    }
    .card, .table {
        border: none;
    }
    .no-print {
        display: none !important;
    }
    .print-only {
        display: block !important;
    }

}
</style>

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3 py-3 no-print">
        <h4 class="mb-0">Agent Report</h4>
        <a href="{{ route('amount.index') }}" class="btn btn-outline-secondary">
            <i class="ri-arrow-left-line me-1"></i> Back to Amounts
        </a>
    </div>


    <div class="card mb-4 no-print">
        <div class="card-body">
            <form action="{{ route('report.agent') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="from_date" class="form-label">From Date</label>
                        <input type="date" name="from_date" id="from_date" class="form-control" required value="{{ request('from_date') }}">
                    </div>

                    <div class="col-md-3">
                        <label for="to_date" class="form-label">To Date</label>
                        <input type="date" name="to_date" id="to_date" class="form-control" required value="{{ request('to_date') }}">
                    </div>

                    <div class="col-md-3">
                        <label for="agent_id" class="form-label">Select Agent</label>
                        <select name="agent_id" id="agent_id" class="form-control">
                            <option value="">All Agents</option>
                            @foreach($agents as $agentOption)
                                <option value="{{ $agentOption->id }}" {{ request('agent_id') == $agentOption->id ? 'selected' : '' }}>
                                    {{ $agentOption->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="ri-search-line me-1"></i> Generate Report
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

   @if(!empty($agentsData) && count($agentsData) > 0)
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0">Agent Wise Report
                    <small class="text-muted">({{ $from->format('d M Y') }} - {{ $to->format('d M Y') }})</small>
                </h5>
            </div>

            <div>
                <a href="{{ route('report.agent.download', request()->all()) }}" class="btn btn-success me-2">
                    <i class="ri-download-line me-1"></i> Download PDF
                </a>

                <button onclick="window.print()" class="btn btn-secondary">
                    <i class="ri-printer-line me-1"></i> Print Report
                </button>
            </div>
        </div>

        <div class="card-body">
            @if(request('agent_id') && isset($agent))
                <div class="mb-4 border p-4">
                    <div class="row align-items-start">
                        <!-- Logo -->
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <img class="logo-icon" src="{{ asset('images/wh logo@4x-200h.png') }}" style="max-width: 80px;" alt="Logo">
                        </div>

                        <!-- Company Info -->
                        <div class="col-md-5">
                            <strong>{{ config('app.name') }}</strong><br>
                            {{ $address->full_address }}<br>
                            {{ $address->email }}<br>
                            {{ $address->phone }}
                        </div>

                        <!-- Agent Info -->
                        <div class="col-md-5">
                            <strong>Agent Info:</strong><br>
                            Name: {{ $agent->name ?? 'N/A' }}<br>
                            Email: {{ $agent->email ?? 'N/A' }}<br>
                            Phone: {{ $agent->phone ?? 'N/A' }}<br>
                            Address: {{ $agent->address ?? 'N/A' }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Agent</th>
                            <th class="text-end">Total Amount</th>
                            <th class="text-end">Total Paid</th>
                            <th class="text-end">Due</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agentsData as $agentId => $data)
                        <tr>
                            <td>{{ $data['agent_name'] }}</td>
                            <td class="text-end">{{ number_format($data['total_amount'], 2) }}</td>
                            <td class="text-end">{{ number_format($data['total_paid'], 2) }}</td>
                            <td class="text-end">{{ number_format($data['due'], 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
        <div class="alert alert-warning">
            <strong>No data found</strong> for the selected date range and agent.
        </div>
    @endif


</div>
@endsection
