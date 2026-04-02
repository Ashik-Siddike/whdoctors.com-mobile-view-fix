<?php

namespace App\Http\Controllers;

use App\Models\Flybd;
use App\Models\FlybdCategories;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class FlybdController extends Controller
{


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $flybds = Flybd::get()->all();
            return DataTables::of($flybds)
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
        return view('admin.flybd.index', ['flybds' => Flybd::all()]);
    }




    public function create(){
        return view('admin.flybd.create',[
            'flybds' => FlybdCategories::all(),
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'flybd_category_id' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
        ],[
            'flybd_category_id.required' => 'Please select a flybd',
            'title.required' => 'Please add title',
            'subtitle.required' => 'Please add subtitle',
            'description.required' => 'Please add description',
        ]);
        $data = $request->all();
        Flybd::create($data);
        return redirect()->route('flybds')->with('success', 'Service created successfully');
    }
    public function edit($id){
        return view('admin.flybd.edit', [
            'flybd' => Flybd::find($id),
            'flybds' => FlybdCategories::all(),
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'flybd_category_id' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
        ], [
            'flybd_category_id.required' => 'Please select a category',
            'title.required' => 'Please add title',
            'subtitle.required' => 'Please add subtitle',
            'description.required' => 'Please add description',
        ]);

        $flybds = Flybd::findOrFail($id);

        $flybds->update([
            'flybd_category_id' => $request->flybd_category_id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
        ]);

        return redirect()->route('flybds')->with('success', 'Flybd updated successfully');
    }


    public function delete($id){
        $flybds = Flybd::find($id);
        $flybds->delete();
        return redirect()->route('flybds')->with('success', 'flybds deleted successfully');
    }
}
