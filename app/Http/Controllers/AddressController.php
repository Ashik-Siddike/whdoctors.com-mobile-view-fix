<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class AddressController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:address-list|address-create|address-edit|address-delete', ['only' => ['index','store']]);
         $this->middleware('permission:address-create', ['only' => ['create','store']]);
         $this->middleware('permission:address-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:address-delete', ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $addresses = Address::get()->all();
            return DataTables::of($addresses)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.address.index', ['addresses' => Address::all()]);
    }

    public function create()
    {
        return view('admin.address.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|max:100',
            'full_address' => 'required',
            'phone' => 'required|max:100',
            'email' => 'required|max:100',
            'working_hour' => 'required|max:100',
        ], [
            'text.required' => 'Text is required',
            'text.max' => 'Text must be less than 100 characters',
            'full_address.required' => 'Full Address is required',
            'phone.required' => 'Phone is required',
            'phone.max' => 'Phone must be less than 100 characters',
            'email.required' => 'Email is required',
            'email.max' => 'Email must be less than 100 characters',
            'working_hour.required' => 'Working Hour is required',
            'working_hour.max' => 'Working Hour must be less than 100 characters',
        ]);
        $data = $request->all();


        if($request->has('is_show_on_navbar')){

            $data['is_show_on_navbar'] = 1;

            $allAddress = Address::all();
            foreach($allAddress as $address){

                if($address->is_show_on_navbar == 1){
                    $address->is_show_on_navbar = 0;
                    $address->save();
                }
            }
        }else{
            $data['is_show_on_navbar'] = 0;
        }

        Address::create($data);
        return redirect()->route('address')->with('success', 'Address created successfully');
    }

    public function edit($id)
    {
        return view('admin.address.edit', ['address' => Address::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'text' => 'required|max:100',
            'full_address' => 'required',
            'phone' => 'required|max:100',
            'email' => 'required|max:100',
            'working_hour' => 'required|max:100',
        ], [
            'text.required' => 'Text is required',
            'text.max' => 'Text must be less than 100 characters',
            'full_address.required' => 'Full Address is required',
            'phone.required' => 'Phone is required',
            'phone.max' => 'Phone must be less than 100 characters',
            'email.required' => 'Email is required',
            'email.max' => 'Email must be less than 100 characters',
            'working_hour.required' => 'Working Hour is required',
            'working_hour.max' => 'Working Hour must be less than 100 characters',
        ]);
        $data = $request->all();

        if($request->has('is_show_on_navbar')){
            $data['is_show_on_navbar'] = 1;

            $allAddress = Address::all();
            foreach($allAddress as $address){
                if($address->is_show_on_navbar == 1){
                    $address->is_show_on_navbar = 0;
                    $address->save();
                }
            }

        }else{
            $data['is_show_on_navbar'] = 0;
        }
        Address::find($id)->update($data);
        return redirect()->route('address')->with('success', 'Address updated successfully');
    }

    public function delete($id)
    {
        Address::find($id)->delete();
        return back()->with('success', 'Address deleted successfully');
    }
}
