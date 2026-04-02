<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Transaction;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:transaction-list|transaction-create|transaction-edit|transaction-delete', ['only' => ['index','store']]);
         $this->middleware('permission:transaction-create', ['only' => ['create','store']]);
         $this->middleware('permission:transaction-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:transaction-delete', ['only' => ['delete']]);
    }

    public function index(Request $request){
        if ($request->ajax()) {
            $transactions = Transaction::get()->all();
            return DataTables::of($transactions)
                ->addIndexColumn()
                ->addColumn('agent', function($row) {
                    return [
                        'id' => $row->agent->id,
                        'name' => $row->agent->name,
                        'image' => $row->agent->image,
                    ];
                })
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.transactions.index',['transactions'=>Transaction::all()]);
    }


    public function create(){
        return view('admin.transactions.create',[
            'agents' => Agent::all()
        ]);
    }




    public function store(Request $request) {
    $this->validate($request, [
        'agent_id'      => 'nullable|exists:agents,id',
        'particulars'   => 'required|string|max:255',
        'paid'          => 'required|numeric|min:0',
        'dues'          => 'required|numeric|min:0',
        'total_amount'  => 'required|numeric|min:0',
        'currency'      => 'required|in:BDT,USD,GBP,JPY,INR,CNY,BTN,PKR,LKR,NPR,AUD,CAD,KRW,SAR,AED,TRY,BRL,MXN,RUB,ZAR,IDR,MYR,THB,SGD,QAR,KWD,SEK',
        'date'          => 'required|date|before:today',
        'note'          => 'nullable|string|max:255',
    ]);

    $data = $request->all();

    try {
        $data['date'] = \Carbon\Carbon::parse($data['date'])->format('Y-m-d');
    } catch (\Exception $e) {
        return back()->with('error', 'Invalid date format.');
    }

    Transaction::create($data);

    return redirect()->route('transactions')->with('success', 'Transaction added successfully');
}










    public function show($id){
        $transaction = Transaction::find($id);
        $cashTransactions = $transaction->cashTransactions;
        $user = $transaction->user;
        return view('admin.transactions.show',[
            'transaction'=>$transaction,
            'cashTransactions'=>$cashTransactions,
            'user'=>$user
        ]);
    }


    public function edit($id){
        return view('admin.transactions.edit',[
            'transaction'=>Transaction::find($id),
            'agents' => Agent::all()
        ]);
    }


 public function update(Request $request, $id)
{
    $this->validate($request, [
        'agent_id'      => 'nullable|exists:agents,id',
        'particulars'   => 'required|string|max:255',
        'paid'          => 'required|numeric|min:0',
        'dues'          => 'required|numeric|min:0',
        'total_amount'  => 'required|numeric|min:0',
        'currency'      => 'required|in:BDT,USD,GBP,JPY,INR,CNY,BTN,PKR,LKR,NPR,AUD,CAD,KRW,SAR,AED,TRY,BRL,MXN,RUB,ZAR,IDR,MYR,THB,SGD,QAR,KWD,SEK',
        'date'          => 'required|date|before:today',
        'note'          => 'nullable|string|max:255',
    ]);

    $transaction = Transaction::findOrFail($id);
    $data = $request->all();

    try {
        $data['date'] = \Carbon\Carbon::parse($data['date'])->format('Y-m-d');
    } catch (\Exception $e) {
        return back()->with('error', 'Invalid date format.');
    }

    $transaction->update($data);

    return redirect()->route('transactions')->with('success', 'Transaction updated successfully');
}




public function agentTransactions($id)
{

    // This will stop execution here — remove it after checking
    // $agent = Agent::findOrFail($id);

    $agents = Agent::find($id);
if (!$agents) {
    return back()->with('error', 'Agent not found.');
}



    $transactions = Transaction::where('agent_id', $id)->orderBy('id', 'desc')->get();


    return view('admin.transactions.agent_transactions', compact('agents', 'transactions'));
}


public function storeTransaction(Request $request, $id)
{
    $request->validate([
        'particulars' => 'required|string',
        'total_amount' => 'required|numeric',
        'paid' => 'required|numeric',
        'dues' => 'required|numeric',
        'currency' => 'required|string',
        'date' => 'required|date',
        'note' => 'nullable|string',
    ]);

    Transaction::create([
        'agent_id' => $id, // এই id আগের route থেকে এসেছে
        'particulars' => $request->particulars,
        'total_amount' => $request->total_amount,
        'paid' => $request->paid,
        'dues' => $request->dues,
        'currency' => $request->currency,
        'date' => $request->date,
        'note' => $request->note,
    ]);

    return redirect()->route('agent.transactions', $id)->with('success', 'Transaction added successfully.');
}


// public function agentTransactions($id)
// {
//     $agent = Agent::find($id);

//     if (!$agent) {
//         return redirect()->back()->with('error', 'Agent not found.');
//     }

//     $transactions = Transaction::where('agent_id', $id)->latest()->get();

//     return view('admin.transactions.agent_transactions', compact('agent', 'transactions'));
// }


public function storeAgentTransaction(Request $request, $id)
{
    $request->validate([
        'particulars' => 'required|string|max:255',
        'total_amount' => 'required|numeric',
        'paid' => 'required|numeric',
        'dues' => 'required|numeric',
        'currency' => 'required|string',
        'date' => 'required|date',
        'note' => 'nullable|string',
    ]);

    Transaction::create([
        'agent_id' => $id,
        'particulars' => $request->particulars,
        'total_amount' => $request->total_amount,
        'paid' => $request->paid,
        'dues' => $request->dues,
        'currency' => $request->currency,
        'date' => $request->date,
        'note' => $request->note,
    ]);

    // return redirect()->route('agent.transactions', $id)->with('success', 'Transaction added successfully!');
      return redirect()->back()->with('success', 'Transaction added successfully.');
}

    public function delete($id){
        Transaction::find($id)->delete();
        return back()->with('success','Transaction deleted successfully');
    }
}
