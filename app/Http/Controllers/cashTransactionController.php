<?php

namespace App\Http\Controllers;
use App\Models\cashTransaction;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Agent;
use Carbon\Carbon;


use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class cashTransactionController extends Controller
{
    function __construct(){
        $this->middleware('permission:transaction-list|transaction-create|transaction-edit|transaction-delete', ['only' => ['index','store']]);
        $this->middleware('permission:transaction-create', ['only' => ['create','store']]);
        $this->middleware('permission:transaction-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:transaction-delete', ['only' => ['delete']]);
    }
    // public function index($id){
    //     $cashtransactions = cashTransaction::where('transaction_id', $id)->orderBy('id', 'desc')->get();
    //     $transaction = Transaction::find($id);
    //     $user = User::find($transaction->agent_id);

    //     return view('admin.cashtransactions.index',['cashtransactions'=>$cashtransactions, 'id'=>$id, 'user'=>$user, 'transaction'=>$transaction]);
    // }

    public function index($id)
{
    $cashtransactions = cashTransaction::where('transaction_id', $id)->orderBy('id', 'desc')->get();
    $transaction = Transaction::find($id);

    // Check if transaction exists
    if (!$transaction) {
        return redirect()->route('transactions')->with('error', 'Transaction not found.');
    }

    $user = Agent::find($transaction->agent_id);

    // Pass the currency from the transaction to the view
    return view('admin.cashtransactions.index', [
        'id' => $id,
        'user' => $user,
        'transaction' => $transaction,
    ]);
}




    public function create(){
        return view('admin.cashtransactions.create',[
            'transactions' => Transaction::all()
        ]);
    }


    // public function store(Request $request){
    //     $this->validate($request, [
    //         'transaction_id' => 'required',
    //         'amount' => 'required|numeric',
    //         'currency' => 'required|in:BDT,USD,GBP,JPY,INR,CNY,BTN,PKR,LKR,NPR,AUD,CAD,KRW,SAR,AED,TRY,BRL,MXN,RUB,ZAR,IDR,MYR,THB,SGD,QAR,KWD,SEK',
    //         'note'=>'nullable',
    //         'date' => 'required',
    //     ]);
    //     $data = $request->all();
    //     try {

    //         $date = \Carbon\Carbon::createFromFormat('d-M-Y', $data['date']);
    //         $data['date'] = $date->format('Y-m-d');
    //     } catch (\Exception $e) {

    //         try {
    //             $date = \Carbon\Carbon::createFromFormat('Y-m-d', $data['date']);
    //             $data['date'] = $date->format('Y-m-d');
    //         } catch (\Exception $e) {

    //             return back()->with('error', 'The date format is incorrect. Please use d-M-Y or Y-m-d format.');
    //         }
    //     }
    //     cashTransaction::create($data);
    //     return back()->with('success','Cash Transaction added successfully');
    // }


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


    public function edit($id){
        $cashtransaction = cashTransaction::find($id);

        // get the transaction of this cash transaction
        $transaction = Transaction::find($cashtransaction->transaction_id);

        return view('admin.cashtransactions.edit',[
            'cashtransaction'=>$cashtransaction,
            'transaction'=>$transaction,
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'transaction_id' => 'required',
            'amount' => 'required|numeric',
            'currency' => 'required|in:BDT,USD,GBP,JPY,INR,CNY,BTN,PKR,LKR,NPR,AUD,CAD,KRW,SAR,AED,TRY,BRL,MXN,RUB,ZAR,IDR,MYR,THB,SGD,QAR,KWD,SEK',
            'note' => 'nullable',
            'date' => 'required',
        ]);

        try {
            // ট্রানজাকশন রেকর্ড খুঁজে বের করা
            $transaction = cashTransaction::findOrFail($id);

            // তারিখ ফরম্যাট ঠিক করা
            $date = $request->input('date');

            try {
                $formattedDate = \Carbon\Carbon::createFromFormat('d-M-Y', $date)->format('Y-m-d');
            } catch (\Exception $e) {
                try {
                    $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');
                } catch (\Exception $e) {
                    return back()->with('error', 'The date format is incorrect. Please use d-M-Y or Y-m-d format.');
                }
            }

            // ডাটা আপডেট করা
            $transaction->update([
                'transaction_id' => $request->input('transaction_id'),
                'amount' => $request->input('amount'),
                'currency' => $request->input('currency'),
                'note' => $request->input('note'),
                'date' => $formattedDate,
            ]);

            return redirect()->route('cashtransactions', $transaction->transaction_id)
                     ->with('success', 'Cash Transaction updated successfully.');


        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }


    public function delete($id){
        cashTransaction::find($id)->delete();
        return back()->with('success','Cash Transaction deleted successfully');
    }

public function report(Request $request)
{
    $transactions = collect(); // empty collection
    $totalAmount = 0;
    $startDate = null;
    $endDate = null;

    if ($request->has(['start_date', 'end_date'])) {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate = Carbon::parse($request->end_date)->endOfDay();

        $transactions = CashTransaction::whereBetween('date', [$startDate, $endDate])->get();
        $totalAmount = $transactions->sum('amount');
    }

    return view('admin.cashtransactions.report', compact(
        'transactions',
        'totalAmount',
        'startDate',
        'endDate'
    ));
}




public function reportstor(Request $request)
{
    // Validate input dates (optional but recommended)
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    // Parse dates
    $startDate = Carbon::parse($request->start_date)->startOfDay();
    $endDate = Carbon::parse($request->end_date)->endOfDay();

    // Fetch transactions within date range
    $transactions = CashTransaction::whereBetween('date', [$startDate, $endDate])->get();

    // Calculate total amount
    $totalAmount = $transactions->sum('amount');

    // Return to view with data
    return view('admin.cashtransactions.report', compact(
        'transactions',
        'totalAmount',
        'startDate',
        'endDate'
    ));
}

}
