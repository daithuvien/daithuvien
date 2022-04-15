<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::where('delete_flag', 0)->get();        
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->has('parent_id')){
            if($request->parent_id != null){
                $parent_category = Category::where('id', $request->parent_id)->first();
            }else{
                return redirect()->route('categories.index')->with('error', 'Danh mục cha không hợp lệ !');
            }
        }else{
            $parent_category = 0;
        }
        $categories = Category::where('delete_flag', 0)->get();
        return view('admin.categories.create', compact('categories','parent_category'));
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
        $slug = str::slug($request->name, "-");
        if($slug){
            $slug_check = Category::where('slug', $slug)->first();
            if($slug_check){
                return redirect()->route('categories.index')->with('error', 'Tạo danh mục thất bại, slug đã tồn tại. Hãy đổi tên khác cho danh mục !');
            }
        }
        $data['slug'] = $slug;
        if($data['parent_id'] == 'null'){
            $data['parent_id'] = null;
        }
        $data['created_by'] = "Administrator";
        $data['updated_by'] = "Administrator";
        $data['delete_flag'] = false;
        if(Category::create($data)){
            return redirect()->route('categories.index')->with('success', 'Tạo danh mục thành công !');
        }else{
            return redirect()->route('categories.index')->with('error', 'Tạo danh mục thất bại !');
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
        $categories = Category::where('delete_flag', 0)->get();
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category', 'categories'));
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
        $category = Category::find($id);
        $data = $request->all();
        if($request->has('name')){
            $slug = str::slug($request->name, "-");
            if($slug == $category->slug){
                $data['slug'] = $slug;
            }else{
                $slug_check = Category::where('slug', $slug)->first();
                if($slug_check){
                    return redirect()->route('categories.index')->with('error', 'Chỉnh sửa danh mục thất bại, slug đã tồn tại. Hãy đổi tên khác cho danh mục !');
                }else{
                    $data['slug'] = $slug;
                }
            }
        }
        $data['slug'] = $slug;
        if($data['parent_id'] == 'null'){
            $data['parent_id'] = null;
        }
        if ($category->update($data)) {
            return redirect()->route('categories.index')->with('success', 'Cập nhật danh mục thành công!');
        } else {
            return redirect()->route('categories.index')->with('error', 'Danh mục không tồn tại!');
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
        $category = Category::find($id);
        $category->delete_flag = true;
        $category->save();
        return redirect()->back()->with('success', 'Xóa danh mục thành công!');
    }
}
