<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;
use App\Models\ConferenceCategories;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ConferenceController extends Controller
{


        public function index(Request $request)
        {
            if ($request->ajax()) {
                $conferences = Conference::get()->all();
                return DataTables::of($conferences)
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
            return view('admin.conference.index', ['conferences' => Conference::all()]);
        }




        public function create(){
            return view('admin.conference.create',[
                'conferences' => ConferenceCategories::all(),
            ]);
        }

        public function store(Request $request){
            $this->validate($request,[
                'conference_category_id' => 'required',
                'title' => 'required',
                'subtitle' => 'required',
                'description' => 'required',
            ],[
                'conference_category_id.required' => 'Please select a conference',
                'title.required' => 'Please add title',
                'subtitle.required' => 'Please add subtitle',
                'description.required' => 'Please add description',
            ]);
            $data = $request->all();
            Conference::create($data);
            return redirect()->route('conferences')->with('success', 'Service created successfully');
        }
        public function edit($id){
            return view('admin.conference.edit', [
                'conference' => Conference::find($id),
                'conferences' => ConferenceCategories::all(),
            ]);
        }


        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'conference_category_id' => 'required',
                'title' => 'required',
                'subtitle' => 'required',
                'description' => 'required',
            ], [
                'conference_category_id.required' => 'Please select a category',
                'title.required' => 'Please add title',
                'subtitle.required' => 'Please add subtitle',
                'description.required' => 'Please add description',
            ]);

            $conferences = Conference::findOrFail($id);

            $conferences->update([
                'conference_category_id' => $request->conference_category_id,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'description' => $request->description,
            ]);

            return redirect()->route('conferences')->with('success', 'conference updated successfully');
        }


        public function delete($id){
            $conferences = Conference::find($id);
            $conferences->delete();
            return redirect()->route('conferences')->with('success', 'conferences deleted successfully');
        }


}
