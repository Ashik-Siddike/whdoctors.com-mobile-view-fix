<?php

namespace App\Http\Controllers;
use App\Models\Countries;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CountriesController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $countries = Countries::get()->all();
            return DataTables::of($countries)
                ->addIndexColumn()
                // ->addColumn('action-btn', function($row) {
                //     return $row->id;
                // })
                // ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.countries.index');
    }
}
