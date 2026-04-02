<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class ApplyController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:apply-list|apply-create|apply-edit|apply-delete', ['only' => ['index','store']]);
         $this->middleware('permission:apply-create', ['only' => ['create','store']]);
         $this->middleware('permission:apply-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:apply-delete', ['only' => ['delete']]);
    }

    public function apply(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required | unique:applies',
            'phone' => 'required',
            'university' => 'required',
            'country' => 'required',
        ],[
            'name.required' => 'Please enter a name',
            'email.required' => 'Please enter a email',
            'email.unique' => 'Email already exists',
            'phone.required' => 'Please enter a phone',
            'university.required' => 'Please enter a university',
            'country.required' => 'Please enter a country',
        ]);

        $data = $request->all();
        // cv and document upload
        if($request->hasFile('cv')){

            $cv = $request->file('cv');
            $destinationPath = 'upload/cv/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $cv->getClientOriginalExtension();
            $cv->move($destinationPath, $imageValue);
            $data['cv'] = $imageValue;
        }

        if($request->hasFile('document')){
            $document = $request->file('document');
            $destinationPath = 'upload/document/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $document->getClientOriginalExtension();
            $document->move($destinationPath, $imageValue);
            $data['document'] = $imageValue;
        }

        if($data['logo_image_data'] != "") {
            $this->validate($request, [
                'passport_front_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            ], [
                'passport_front_image.required' => 'image is required',
                'passport_front_image.image' => 'image is not valid',
                'passport_front_image.mimes' => 'image type not supported',
                'passport_front_image.max' => 'image size should be less than 2MB',
            ]);

            $image = $request->file('passport_front_image');
            $destinationPath = 'upload/passport-front-image/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['passport_front_image'] = $imageValue;
        }

        if($data['cover_image_data'] != "") {

            $this->validate($request, [
                'passport_back_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            ], [
                'passport_back_image.required' => 'image is required',
                'passport_back_image.image' => 'image is not valid',
                'passport_back_image.mimes' => 'image type not supported',
                'passport_back_image.max' => 'image size should be less than 2MB',
            ]);
            $image = $request->file('passport_back_image');
            $destinationPath = 'upload/passport-back-image/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['passport_back_image'] = $imageValue;
        }
        Apply::create($data);
        return redirect()->back()->with('success', 'Apply created successfully');

    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $applies = Apply::get()->all();
            return DataTables::of($applies)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.applies.index', [
            'applies' => Apply::all()
        ]);
    }

    public function create()
    {
        return view('admin.applies.create');
    }


    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required | unique:applies',
            'phone' => 'required',
            'country' => 'required',
            'university' => 'required',
            'course_name' => 'required',

        ],[
            'name.required' => 'Please enter a name',
            'email.required' => 'Please enter a email',
            'email.unique' => 'Email already exists',
            'phone.required' => 'Please enter a phone',
            'country.required' => 'Please enter a country',
            'university.required' => 'Please enter a university',
            'course_name.required' => 'Please enter a course name',
        ]);

        $data = $request->all();
        // cv and document upload
        if($request->hasFile('cv')){
            $cv = $request->file('cv');
            $destinationPath = 'upload/cv/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $cv->getClientOriginalExtension();
            $cv->move($destinationPath, $imageValue);
            $data['cv'] = $imageValue;
        }

        if($request->hasFile('document')){
            $document = $request->file('document');
            $destinationPath = 'upload/document/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $document->getClientOriginalExtension();
            $document->move($destinationPath, $imageValue);
            $data['document'] = $imageValue;
        }

        if($data['logo_image_data'] != "") {
            $image = $request->file('passport_front_image');
            $destinationPath = 'upload/passport-front-image/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['passport_front_image'] = $imageValue;
        }

        if($data['cover_image_data'] != "") {
            $image = $request->file('passport_back_image');
            $destinationPath = 'upload/passport-back-image/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['passport_back_image'] = $imageValue;
        }

        Apply::create($data);
        return redirect()->route('applies')->with('success', 'Apply created successfully');

    }

    public function edit($id)
    {
        return view('admin.applies.edit', [
            'apply' => Apply::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required | unique:applies,email,'.$id,
            'phone' => 'required',
            'country' => 'required',
            'university' => 'required',
            'course_name' => 'required',

        ],[
            'name.required' => 'Please enter a name',
            'email.required' => 'Please enter a email',
            'email.unique' => 'Email already exists',
            'phone.required' => 'Please enter a phone',
            'country.required' => 'Please enter a country',
            'university.required' => 'Please enter a university',
            'course_name.required' => 'Please enter a course name',
        ]);

        $data = $request->all();
        $old_data = Apply::find($id);
        if($request->hasFile('cv')){
            $cv = $request->file('cv');
            $destinationPath = 'upload/cv/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $cv->getClientOriginalExtension();
            $cv->move($destinationPath, $imageValue);
            $data['cv'] = $imageValue;
            if($old_data->cv != ""){
                unlink($old_data->cv);
            }
        }

        if($request->hasFile('document')){
            $document = $request->file('document');
            $destinationPath = 'upload/document/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $document->getClientOriginalExtension();
            $document->move($destinationPath, $imageValue);
            $data['document'] = $imageValue;
            if($old_data->document != ""){
                unlink($old_data->document);
            }
        }

        // passport front image
        if(isset($data['logo_image_data']) && $data['logo_image_data'] != "") {
            $image = $request->file('passport_front_image');
            $destinationPath = 'upload/passport-front-image/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['passport_front_image'] = $imageValue;
            if(file_exists($old_data->passport_front_image)){
                unlink($old_data->passport_front_image);
            }
        }

        if(isset($data['cover_image_data']) && $data['cover_image_data'] != "") {
            $image = $request->file('passport_back_image');
            $destinationPath = 'upload/passport-back-image/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['passport_back_image'] = $imageValue;
            if(file_exists($old_data->passport_back_image)){
                unlink($old_data->passport_back_image);
            }
        }

        Apply::find($id)->update($data);
        return redirect()->route('applies')->with('success', 'Apply updated successfully');

    }

    public function delete($id){
        $apply = Apply::find($id);
        if(file_exists($apply->cv)){
            unlink($apply->cv);
        }
        if(file_exists($apply->document)){
            unlink($apply->document);
        }
        if(file_exists($apply->passport_front_image)){
            unlink($apply->passport_front_image);
        }
        if(file_exists($apply->passport_back_image)){
            unlink($apply->passport_back_image);
        }
        $apply->delete();
        return back()->with('success', 'Apply deleted successfully');
    }


}
