<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\CourseCategory;
use App\Models\CourseLink;

class CourseLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $course = Course::find($id);
        $course_links = CourseLink::where('course_id', $id)->get();
        return view('admin.courses.courselinks.index', compact('course','course_links'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $course = Course::find($id);
        return view('admin.courses.courselinks.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $data = $request->all();        
        $data['course_id'] = $id;        
        $data['created_by'] = "Administrator";
        $data['updated_by'] = "Administrator";

        if(CourseLink::create($data)){
            return redirect()->route('admin.links_in_course',[$id])->with('success', 'Tạo liên kết mới thành công !');
        }else{
            return redirect()->route('admin.links_in_course',[$id])->with('error', 'Tạo liên kết mới thất bại !');
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
        $link = CourseLink::find($id);
        return view('admin.courses.courselinks.edit', compact('link'));
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
        $link = CourseLink::find($id);
        $data = $request->all();
        if ($link->update($data)) {
            return redirect()->route('courses.index')->with('success', 'Chỉnh sửa liên kết thành công!');
        } else {
            return redirect()->route('courses.index')->with('error', 'Liên kết không tồn tại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id, $id)
    {
        CourseLink::find($id)->delete();
        return redirect()->route('admin.links_in_course',[$course_id])->with('success', 'Xóa liên kết cho khóa học thành công!');
    }
}
