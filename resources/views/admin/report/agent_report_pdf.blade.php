<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Agent Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .header, .info, .table { width: 100%; margin-bottom: 20px; }
        .table { border-collapse: collapse; }
        .table th, .table td { border: 1px solid #000; padding: 6px; text-align: left; }
        .text-end { text-align: right; }
        .logo { max-height: 60px; }
    </style>
</head>
<body>

    <div class="header">
   <table style="width: 100%;">
    <tr>
        <!-- Logo -->
        <td style="width: 20%; vertical-align: top;">
            <img src="{{ public_path('images/wh logo@4x-200h.png') }}" class="logo">
        </td>

        <!-- Company Info -->
        <td style="width: 40%; vertical-align: top;">
            <strong>{{ config('app.name') }}</strong><br>
            <span style="display: block;">{!! wordwrap(e($address->full_address), 35, '<br>') !!}</span>
            {{ $address->email }}<br>
            {{ $address->phone }}
        </td>

        <!-- Agent Info -->
        <td style="width: 40%; vertical-align: top;">
            @if($agent)
                <strong>Agent Info:</strong><br>
                Name: {{ $agent->name ?? 'N/A' }}<br>
                Email: {{ $agent->email ?? 'N/A' }}<br>
                Phone: {{ $agent->phone ?? 'N/A' }}<br>
                Address: {{ $agent->address ?? 'N/A' }}
            @endif
        </td>
    </tr>
</table>

    </div>

    <div class="info">
        <strong>Report Period:</strong> {{ $from->format('d M Y') }} - {{ $to->format('d M Y') }}
    </div>

    <table class="table">
        <thead>
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

</body>
</html>
