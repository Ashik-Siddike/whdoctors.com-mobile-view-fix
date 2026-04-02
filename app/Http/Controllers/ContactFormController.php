<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class ContactFormController extends Controller
{
    function __construct(){
        $this->middleware('permission:contact-list|contact-delete', ['only' => ['index']]);
        $this->middleware('permission:contact-delete', ['only' => ['delete']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $contactForms = ContactForm::get()->all();
            return DataTables::of($contactForms)
                ->addIndexColumn()
                ->addColumn('important_status', function($row){
                    return ['id' => $row->id, 'important_status' => $row->important_status];
                })
                ->addColumn('action-btn', function($row){
                    return ['id' => $row->id, 'read_status' => $row->read_status];
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.contact-messages.index', ['contactForms' => ContactForm::all()]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'phone' => 'required|max:100',
            'message' => 'required',
        ], [
            'name.max' => 'your name should be less than 100 characters',
            'phone.max' => 'your phone should be less than 100 characters',
            'message' => 'Message field is required'
        ]);

        $data = $request->all();
        ContactForm::create($data);

        return redirect()->back()->with('success','Message sent successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $contactForm = ContactForm::find($id);
        $contactForm->delete();
        return redirect()->back()->with('success','Message deleted successfully');
    }


    function read(Request $request){
        $contactForm = ContactForm::find($request->id);
        $contactForm->read_status = 1;
        $contactForm->save();
        return response()->json(['success' => 'Message read successfully']);
    }


    function important(Request $request){
        $contactForm = ContactForm::find($request->id);
        $contactForm->important_status = $request->important_status;
        $contactForm->save();
        return response()->json([
            'success' => 'Message marked as important',
            'important_status' => $request->important_status
        ]);
    }
}
