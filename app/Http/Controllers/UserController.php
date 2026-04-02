<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['delete']]);
    }
    public function index(Request $request){
        if ($request->ajax()) {
            $auth_user = Auth::user();
            if ($auth_user->hasRole('superadmin')) {
                $users = User::get()->all();
            } else {
                // $users = User::whereHas('roles', function ($query) {
                //     return $query->where('name','!=', 'superadmin');
                // })->get()->all();
                $users = User::where('name','!=', 'superadmin')->get()->all();
            }
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('active-btn', function($row) {
                    return ['id' => $row->id, 'status' => $row->is_active];
                })
                ->addColumn('show-home-btn', function($row) {
                    return ['id' => $row->id, 'status' => $row->is_show_home];
                })
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.users.index');
    }



    public function changeStatus(Request $request)
    {
        $data = User::find($request->id);
        $data->is_active = $request->status;
        $data->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
    public function change_show_home(Request $request)
    {
        $data = User::find($request->id);
        $data->is_show_home = $request->status;
        $data->save();

        return response()->json(['success'=>'Status change successfully.']);
    }


    public function create(){
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.create',['roles'=>$roles]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:40',
            'email' => 'required|max:100|unique:users',
            'phone_no' => 'max:100|unique:users',
            'designation' => 'max:100',
            'password' => [
                'required', 'string', 'min:8',
                // 'regex:/[a-z]/',
                // 'regex:/[A-Z]/',
                // 'regex:/[0-9]/',
                'confirmed',
            ],
        ], [
            'name.required' => 'your name is required',
            'name.max' => 'your name should be less than 40 characters',
            'email.required' => 'your email is required',
            'email.max' =>  'your email should be less than 100 characters',
            'email.unique' =>  'your email should be unique',
            'phone_no.max' =>  'your mobile should be less than 100 characters',
            'phone_no.unique' =>  'your mobile should be unique',
            'designation.max' =>  'your designation should be less than 100 characters',
            'password.required' => 'your password is required',
            'password.min' =>  'your password should be at least 8 characters',
            'password.regex' =>  'password must contain at least one uppercase letter, one lowercase letter, and one number',

        ]);
        $data = $request->all();

        $data['password'] = bcrypt($request->password);

        $data['type'] = 'image';
        if($data['cover_image_data'] != "") {
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            ], [
                'image.image' => 'image is not valid',
                'image.mimes' => 'image type not supported',
                'image.max' => 'image size should be less than 2MB',
            ]);
            $image = $request->file('image');
            $destinationPath = 'upload/user-image/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }

        // check is_employee is checked or not
        if (isset($data['is_employee'])) {
            $data['is_employee'] = 1;
        } else {
            $data['is_employee'] = 0;
        }


        $user = User::create($data);
        // if(isset($request->input('roles'))){
        //     $role = $request->input('roles');
        // }else{
        //     $role = 'user';
        // }
        $user->assignRole($request->input('roles'));


        return redirect()->route('users')->with('success','User created successfully');


    }
public function edit($id){
    $auth_user = Auth::user();
    $user = User::findOrFail($id);
    if ($user->hasRole('superadmin') && $auth_user->id != $user->id) {
        return redirect()->route('users');
    }
    $roles = Role::pluck('name','name')->all();
    $userRole = $user->roles->pluck('name','name')->all();

    return view('admin.users.edit', [
        'user'=> $user,
        'roles' => $roles,
        'userRole' => $userRole,
    ]);
}



    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:40',
            'email' => 'required|max:100|unique:users,email,'.$id,
            'phone_no' => 'max:100|unique:users,phone_no,'.$id,
            'designation' => 'max:100',
        ], [
            'name.required' => 'your name is required',
            'name.max' => 'your name should be less than 40 characters',
            'email.required' => 'your email is required',
            'email.max' =>  'your email should be less than 100 characters',
            'email.unique' =>  'your email should be unique',
            'phone_no.max' =>  'your mobile should be less than 100 characters',
            'phone_no.unique' =>  'your mobile should be unique',
            'designation.max' =>  'your designation should be less than 100 characters',
        ]);
        $data = $request->all();
        $old_data = User::find($id);
        if($data['cover_image_data'] != ""){
            $image = $request->file('image');
            $destinationPath = 'upload/user-image/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
            if($old_data->image){
                if (file_exists(public_path($old_data->image))) {
                    unlink(public_path($old_data->image));
                }
            }
        }
        if (!empty($request->password) && (isset($request->password))) {
            $this->validate($request, [
                'password' => [
                    'min:8',
                    // 'regex:/[a-z]/',
                    // 'regex:/[A-Z]/',
                    // 'regex:/[0-9]/',
                    'confirmed',
                ],
            ], [
                'password.min' =>  'min char 8',
                'password.regex' =>  'password must contain at least one uppercase letter, one lowercase letter, and one number',
            ]);
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $old_data->password;
        }

        if (isset($data['is_employee'])) {
            $data['is_employee'] = 1;
        } else {
            $data['is_employee'] = 0;
        }

        $old_data->update($data);

        return redirect()->route('users')->with('success','User updated successfully');
    }

    public function delete($id){
        $auth_user = Auth::user();
        $old_data = User::findorfail($id);
        if ($old_data->hasRole('superadmin') && $auth_user->id != $old_data->id) {
            return redirect()->route('users');
        }
        if (file_exists(public_path($old_data->image)) && $old_data->image) {
            unlink(public_path($old_data->image));
        }
        User::find($id)->delete();
        return redirect()->route('users')->with('success','User deleted successfully');
    }




    public function employee(Request $request){
        if ($request->ajax()) {
            $auth_user = Auth::user();
            if ($auth_user->hasRole('superadmin')) {
                $users = User::where('is_employee', 1)->get();
            } else {
                $users = User::where('is_employee', 1)->get()->all();
            }
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('active-btn', function($row) {
                    return ['id' => $row->id, 'status' => $row->is_active];
                })
                ->addColumn('show-home-btn', function($row) {
                    return ['id' => $row->id, 'status' => $row->is_show_home];
                })
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.users.employee');
    }

    public function employeeCreate(){
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.employee-create',['roles'=>$roles]);
    }


    public function employeeStore(Request $request){
        $this->validate($request, [
            'name' => 'required|max:40',
            'email' => 'required|max:100|unique:users',
            'phone_no' => 'max:100|unique:users',
            'designation' => 'max:100',
            'password' => [
                'required', 'string', 'min:6',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'confirmed',
            ],
        ], [
            'name.required' => 'your name is required',
            'name.max' => 'your name should be less than 40 characters',
            'email.required' => 'your email is required',
            'email.max' =>  'your email should be less than 100 characters',
            'email.unique' =>  'your email should be unique',
            'phone_no.max' =>  'your mobile should be less than 100 characters',
            'phone_no.unique' =>  'your mobile should be unique',
            'designation.max' =>  'your designation should be less than 100 characters',
            'password.required' => 'your password is required',
            'password.min' =>  'your password should be at least 8 characters',
            'password.regex' =>  'password must contain at least one uppercase letter, one lowercase letter, and one number',

        ]);
        $data = $request->all();

        $data['password'] = bcrypt($request->password);

        if($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/user-image/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }

        if (isset($data['is_employee'])) {
            $data['is_employee'] = 1;
        } else {
            $data['is_employee'] = 0;
        }


        $user = User::create($data);
        $user->assignRole($request->input('roles'));
        return redirect()->route('employee')->with('success','Employee created successfully');


    }


    public function employeeEdit($id){
        $auth_user = Auth::user();
        $user = User::findorfail($id);
        if ($user->hasRole('superadmin') && $auth_user->id != $user->id) {
            return redirect()->route('employee');
        }
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('admin.users.employee-edit',[
            'user'=> $user,
            'roles' => $roles,
            'userRole' => $userRole,
        ]);
    }

    public function employeeUpdate(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:40',
            'email' => 'required|max:100|unique:users,email,'.$id,
            'phone_no' => 'max:100|unique:users,phone_no,'.$id,
            'designation' => 'max:100',
        ], [
            'name.required' => 'your name is required',
            'name.max' => 'your name should be less than 40 characters',
            'email.required' => 'your email is required',
            'email.max' =>  'your email should be less than 100 characters',
            'email.unique' =>  'your email should be unique',
            'phone_no.max' =>  'your mobile should be less than 100 characters',
            'phone_no.unique' =>  'your mobile should be unique',
            'designation.max' =>  'your designation should be less than 100 characters',
        ]);
        $data = $request->all();
        $old_data = User::find($id);
        if($data['cover_image_data'] != ""){
            $image = $request->file('image');
            $destinationPath = 'upload/user-image/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
            if($old_data->image){
                if (file_exists(public_path($old_data->image))) {
                    unlink(public_path($old_data->image));
                }
            }
        }
        if (!empty($request->password) && (isset($request->password))) {
            $this->validate($request, [
                'password' => [
                    'min:6',
                    'regex:/[a-z]/',
                    'regex:/[A-Z]/',
                    'confirmed',
                ],
            ], [
                'password.min' =>  'min char 8',
                'password.regex' =>  'password must contain at least one uppercase letter, one lowercase letter, and one number',
            ]);
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $old_data->password;
        }

        if (isset($data['is_employee'])) {
            $data['is_employee'] = 1;
        } else {
            $data['is_employee'] = 0;
        }

        $old_data->update($data);

        return redirect()->route('employee')->with('success','Employee updated successfully');

    }


    public function employeeDelete($id){
        $auth_user = Auth::user();
        $old_data = User::findorfail($id);
        if ($old_data->hasRole('superadmin') && $auth_user->id != $old_data->id) {
            return redirect()->route('users');
        }
        if (file_exists(public_path($old_data->image)) && $old_data->image) {
            unlink(public_path($old_data->image));
        }
        User::find($id)->delete();
        return redirect()->route('employee')->with('success','Employee deleted successfully');
    }
}
