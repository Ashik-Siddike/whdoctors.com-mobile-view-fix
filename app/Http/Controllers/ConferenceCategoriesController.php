<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConferenceCategories;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use App\Models\Conference;

class ConferenceCategoriesController extends Controller
{
    //




    public function index(Request $request)
    {
        if ($request->ajax()) {
            $conferenceCategories = ConferenceCategories::all();
            return DataTables::of($conferenceCategories)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row) {
                    return '<a href="'.route('conference.category.edit', ['id' => $row->id]).'" class="btn btn-primary">Edit</a>
                            <form method="POST" action="'.route('conference.category.delete', ['id' => $row->id]).'" style="display:inline;">
                                '.csrf_field().'
                                '.method_field("DELETE").'
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>';
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.conferenceCategories.index', ['conferenceCategories' => ConferenceCategories::all()]);
    }
    public function create()
    {
        return view('admin.conferenceCategories.create');
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


        ConferenceCategories::create($data);

        return redirect()->route('conference.categories')->with('success', 'Flybd Category created successfully');
    }
    public function edit($id)
{
    $category = ConferenceCategories::findOrFail($id);
    return view('admin.conferenceCategories.edit', compact('category'));
}

public function update(Request $request, $id){
    $this->validate($request, [
        'title' => 'required|max:100|unique:categories,title,'.$id,
    ], [
        'title.max' => 'your title should be less than 100 characters',
        'title.unique' => 'this title is already taken',
    ]);
    $data = $request->all();
    $category = ConferenceCategories::find($id);
    $category->update($data);

    return redirect()->route('conference.categories')->with('success', 'Flybd Category updated successfully');
}

public function delete($id){
    ConferenceCategories::find($id)->delete();
    return back()->with('success','ConferenceCategories deleted successfully');
}
}
