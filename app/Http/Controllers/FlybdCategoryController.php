<?php

namespace App\Http\Controllers;
use App\Models\FlybdCategories;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class FlybdCategoryController extends Controller
{
    //


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $flybdCategories = FlybdCategories::all();
            return DataTables::of($flybdCategories)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row) {
                    return '<a href="'.route('flybds.category.edit', ['id' => $row->id]).'" class="btn btn-primary">Edit</a>
                            <form method="POST" action="'.route('flybds.category.delete', ['id' => $row->id]).'" style="display:inline;">
                                '.csrf_field().'
                                '.method_field("DELETE").'
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>';
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.flybd-category.index', ['flybdCategories' => FlybdCategories::all()]);
    }
    public function create()
    {
        return view('admin.flybd-category.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|max:100|unique:flybd_categories',
        ], [
            'title.max' => 'Your title should be less than 100 characters',
            'title.unique' => 'This title is already taken',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);


        FlybdCategories::create($data);

        return redirect()->route('flybds.categories')->with('success', 'Flybd Category created successfully');
    }
    public function edit($id)
{
    $category = FlybdCategories::findOrFail($id);
    return view('admin.flybd-category.edit', compact('category'));
}

public function update(Request $request, $id){
    $this->validate($request, [
        'title' => 'required|max:100|unique:categories,title,'.$id,
    ], [
        'title.max' => 'your title should be less than 100 characters',
        'title.unique' => 'this title is already taken',
    ]);
    $data = $request->all();
    $category = FlybdCategories::find($id);
    $category->update($data);

    return redirect()->route('flybds.categories')->with('success', 'Flybd Category updated successfully');
}

public function delete($id){
    FlybdCategories::find($id)->delete();
    return back()->with('success','FlybdCategories deleted successfully');
}


}
