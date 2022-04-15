<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $roles = Role::where('delete_flag', 0)->paginate(10);
        if($request->has('keysearch')){
            if($request->keysearch == ""){
                return redirect()->route('roles.index')->with('error', 'Vui lòng điền từ khóa cần tìm kiếm !');
            }
            $roles = Role::where('name', 'like', '%'.$request->keysearch.'%')->where('delete_flag', 0)->paginate(10);
            if($roles){
                return view('admin.roles.index', compact('roles'));
            }else{
                return redirect()->route('roles.index')->with('error', 'Không có quyền tương tự !');
            }
        }else{
            return view('admin.roles.index', compact('roles'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Role::create([
            'name' => $request->name,
            'created_by' => 'Administrator',
            'updated_by' => 'Administrator',
            'delete_flag' => false,
        ]);
        return redirect()->route('roles.index')->with('success', 'Tạo Quyền thành công !');
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
        $role = Role::find($id);
        return view('admin.roles.edit', compact('role'));
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
        $role = Role::find($id);
        if ($role) {
            $role->name = $request->name;
            $role->save();
            return redirect()->route('roles.index')->with('success', 'Cập nhật quyền thành công!');
        } else {
            return redirect()->route('roles.index')->with('error', 'Quyền không tồn tại!');
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
        $role = Role::find($id);
        $role->delete_flag = true;
        $role->save();
        return redirect()->back()->with('success', 'Xóa quyền thành công!');
    }
}
