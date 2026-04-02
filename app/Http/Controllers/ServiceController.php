<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables; 

class ServiceController extends Controller
{
    public function __construct()
    {
        // Service Middleware
        $this->middleware('permission:service-list|service-create|service-edit|service-delete', ['only' => ['index','store']]);
        $this->middleware('permission:service-create', ['only' => ['create','store']]);
        $this->middleware('permission:service-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:service-delete', ['only' => ['delete']]);
    
   
    }
     
    public function index(Request $request){
        if ($request->ajax()) {
            $services = Service::get()->all();
            return DataTables::of($services)
                ->addIndexColumn()
                ->addColumn('category', function($row) {
                    return $row->category->title;
                })
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.services.index', ['services' => Service::all()]);
    }

    public function create(){
        return view('admin.services.create',[
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'category_id' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
        ],[
            'category_id.required' => 'Please select a category',
            'title.required' => 'Please add title',
            'subtitle.required' => 'Please add subtitle',
            'description.required' => 'Please add description',
        ]);
        $data = $request->all();
        Service::create($data);
        return redirect()->route('services')->with('success', 'Service created successfully');
    }

    public function edit($id){
        return view('admin.services.edit',[
            'service' => Service::find($id),
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'category_id' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
        ],[
            'category_id.required' => 'Please select a category',
            'title.required' => 'Please add title',
            'subtitle.required' => 'Please add subtitle',
            'description.required' => 'Please add description',
        ]);
        $data = $request->all();
        $service = Service::find($id);
        $service->update($data);
        return redirect()->route('services')->with('success', 'Service updated successfully');
    }

    public function delete($id){
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('services')->with('success', 'Service deleted successfully');
    }
}


