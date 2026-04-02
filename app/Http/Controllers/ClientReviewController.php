<?php

namespace App\Http\Controllers;

use App\Models\ClientReview;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class ClientReviewController extends Controller
{
    function __construct(){
        $this->middleware('permission:client-review-list|client-review-create|client-review-edit|client-review-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:client-review-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:client-review-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:client-review-delete', ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $client_review = ClientReview::get()->all();

            return DataTables::of($client_review)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->addColumn('status', function($row) {
                    return [
                        'id' => $row->id,
                        'status' => $row->status
                    ];
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.client-reviews.index');
    }

    public function create()
    {
        return view('admin.client-reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();

        if($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/client-review/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }
        ClientReview::create($data);

        return redirect()->route('client-review')->with('success','Client Review created successfully.');
    }

    public function edit($id)
    {
        return view('admin.client-reviews.edit',[
            'client_review' => ClientReview::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        $old_data = ClientReview::find($id);

        if($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/client-review/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
            if($old_data->image != ""){
                if(file_exists($old_data->image)){
                    unlink($old_data->image);
                }
            }

        }
        ClientReview::find($id)->update($data);

        return redirect()->route('client-review')->with('success','Client Review updated successfully.');
    }

    public function delete($id){
        $client_review = ClientReview::find($id);
        if($client_review->image != ""){
            if(file_exists($client_review->image)){
                unlink($client_review->image);
            }
        }
        $client_review->delete();
        return redirect()->route('client-review')->with('success','Client Review deleted successfully.');
    }


    public function changeStatus(Request $request)
    {
        $client_review = ClientReview::find($request->id);
        $client_review->status = $request->status;
        $client_review->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
