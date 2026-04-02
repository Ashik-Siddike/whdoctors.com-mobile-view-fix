<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageContent;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class PageContentController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:page-content-list|page-content-create|page-content-edit|page-content-delete', ['only' => ['index','store']]);
         $this->middleware('permission:page-content-create', ['only' => ['create','store']]);
         $this->middleware('permission:page-content-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:page-content-delete', ['only' => ['delete']]);
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            // $pageContent = PageContent::get()->all();
            if($request->hints){
                $pageContent = PageContent::where('id', '!=', 39)->where('id', '!=', 40)->where('id', '!=', 41)->where('hints', $request->hints)->get()->all();
            }else{
                $pageContent = PageContent::where('id', '!=', 39)->where('id', '!=', 40)->where('id', '!=', 41)->get()->all();
            }
            return DataTables::of($pageContent)
                ->addIndexColumn()
                ->addColumn('page_id', function($row) {
                    return $row->page->title;
                })
                ->addColumn('action-btn', function($row) {
                    $auth_user = Auth::user();
                    if($auth_user->hasRole('superadmin')){
                        $roleMatch = [
                            'id' => $row->id,
                            'role' => $auth_user->roles->first()->name ?? null,
                            'active_status' => $row->active_status,
                            'hints' => $row->hints,
                        ];
                        return $roleMatch;
                    }else{
                        $roleMatch = [
                            'id' => $row->id,
                            'active_status' => $row->active_status,
                            'hints' => $row->hints,
                        ];
                        return $roleMatch;
                    }
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.pagecontents.index')->with('hints', $request->hints);
    }



    public function create(){
        return view('admin.pagecontents.create',[
            'pages' => Page::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'page_id' => 'required',
            'hints' => 'required',
            'number' => 'nullable|numeric',  // সংখ্যাগত মানের জন্য ভ্যালিডেশন
        ], [
            'page_id.required' => 'Please select a page',
            'hints.required' => 'Please add hints',
            'number.numeric' => 'The number field must be a valid number',
        ]);

        $data = $request->all();

        if ($request->has('is_not_deleteable')) {
            $data['is_not_deleteable'] = 1;
        } else {
            $data['is_not_deleteable'] = 0;
        }

        if ($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/pageContent-image/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }

        // Save the data
        PageContent::create($data);
//        return back()->with('success', 'Page Content Deleted Successfully');
        return redirect()->route('page-contents')->with('success', 'Page Content Create Successfully');

    }



    public function edit($id)
    {
        return view('admin.pagecontents.edit', [
            'page_content' => PageContent::find($id),
            'pages' => Page::all()
        ]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $old_data = PageContent::find($id);

        if(isset($data['cover_image_data']) && $data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/pageContent-image/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
            if(file_exists($old_data->image)){
                unlink($old_data->image);
            }
        }


        PageContent::find($id)->update($data);

        return redirect()->route('page-contents', ['hints' => $old_data->hints])->with('success', 'Page Content Updated Successfully');
    }

    public function delete($id)
    {
        // Find the PageContent by ID
        $pageContent = PageContent::find($id);

        if ($pageContent) {
            // Check if the record is not marked as "not deleteable"
            if ($pageContent->is_not_deleteable == 0) {
                // Delete the associated image if it exists
                if (file_exists(public_path('/../upload/pageContent-image/'))) {
                    unlink(public_path('/../upload/pageContent-image/'));  // Deletes the image from the storage
                }

                // Delete the record from the database
                $pageContent->delete();

                return back()->with('success', 'Page Content Deleted Successfully');
            } else {
                // If the record is marked as "not deleteable"
                return back()->with('error', 'This page content cannot be deleted.');
            }
        } else {
            // If the page content was not found
            return back()->with('error', 'Page Content not found.');
        }
    }



    public function changeStatus(Request $request){
        $page_content = PageContent::find($request->id);
        $page_content->active_status = $request->status;
        if($request->hints == 'slider'){
            $active_slider = PageContent::where('active_status', 1)->where('hints', 'slider')->get()->count();
            if($request->status == 1 && $active_slider >= 5){
                return response()->json(['error' => 'You can not active more than 5 slider']);
            }
        }else if($request->hints == 'service-point'){
            $active_service_point = PageContent::where('active_status', 1)->where('hints', 'service-point')->get()->count();
            if($request->status == 1 && $active_service_point >= 6){
                return response()->json(['error' => 'You can not active more than 6 service point']);
            }
        }
        $page_content->save();
        return response()->json(['success' => $request->hints.' Status Changed Successfully']);
    }
}
