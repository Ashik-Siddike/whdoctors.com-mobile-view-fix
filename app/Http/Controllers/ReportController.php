<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amount;

use App\Models\Address;
use App\Models\Payment;
use App\Models\Agent;
use Barryvdh\DomPDF\Facade\Pdf;

use Carbon\Carbon;


class ReportController extends Controller
{
    //

public function agentWiseReport(Request $request)
{
    $from = Carbon::parse($request->input('from_date'));
    $to = Carbon::parse($request->input('to_date'));
    $agentId = $request->input('agent_id');

    $query = Amount::with('payments', 'agent')
        ->whereBetween('date', [$from, $to]);

    if ($agentId) {
        $query->where('agent_id', $agentId);
    }

    $amounts = $query->get();
    $agentsData = [];

    foreach ($amounts as $amount) {
        $agent = $amount->agent;
        if (!$agent) continue;

        $id = $agent->id;

        if (!isset($agentsData[$id])) {
            $agentsData[$id] = [
                'agent_name' => $agent->name,
                'total_amount' => 0,
                'total_paid' => 0,
                'due' => 0,
            ];
        }

        $agentsData[$id]['total_amount'] += $amount->amount;
        $agentsData[$id]['total_paid'] += $amount->payments->sum('paid');
        $agentsData[$id]['due'] = $agentsData[$id]['total_amount'] - $agentsData[$id]['total_paid'];
    }

    $agents = Agent::all();
    $address = Address::first();
    $agent = null;

    if ($agentId) {
        $agent = Agent::find($agentId);
    }

    return view('admin.report.agent_report', compact('from', 'to', 'agentsData', 'agents', 'address', 'agent'));
}


public function downloadAgentReport(Request $request)
{
    // আগের মতো ডেটা প্রসেসিং
    $from = Carbon::parse($request->input('from_date'));
    $to = Carbon::parse($request->input('to_date'));
    $agentId = $request->input('agent_id');

    $query = Amount::with('payments', 'agent')->whereBetween('date', [$from, $to]);

    if ($agentId) {
        $query->where('agent_id', $agentId);
    }

    $amounts = $query->get();

    $agentsData = [];
    foreach ($amounts as $amount) {
        $agent = $amount->agent;
        if (!$agent) continue;

        $id = $agent->id;

        if (!isset($agentsData[$id])) {
            $agentsData[$id] = [
                'agent_name' => $agent->name,
                'total_amount' => 0,
                'total_paid' => 0,
                'due' => 0,
            ];
        }

        $agentsData[$id]['total_amount'] += $amount->amount;
        $agentsData[$id]['total_paid'] += $amount->payments->sum('paid');
        $agentsData[$id]['due'] = $agentsData[$id]['total_amount'] - $agentsData[$id]['total_paid'];
    }

    $address = Address::first();
    $agent = $agentId ? Agent::find($agentId) : null;
    $agents = Agent::all();

    $pdf = Pdf::loadView('admin.report.agent_report_pdf', compact('from', 'to', 'agentsData', 'agents', 'address', 'agent'));
    return $pdf->download('agent-report.pdf');
}


}
