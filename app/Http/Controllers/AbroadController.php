<?php

namespace App\Http\Controllers;

use App\Models\AbroadLiving;
use App\Models\AbroadLivingCategory;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class AbroadController extends Controller
{



    public function index(Request $request)
    {
        if ($request->ajax()) {
            $abroads = AbroadLiving::get()->all();
            return DataTables::of($abroads)
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
        return view('admin.abroad-living.index', ['abroads' => AbroadLiving::all()]);
    }




    public function create(){
        return view('admin.abroad-living.create',[
            'abroads' => AbroadLivingCategory::all(),
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'abroad_category_id' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
        ],[
            'abroad_category_id.required' => 'Please select a abroads',
            'title.required' => 'Please add title',
            'subtitle.required' => 'Please add subtitle',
            'description.required' => 'Please add description',
        ]);
        $data = $request->all();
        AbroadLiving::create($data);
        return redirect()->route('abroad.index')->with('success', 'Service created successfully');
    }
    public function edit($id)
    {
        $abroad = AbroadLiving::find($id);

        if (!$abroad) {
            return redirect()->route('abroad-living.index')->with('error', 'Abroad living not found');
        }

        return view('admin.abroad-living.edit', [
            'abroad' => $abroad,

            'abroadsCategory' => AbroadLivingCategory::all(), // Categories for the dropdown
        ]);
    }




    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'abroad_category_id' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
        ], [
            'abroad_category_id.required' => 'Please select a category',
            'title.required' => 'Please add title',
            'subtitle.required' => 'Please add subtitle',
            'description.required' => 'Please add description',
        ]);

        $abroads = AbroadLiving::findOrFail($id);

        $abroads->update([
            'abroad_category_id' => $request->abroad_category_id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
        ]);

        return redirect()->route('abroad.index')->with('success', 'abroad.index updated successfully');
    }


    public function delete($id){
        $abroads = AbroadLiving::find($id);
        $abroads->delete();
        return redirect()->route('abroad.index')->with('success', 'abroad.index deleted successfully');
    }
}
