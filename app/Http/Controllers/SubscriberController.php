<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubscriberController extends Controller
{
    //

//    function __construct(){
//        $this->middleware('permission:subscriber-list|subscriber-create|subscriber-edit|subscriber-delete', ['only' => ['index', 'store']]);
//        $this->middleware('permission:subscriber-create', ['only' => ['create', 'store']]);
//        $this->middleware('permission:subscriber-edit', ['only' => ['edit', 'update']]);
//        $this->middleware('permission:subscriber-delete', ['only' => ['delete']]);
//    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $subscribers = Subscriber::select('*');

            return DataTables::of($subscribers)
                ->addIndexColumn() // For SL NO
                ->addColumn('email', function($row) {
                    return $row->email;
                })
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }

        return view('admin.subscriber.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create([
            'email' => $request->email,
        ]);

        return back()->with('success', 'Subscribed successfully!');
    }


    public function delete($id)
    {
        $subscriber = Subscriber::find($id);

        if (!$subscriber) {
            return redirect()->back()->with('error', 'Subscriber not found.');
        }

        $subscriber->delete();
        return redirect()->back()->with('success', 'Subscriber deleted successfully.');
    }

}
