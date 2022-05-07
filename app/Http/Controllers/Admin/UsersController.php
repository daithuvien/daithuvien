<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('delete_flag', 0)->get();
        $roles = Role::where('delete_flag', 0)->get();        
        return view('admin.users.index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('delete_flag', 0)->get();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['role_id'] = $request->role;
        $data['created_by'] = "Administrator";
        $data['updated_by'] = "Administrator";
        $data['password'] = Hash::make($data['password']);
        $data['ip_address'] = $request->ip();
        $data['delete_flag'] = false;
        if(User::create($data)){
            return redirect()->route('users.index')->with('success', 'Tạo thành viên thành công !');
        }else{
            return redirect()->route('users.index')->with('error', 'Tạo thành viên thất bại !');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::where('delete_flag', 0)->get();
        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();
        $data['role_id'] = $request->role;
        if ($user->update($data)) {
            return redirect()->route('users.index')->with('success', 'Cập nhật thành viên thành công!');
        } else {
            return redirect()->route('users.index')->with('error', 'Thành viên không tồn tại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete_flag = true;
        $user->save();
        return redirect()->back()->with('success', 'Xóa thành viên thành công!');
    }
}
