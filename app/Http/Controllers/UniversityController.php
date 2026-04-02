<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\Course;
use App\Models\University;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use DB;

class UniversityController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:university-list|university-create|university-edit|university-delete', ['only' => ['index','store']]);
         $this->middleware('permission:university-create', ['only' => ['create','store']]);
         $this->middleware('permission:university-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:university-delete', ['only' => ['delete']]);
    }
    public function index(Request $request){
        if ($request->ajax()) {

           $universities = University::with('country', 'courses')
    ->orderBy('created_at', 'desc') // latest() এর বিকল্প
    ->get();

            return DataTables::of($universities)
                ->addIndexColumn()
                ->addColumn('country', function($row) {
                    return $row->country->name;
                })
                ->addColumn('courses', function($row) {
                    return $row->courses;
                })
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn', 'country', 'courses'])
                ->make(true);
        }
        return view('admin.university.index');
    }
    public function create(){
        // from many to many relationship get all courses.
        $courses = Course::get()->all();
        return view('admin.university.create',['countries'=>Countries::all(), 'courses'=>$courses]);
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|max:60| unique:universities',
            'type' => 'required',
            'country_id' => 'required',
            'address' => 'required',
            'program' => 'required|max:100',
            'tuition_fee' => 'required|max:100',
            'living_cost' => 'required|max:100',
            'application_date' => 'nullable',
            'application_date_2' => 'nullable',
            'application_date_3' => 'nullable',
        ], [
            'name.max' => 'your name should be less than 60 characters',
            'name.unique' => 'this name is already taken',
            'type.required' => 'please select university type',
            'program.max' =>  'your program should be less than 100 characters',
            'tuition_fee.max' =>  'your tution fee should be less than 100 characters',
            'living_cost.max' =>  'your living cost should be less than 100 characters',
            'application_date.max' =>  'your application date should be less than 100 characters',
            'application_date_2.max' =>  'your second application date should be less than 100 characters',
            'application_date_3.max' =>  'your third application date should be less than 100 characters',
        ]);

        // get all $request data without course name
        $data = $request->except('course_id');


        if($request->has('is_show_homepage')){
            $data['is_show_homepage'] = 1;
        }else{
            $data['is_show_homepage'] = 0;
        }

        if($request->has('is_partner')){
            $data['is_partner'] = 1;
        }else{
            $data['is_partner'] = 0;
        }


        if($data['logo_image_data'] != "") {
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            ], [
                'image.image' => 'image is not valid',
                'image.mimes' => 'image type not supported',
                'image.max' => 'image size should be less than 2MB',
            ]);
            $image = $request->file('image');
            $destinationPath = 'upload/university-image/logo/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }

        if($data['cover_image_data'] != "") {
            $this->validate($request, [
                'cover_image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            ], [
                'cover_image.image' => 'image is not valid',
                'cover_image.mimes' => 'image type not supported',
                'cover_image.max' => 'image size should be less than 2MB',
            ]);
            $image = $request->file('cover_image');
            $destinationPath = 'upload/university-image/cover/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['cover_image'] = $imageValue;
        }

        // if($data['meta_image_data'] != "") {
        //     $this->validate($request, [
        //         'meta_image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        //     ], [
        //         'meta_image.image' => 'image is not valid',
        //         'meta_image.mimes' => 'image type not supported',
        //         'meta_image.max' => 'image size should be less than 2MB',
        //     ]);
        //     $image = $request->file('meta_image');
        //     $destinationPath = 'upload/university-image/meta_image/';
        //     $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $imageValue);
        //     $data['meta_image'] = $imageValue;
        // }

        $data['country_id'] = (int)$data['country_id'];

        $newUniversity = University::create($data);

        $course_ids = $request->course_id;

        $newUniversity->courses()->attach($course_ids);

        return redirect()->route('university')->with('success','University created successfully');
    }

    public function edit($id){

        $university = University::find($id);
        $countries = Countries::all();
        $courses = Course::all();
        $university_courses = $university->courses()->get()->all();

        return view('admin.university.edit',
        [
            'university'=>$university,
            'countries'=>$countries,
            'courses'=>$courses,
            'university_courses'=>$university_courses
        ]);
    }



    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:80',
            'country_id' => 'required',
            'address' => 'required',
            'program' => 'required|max:100',
            'tuition_fee' => 'required|max:100',
            'living_cost' => 'required|max:100',
            'application_date' => 'required',
             'application_date' => 'nullable',
            'application_date_2' => 'nullable',
            'application_date_3' => 'nullable',
        ], [
            'name.max' => 'your name should be less than 80 characters',
            'program.max' =>  'your program should be less than 100 characters',
            'tuition_fee.max' =>  'your tution fee should be less than 100 characters',
            'living_cost.max' =>  'your living cost should be less than 100 characters',
            'application_date.max' =>  'your application date should be less than 100 characters',
            'application_date_2.max' =>  'your second application date should be less than 100 characters',
            'application_date_3.max' =>  'your third application date should be less than 100 characters',
        ]);
        // $data = $request->all();
        $data = $request->except('course_id');
        $old_data = University::find($id);

        if($request->has('is_show_homepage')){
            $data['is_show_homepage'] = 1;
        }else{
            $data['is_show_homepage'] = 0;
        }

        if($request->has('is_partner')){
            $data['is_partner'] = 1;
        }else{
            $data['is_partner'] = 0;
        }


        if(isset($data['logo_image_data']) && $data['logo_image_data'] != ""){
            $image = $request->file('image');
            $destinationPath = 'upload/university-image/logo/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
            if ($old_data->cover_image && file_exists(public_path($old_data->image))) {
                unlink(public_path($old_data->image));
            }
        }

        if(isset($data['cover_image_data']) && $data['cover_image_data'] != ""){
            $image = $request->file('cover_image');
            $destinationPath = 'upload/university-image/cover/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['cover_image'] = $imageValue;
            if ($old_data->cover_image && file_exists(public_path($old_data->cover_image))) {
                unlink(public_path($old_data->cover_image));
            }
        }

        // if(isset($data['meta_image_data']) && $data['meta_image_data'] != ""){
        //     $image = $request->file('meta_image');
        //     $destinationPath = 'upload/university-image/meta_image/';
        //     $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $imageValue);
        //     $data['meta_image'] = $imageValue;
        //     if ($old_data->meta_image && file_exists(public_path($old_data->meta_image))) {
        //         unlink(public_path($old_data->meta_image));
        //     }
        // }


        $data['country_id'] = (int)$data['country_id'];

        $updateUniversity = University::find($id);
        $updateUniversity->update($data);

        $course_ids = $request->course_id;
        $updateUniversity->courses()->sync($course_ids);

        return redirect()->route('university')->with('success','University updated successfully');
    }




    public function delete($id){
        $university = University::find($id);
        if ($university->image && file_exists(public_path($university->image))) {
            unlink(public_path($university->image));
        }
        if ($university->cover_image && file_exists(public_path($university->cover_image))) {
            unlink(public_path($university->cover_image));
        }
        if ($university->meta_image && file_exists(public_path($university->meta_image))) {
            unlink(public_path($university->meta_image));
        }
        DB::table('university_course')->where('university_id', '=', $id)->delete();
        $university->delete();
        return back()->with('success','University deleted successfully');
    }
}
