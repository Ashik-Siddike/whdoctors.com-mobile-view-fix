<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AgentController extends Controller
{

    function __construct(){
        $this->middleware('permission:agent-list|agent-create|agent-edit|agent-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:agent-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:agent-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:agent-delete', ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application|JsonResponse
     * @throws
     * @internal
     * @param \Illuminate\Contracts\
     * \Illuminate\Contracts\
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $agents = Agent::get()->all();
            return DataTables::of($agents)
                ->addIndexColumn()
                ->addColumn('commission_rate', function($row){
                    if($row->commission_rate == null){
                        return 'N/A';
                    }else{
                        return $row->commission_rate . '%';
                    }
                })
                ->addColumn('action-btn', function($row){
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.agents.index');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    public function create()
    {
        return view('admin.agents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required | unique:agents',
            'email' => 'required | unique:agents',
            'n_id' => 'required | unique:agents',
            'address' => 'required',
        ],[
            'name.required' => 'Name is required',
            'phone.required' => 'Phone is required',
            'phone.unique' => 'Phone is already taken',
            'email.required' => 'Email is required',
            'email.unique' => 'Email is already taken',
            'n_id.required' => 'NID is required',
            'n_id.unique' => 'NID is already taken',
            'address.required' => 'Address is required',
        ]);

        $data = $request->all();



        if($data['image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/agent/profile/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }



        if($data['id_card_front_image_data'] != "") {
            $image = $request->file('id_card_front_image');
            $destinationPath = 'upload/agent/id-card-front/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['id_card_front_image'] = $imageValue;
        }

        if($data['id_card_back_image_data'] != "") {
            $image = $request->file('id_card_back_image');
            $destinationPath = 'upload/agent/id-card-back/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['id_card_back_image'] = $imageValue;
        }

        Agent::create($data);
        return redirect()->route('agent')->with('success', 'Agent created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $agent = Agent::find($id);
        return view('admin.agents.edit', [
            'agent' => $agent,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $agent = Agent::find($id);
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required | unique:agents,phone,'.$id,
            'email' => 'required | unique:agents,email,'.$id,
            'n_id' => 'required | unique:agents,n_id,'.$id,
            'address' => 'required',
        ],[
            'name.required' => 'Name is required',
            'phone.required' => 'Phone is required',
            'phone.unique' => 'Phone is already taken',
            'email.required' => 'Email is required',
            'email.unique' => 'Email is already taken',
            'n_id.required' => 'NID is required',
            'n_id.unique' => 'NID is already taken',
            'address.required' => 'Address is required',
        ]);

        $data = $request->all();

        if($data['image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/agent/profile/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
            if($agent->image != null && file_exists($agent->image)){
                unlink(public_path($agent->image));
            }
        }

        if($data['id_card_front_image_data'] != "") {
            $image = $request->file('id_card_front_image');
            $destinationPath = 'upload/agent/id-card-front/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['id_card_front_image'] = $imageValue;
            if($agent->id_card_front_image != null && file_exists($agent->id_card_front_image)){
                unlink(public_path($agent->id_card_front_image));
            }
        }

        if($data['id_card_back_image_data'] != "") {
            $image = $request->file('id_card_back_image');
            $destinationPath = 'upload/agent/id-card-back/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['id_card_back_image'] = $imageValue;
            if($agent->id_card_back_image != null && file_exists($agent->id_card_back_image)){
                unlink(public_path($agent->id_card_back_image));
            }
        }
        $agent->update($data);
        return redirect()->route('agent')->with('success', 'Agent updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $agent = Agent::find($id);
        if($agent->image != null && file_exists($agent->image)){
            unlink(public_path($agent->image));
        }
        if($agent->id_card_front_image != null && file_exists($agent->id_card_front_image)){
            unlink(public_path($agent->id_card_front_image));
        }
        if($agent->id_card_back_image != null && file_exists($agent->id_card_back_image)){
            unlink(public_path($agent->id_card_back_image));
        }
        $agent->delete();
        return redirect()->route('agent')->with('success', 'Agent deleted successfully.');
    }
}
