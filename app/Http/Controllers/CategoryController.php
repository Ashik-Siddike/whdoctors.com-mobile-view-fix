<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class CategoryController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','store']]);
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-delete', ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::get()->all();
            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.categories.index',['categories'=>Category::all()]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|max:100|unique:categories',
        ], [
            'title.max' => 'your title should be less than 100 characters',
            'title.unique' => 'this title is already taken',
        ]);
        $data = $request->all();

        Category::create($data);
        return redirect()->route('categories')->with('success','Category created successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.categories.edit',['category'=>$category]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|max:100|unique:categories,title,'.$id,
        ], [
            'title.max' => 'your title should be less than 100 characters',
            'title.unique' => 'this title is already taken',
        ]);
        $data = $request->all();
        $category = Category::find($id);
        $category->update($data);
        return redirect()->route('categories')->with('success','Category updated successfully');
    }

    public function delete($id){
        Category::find($id)->delete();
        return back()->with('success','Category deleted successfully');
    }
}
