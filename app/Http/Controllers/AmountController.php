<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use App\Models\Payment;
use App\Models\Agent;
use Illuminate\Http\Request;

class AmountController extends Controller
{
    // Show all amounts with total paid and dues
public function index()
{
    // Load related agent and payments, ordered by newest first
    $amounts = Amount::with(['payments', 'agent'])
                    ->orderBy('created_at', 'desc')
                    ->get();

    return view('admin.amount.index', compact('amounts'));
}


    // Show a single amount
    public function show($id)
    {
        $amount = Amount::with('payments')->findOrFail($id);

        return view('admin.amount.show', compact('amount'));
    }

    // Show create form
        public function create()
        {
            return view('admin.amount.create', [
                'agents' => Agent::all()
            ]);
        }
    // Store new amount
    public function store(Request $request)
    {
        $request->validate([
            'agent_id' => 'required|integer',
            'particulars' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'currency' => 'required|string',
            'note' => 'nullable|string',
        ]);

        Amount::create($request->all());

        return redirect()->route('amount.index')->with('success', 'Amount added successfully.');
    }

    // Show edit form
   public function edit($id)
{
    $amount = Amount::findOrFail($id);
    $agents = Agent::all();
    return view('admin.amount.edit', compact('amount', 'agents'));
}

    // Update amount
    public function update(Request $request, $id)
    {
        $amount = Amount::findOrFail($id);

        $request->validate([
            'agent_id' => 'required|integer',
            'particulars' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'currency' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $amount->update($request->all());

        return redirect()->route('amount.index')->with('success', 'Amount updated successfully.');
    }

    // Delete amount
    public function destroy($id)
    {
        $amount = Amount::findOrFail($id);
        $amount->delete();

        return redirect()->route('amount.index')->with('success', 'Amount deleted successfully.');
    }
}
