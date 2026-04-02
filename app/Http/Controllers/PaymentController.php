<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Agent;
use App\Models\Payment;
use App\Models\Amount;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PaymentController extends Controller
{
    // Show all payments
public function index(Request $request, $agentId = null)
{
    // Filter amounts by agent
    $amounts = $agentId
        ? Amount::with('agent')->where('agent_id', $agentId)->get()
        : Amount::with('agent')->get();

    // Only get payments where the amount belongs to this agent
    $payments = $agentId
        ? Payment::with('amount')->whereHas('amount', fn($q) => $q->where('agent_id', $agentId))->latest()->get()
        : Payment::with('amount')->latest()->get();

    // Group summary
    $grouped = $payments->groupBy(fn($item) =>
        $item->amount?->particulars ?? 'N/A'
    )->map(function ($group, $particulars) {
        $totalAmount = $group->pluck('amount')->unique('id')->sum('amount');
        $totalPaid = $group->sum('paid');
        $due = $totalAmount - $totalPaid;

        return [
            'particulars' => $particulars,
            'times' => $group->count(),
            'totalAmount' => $totalAmount,
            'totalPaid' => $totalPaid,
            'due' => $due,
        ];
    });

    $uniqueAmounts = $payments->pluck('amount')->unique('id');
    $grandSummary = [
        'totalAmount' => $uniqueAmounts->sum('amount'),
        'totalPaid' => $payments->sum('paid'),
        'due' => $uniqueAmounts->sum('amount') - $payments->sum('paid'),
        'times' => $payments->count(),
    ];

    return view('admin.payment.index', compact('amounts', 'payments', 'grouped', 'grandSummary'));
}



    // Show create form
    // public function create()
    // {
    //     $amounts = Amount::all(); // dropdown এ দেখানোর জন্য
    //     return view('admin.payment.create', compact('amounts'));
    // }

    public function create(Amount $amount)
    {
        return view('admin.payment.create', compact('amount'));
    }


    // Store a new payment
    public function store(Request $request)
    {
        $request->validate([
            'amount_id' => 'required|exists:amount,id',
            'paid' => 'required|numeric|min:0',
            'date' => 'required|date',
            'currency' => 'required|string',
            'note' => 'nullable|string|max:255',
        ]);

        Payment::create($request->all());

        return redirect()->back()->with('success', 'Payment added successfully.');
    }

    // Show a single payment
    public function show($id)
    {
        $payment = Payment::with('amount')->findOrFail($id);

        return view('admin.payment.show', compact('payment'));
    }

    // Show edit form
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $amounts = Amount::all();

        return view('admin.payment.edit', compact('payment', 'amounts'));
    }

    // Update payment
    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $request->validate([
            'amount_id' => 'required|exists:amount,id',
            'paid' => 'required|numeric|min:0',
            'date' => 'required|date',
            'currency' => 'required|string',
            'note' => 'nullable|string|max:255',
        ]);

        $payment->update($request->all());

        return redirect()->route('payment.index')->with('success', 'Payment updated successfully.');
    }


public function received($id)
{
    // Load payment with related amount and agent
    $payment = Payment::with('amount.agent')->findOrFail($id);

    // Get the agent from the payment's amount
    $agent = $payment->amount->agent;

    // Get all amounts created by this agent
    $amounts = Amount::with('payments')
                ->where('agent_id', $agent->id)
                ->orderBy('created_at', 'desc')
                ->get();

    $address = Address::first();

    return view('admin.payment.received', compact('amounts', 'payment', 'agent', 'address'));
}


public function downloadReceived($id)
{
    // Load payment with related amount and agent
    $payment = Payment::with('amount.agent')->findOrFail($id);

    // Get the agent from the payment's amount
    $agent = $payment->amount->agent;

    // Get all amounts created by this agent
    $amounts = Amount::with('payments')
                ->where('agent_id', $agent->id)
                ->orderBy('created_at', 'desc')
                ->get();

    $address = Address::first();

    // Load a PDF view and pass the data
    $pdf = Pdf::loadView('admin.payment.received_pdf', compact('amounts', 'payment', 'agent', 'address'));

    // Download the PDF with a custom filename
    return $pdf->download('received_payment_' . $payment->id . '.pdf');
}





    // Delete payment
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payment.index')->with('success', 'Payment deleted successfully.');
    }
}
