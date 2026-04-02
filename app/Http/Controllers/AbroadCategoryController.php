<?php

namespace App\Http\Controllers;
use App\Models\AbroadLivingCategory;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class AbroadCategoryController extends Controller
{




    public function index(Request $request)
    {
        if ($request->ajax()) {
            $abroadLivingCategorys = AbroadLivingCategory::get()->all();
            return DataTables::of($abroadLivingCategorys)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.aborad-living-Cotegories.index',['abroadLivingCategorys'=>AbroadLivingCategory::all()]);
    }


    public function create()
    {
        return view('admin.aborad-living-Cotegories.create');
    }



    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|max:100|unique:abroad_living_categories',
        ], [
            'title.max' => 'Your title should be less than 100 characters',
            'title.unique' => 'This title is already taken',
        ]);

        // Data Processing
        $data = $request->all();
        $data['slug'] = Str::slug($request->title); // Auto-generate slug

        // Insert into Database
        AbroadLivingCategory::create($data);

        return redirect()->route('abroad.categories')->with('success', 'Abroad Category created successfully');
    }

    public function edit($id)
    {
        $category = AbroadLivingCategory::findOrFail($id);
        return view('admin.aborad-living-Cotegories.edit', compact('category'));
    }

public function update(Request $request, $id){
    $this->validate($request, [
        'title' => 'required|max:100|unique:categories,title,'.$id,
    ], [
        'title.max' => 'your title should be less than 100 characters',
        'title.unique' => 'this title is already taken',
    ]);
    $data = $request->all();
    $category = AbroadLivingCategory::find($id);
    $category->update($data);

    return redirect()->route('abroad.categories')->with('success', 'abroad Category updated successfully');
}


public function delete($id){
    AbroadLivingCategory::find($id)->delete();
    return back()->with('success','AbroadLivingCategory deleted successfully');
}

// public function delete($id)
// {
//     $category = AbroadLivingCategory::find($id);
//     if ($category) {
//         $category->delete();
//         return response()->json(['message' => 'Category deleted successfully']);
//     } else {
//         return response()->json(['message' => 'Category not found'], 404);
//     }
// }




}
