<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class BlogCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:blog-category-list|blog-category-create|blog-category-edit|blog-category-delete', ['only' => ['index','store']]);
        $this->middleware('permission:blog-category-create', ['only' => ['create','store']]);
        $this->middleware('permission:blog-category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:blog-category-delete', ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = BlogCategory::get()->all();
            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.blog-categories.index',['categories'=>BlogCategory::all()]);
    }

    public function create()
    {
        return view('admin.blog-categories.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|max:100|unique:blog_categories',
        ], [
            'title.max' => 'your title should be less than 100 characters',
            'title.unique' => 'this title is already taken',
        ]);
        $data = $request->all();

        BlogCategory::create($data);
        return redirect()->route('blog.categories')->with('success','Category created successfully');
    }

    public function edit($id){
        $category = BlogCategory::find($id);
        return view('admin.blog-categories.edit',['category'=>$category]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|max:100|unique:blog_categories,title,'.$id,
        ], [
            'title.max' => 'your title should be less than 100 characters',
            'title.unique' => 'this title is already taken',
        ]);
        $data = $request->all();
        $category = BlogCategory::find($id);
        $category->update($data);
        return redirect()->route('blog.categories')->with('success','Category updated successfully');
    }

    public function delete($id){
        BlogCategory::find($id)->delete();
        return back()->with('success','Category deleted successfully');
    }
}
