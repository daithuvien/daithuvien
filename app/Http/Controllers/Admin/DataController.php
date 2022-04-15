<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data;
use Illuminate\Support\Str;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Data::where('delete_flag', 0)->orderBy('created_at', 'DESC')->paginate(50);
        return view('admin.data.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData($request);
        $data = $request->all();
        
        $data['created_by'] = "Administrator";
        $data['updated_by'] = "Administrator";
        $data['delete_flag'] = false;
        Data::create($data);

        return redirect()->route('data.index')->with('success', 'Tạo dữ liệu thành công!');
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
        $data = Data::find($id);
        return view('admin.data.edit', compact('data'));
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
        $this->validateData($request);
        $data = Data::find($id);
        $d = $request->all();
        
        if($data->update($d)){
            return redirect()->route('data.index')->with('success', 'Cập nhật dữ liệu thành công!');
        }else{
            return redirect()->route('data.index')->with('error', 'Cập nhật dữ liệu thất bại!');
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
        $data = Data::find($id);
        $data->delete_flag = true;
        $data->save();
        return redirect()->back()->with('success', 'Xóa dữ liệu thành công!');
    }

    public function validateData(Request $request)
    {
        return $this->validate($request, [
            'url' => 'required'
        ]);
    }
}
