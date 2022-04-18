<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\CourseCategory;
use App\Models\CourseLink;
use App\Models\Tags;
use App\Models\CourseTags;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $links = CourseLink::all();
        if($request->has('keysearch')){
            $courses = $this->filterSearch($request);
            if($courses){
                return view('admin.courses.courses.index', compact('courses', 'links'));
            }else{
                return view('admin.courses.courses.index',compact('courses', 'links'))->with('error', 'Không có khóa học tương tự!');
            }
        }else{
            $courses = Course::where('delete_flag',0)->orderBy('time_to_deliver', 'DESC')->paginate(10);
            return view('admin.courses.courses.index', compact('courses', 'links'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where([['delete_flag',0],['parent_id', 1]])->get();
        return view('admin.courses.courses.create',compact('categories'));
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
        
        $time = str($data['date_to_deliver'])." ".str($data['hours_to_deliver']).":".str($data['minute_to_deliver']);
        $time_to_deliver = Carbon::createFromFormat("d M, Y H:i", $time)->format("Y-m-d H:i");
        $data['time_to_deliver'] = $time_to_deliver;
        
        $slug = str::slug($request->name, "-");
        if($slug){
            $slug_check = Course::where('slug', $slug)->first();            
            if($slug_check != null){
                return redirect()->route('courses.index')->with('error', 'Tạo mới khóa học thất bại, slug đã tồn tại. Hãy đổi tên khác cho khóa học !');
            }            
        }
        $data['slug'] = $slug;

        $image = $request->file('image');
        $name_img = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // $image->move('img/courses/',$name_img);
        Image::make($image)->resize(600,334)->save('img/courses/'.$name_img);
        $last_img = 'img/courses/'.$name_img;
        $data['image'] = $last_img;
        $data['created_by'] = "Administrator";
        $data['updated_by'] = "Administrator";
        $data['zip_pass'] = "daithuvien.com";
        $data['delete_flag'] = false;
        
        $course = Course::create($data);
        if($course){
            if($request->has('category_id')){
                foreach($request->category_id as $category_id){
                    CourseCategory::create([
                        'category_id' => $category_id,
                        'course_id' => $course->id
                    ]);
                }
            }
            if($request->has('tags')){
                foreach($request->tags as $tag){
                    $tag_check = Tags::where('text', $tag)->first();
                    if($tag_check){
                        CourseTags::create([
                            'tags_id' => $tag_check->id,
                            'course_id' => $course->id
                        ]);
                    }else{
                        
                        $new_tag = Tags::create([
                            'text' => $tag
                        ]);                        
                        CourseTags::create([
                            'tags_id' => $new_tag->id,
                            'course_id' => $course->id
                        ]);
                    }
                }
            }
            return redirect()->route('courses.index')->with('success', 'Tạo khóa học mới thành công !');
        }else{
            return redirect()->route('courses.index')->with('error', 'Tạo khóa học thất bại !');
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
        $course = Course::find($id);
        $links = CourseLink::where('course_id', $course->id)->get();
        return view('admin.courses.courses.detail', compact('course', 'links'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $categories = Category::where('delete_flag', 0)->get();
        return view('admin.courses.courses.edit', compact('course','categories'));
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
        $course = Course::find($id);
        $data = $request->all();

        if($request->has('name')){
            $slug = str::slug($request->name, "-");
            if($slug == $course->slug){
                $data['slug'] = $slug;
            }else{
                $slug_check = Course::where('slug', $slug)->first();
                if($slug_check){
                    return redirect()->route('courses.index')->with('error', 'Chỉnh sửa tin tức thất bại, slug đã tồn tại. Hãy đổi tên khác cho tin tức !');
                }else{
                    $data['slug'] = $slug;
                }
            }
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name_img = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,334)->save('img/courses/'.$name_img);
            $last_img = 'img/courses/'.$name_img;
            $data['image'] = $last_img;
        }

        if($request->has('category_id')){
            if($course->categories){
                foreach(CourseCategory::get() as $old){
                    if($old->course_id == $course->id){
                        $old->delete();
                    }
                }
            }
            foreach($request->category_id as $category_id){
                    CourseCategory::create([
                        'category_id' => $category_id,
                        'course_id' => $course->id
                    ]);
            }
        }

        if($course->update($data)){
            if($request->has('tags')){
                if($course->tags){
                    foreach(CourseTags::get() as $old_tag){
                        if($old_tag->course_id == $course->id){
                            $old_tag->delete();
                        }
                    }
                }
                foreach($request->tags as $tag){
                    $tag_check = Tags::where('text', $tag)->first();
                    if($tag_check){
                        CourseTags::create([
                            'tags_id' => $tag_check->id,
                            'course_id' => $course->id
                        ]);
                    }else{
                        $new_tag = Tags::create([
                            'text' => $tag
                        ]);
                        CourseTags::create([
                            'tags_id' => $new_tag->id,
                            'course_id' => $course->id
                        ]);
                    }
                }
            }
            return redirect()->route('courses.index')->with('success', 'Chỉnh sửa khóa học thành công !');
        }else{
            return redirect()->route('courses.index')->with('error', 'Chỉnh sửa khóa học thất bại !');
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
        $course = Course::find($id);
        $course->delete_flag = true;
        $course->save();
        return redirect()->back()->with('success', 'Xóa khóa học thành công!');
    }

    public function filterSearch($request)
    {   
        $keySearch = $request->keysearch;
        $type = $request->type;

        if($request->type == "category"){
            $categories = Category::where('name', 'like', '%'.$keySearch.'%')->get();
            if($categories){
                $courses = [];
                foreach($categories as $category){
                    $courses[$category->id] = $category->courses()->get();
                }
                return $courses;
            }
                return [];
        } else {
            $typeList = ['name','en_name','slug','content'];
                foreach($typeList as $item){
                if( $type == $item){
                    $courses = Course::where($item, 'like', '%'.$keySearch.'%')->where('delete_flag', 0)->paginate(10);
                        return $courses;
                }
            }
        }
        
        $courses = Course::where('name', 'like', '%'.$keySearch.'%')->orWhere('slug', 'like', '%'.$keySearch.'%')->orWhere('content', 'like', '%'.$request->keysearch.'%')->paginate(10);
        if($courses){
            return $courses;
        } 
        $categories = Category::where('name', 'like', '%'.$keySearch.'%')->get();
        if($categories){
            $courses = [];$courses = Course::where('name', 'like', '%'.$keySearch.'%')->orWhere('slug', 'like', '%'.$keySearch.'%')->orWhere('content', 'like', '%'.$request->keysearch.'%')->paginate(10);
            if($courses){
                return $courses;
            } 
            $categories = Category::where('name', 'like', '%'.$keySearch.'%')->get();
            if($categories){
                $courses = [];
                foreach($categories as $category){
                    $courses[$category->id] = $category->courses()->get();
                }
                return $courses;
            }
            return [];
            foreach($categories as $category){
                $courses[$category->id] = $category->courses()->get();
            }
            return $courses;
        }
        return [];
    }
}
