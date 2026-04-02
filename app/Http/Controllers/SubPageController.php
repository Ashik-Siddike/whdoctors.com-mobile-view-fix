<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\SubPage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubPageController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:subpage-list|subpage-create|subpage-edit|subpage-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:subpage-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:subpage-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:subpage-delete', ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $subpage = SubPage::get()->all();
            return DataTables::of($subpage)
                ->addIndexColumn()
                ->addColumn('page', function($row) {
                    return $row->page->title;
                })
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.sub-pages.index');
    }

    public function create()
    {
        $pages = Page::whereNotIn('title', ['Common', 'Service'])->get();
        return view('admin.sub-pages.create',['pages' => $pages]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'page_id' => 'required',
            'content' => 'required',
        ]);
        $data = $request->all();
        SubPage::create($data);

        return redirect()->route('subpage')->with('success','SubPage created successfully.');
    }

    public function edit($id)
    {
        return view('admin.sub-pages.edit',[
            'subpage' => SubPage::find($id),
            'pages' => Page::whereNotIn('title', ['Common', 'Service'])->get()
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        SubPage::find($id)->update($data);

        return redirect()->route('subpage')->with('success','SubPage updated successfully.');
    }

    public function delete($id){
        $subpage = SubPage::find($id);
        $subpage->delete();
        return redirect()->route('subpage')->with('success','SubPage deleted successfully.');
    }
}
