<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class CourseController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:course-list|course-create|course-edit|course-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:course-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:course-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:course-delete', ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $courses = Course::get()->all();
            return DataTables::of($courses)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.courses.index', ['courses' => Course::all()]);
    }

    public function create()
    {
        return view('admin.courses.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100|unique:courses',
        ], [
            'name.max' => 'your course name should be less than 100 characters',
            'name.unique' => 'this course name is already taken',
            'name.required' => 'course name is required',
        ]);
        Course::create($request->all());
        return redirect()->route('course')->with('success', 'Course created successfully.');
    }
    public function edit($id)
    {
        $course = Course::find($id);
        return view('admin.courses.edit', ['course' => $course]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100|unique:courses',
        ], [
            'name.max' => 'your course name should be less than 100 characters',
            'name.unique' => 'this course name is already taken',
            'name.required' => 'course name is required',
        ]);
        $old_course = Course::find($id);
        $old_course->update($request->all());
        return redirect()->route('course')->with('success', 'Course updated successfully');
    }

    public function delete($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->route('course')->with('success', 'Course deleted successfully');
    }
}
