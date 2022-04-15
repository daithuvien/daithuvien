<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class CoursesController extends Controller
{
    public function index(Request $request) {
        ######### SEO ##############################################################
        SEOMeta::setTitle('Đại Thư Viện - Khoá Học');
        SEOMeta::setDescription('Chia sẻ download các Khóa học từ nhiều nguồn, miễn phí cập nhật liên tục từ Udemy, Pluralsight. Udemy Free download.');
        SEOMeta::setCanonical('https://daithuvien.com/khoa-hoc/');

        OpenGraph::setDescription('Chia sẻ download các Khóa học từ nhiều nguồn, miễn phí cập nhật liên tục từ Udemy, Pluralsight. Udemy Free download');
        OpenGraph::setTitle('Đại Thư Viện - Khóa Học');        
        OpenGraph::setUrl('https://daithuvien.com/khoa-hoc');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('site_name', 'Đại Thư Viện - Khóa Học');
        OpenGraph::addProperty('image', 'https://daithuvien.com/client/imgs/logo.png');

        JsonLd::setTitle('Đại Thư Viện - Khóa Học');
        JsonLd::setDescription('Chia sẻ download các Khóa học từ nhiều nguồn, miễn phí cập nhật liên tục từ Udemy, Pluralsight. Udemy Free download');
        JsonLd::addImage('https://daithuvien.com/client/imgs/logo.png');
        ################### END SEO #################################################

        $latestCourses = (new Course)->listHotCourses(6);
        $lsCategoryInCourses = (new Category)->listCategoryInCourses();
        
        $paginateItems = env('COURSE_PAGINATION');

        if($request->has('category')){
            $data = $request->all();
            $courses = $this->filterCourse($request)->appends([
                'category' => $request->category,
                'filterBy' => $request->filterBy,
                'sortBy' => $request->sortBy
            ]);
            return view('client.courses.index', compact(['courses','latestCourses', 'lsCategoryInCourses','data']));
        }else{
            $data = null;
            $courses = (new Course)->getCoursesWithPaginate($paginateItems);
            return view('client.courses.index', compact(['courses','latestCourses', 'lsCategoryInCourses','data']));
        }
    }

    public function show($slug)
    {
        if (strpos($slug, '.html') !== false) {
            $slug = str_replace(".html", "", $slug);
        }

        $course = (new Course)->findBySlug($slug);
        ######### SEO ##############################################################
            SEOMeta::setTitle($course->name. " - Đại Thư Viện");
            SEOMeta::setDescription(substr(strip_tags($course->content), 0, 300));
            SEOMeta::setCanonical('https://daithuvien.com/khoa-hoc/'.$course->slug.".html");        

            OpenGraph::setDescription(substr(strip_tags($course->content), 0, 300));
            OpenGraph::setTitle($course->name. " - Đại Thư Viện");        
            OpenGraph::setUrl('https://daithuvien.com/khoa-hoc/'.$course->slug.".html");
            OpenGraph::addProperty('locale', 'en_US');
            OpenGraph::addProperty('type', 'article');
            OpenGraph::addProperty('site_name', 'Đại Thư Viện');
            OpenGraph::addProperty('image', asset('img/courses')."/".$course->image);
            OpenGraph::setArticle([
                'published_time' => $course->created_at,
                'modified_time' => $course->updated_at,
                'author' => 'https://www.facebook.com/daithuvien',
                'publisher' => 'https://www.facebook.com/daithuvien',        
            ]);

            JsonLd::setTitle($course->name. " - Đại Thư Viện");
            JsonLd::setDescription(substr(strip_tags($course->content), 0, 300));
            JsonLd::addImage(asset('img/courses')."/".$course->image);
        ################### END SEO #################################################

        $lsCourseProvider = (new CourseLink)->listCourseProviders($course->id);
        $latestCourses = (new Course)->listHotCourses(6);
        $listCategories = [];

        $lsCategoryInCourses = (new Category)->listCategoryInCourses();
        foreach($lsCategoryInCourses as $cat) {
            
            $num = (new CourseCategory)->getCoursesIdByCategory($cat->id)->count();
            $name = $cat->name;
            $slug = $cat->slug;
            $catInCourse = new \stdClass;
            $catInCourse->name = $name;
            $catInCourse->slug = $slug;
            $catInCourse->num = $num;                
            array_push($listCategories, $catInCourse);
        }
        $course->updateView();
        $lsTags = $course->tags;
        return view('client.courses.show', compact('course', 'lsCourseProvider', 'latestCourses', 'listCategories', 'lsCategoryInCourses', 'lsTags'));
    }

    public function CourseInCategory($slug)
    {
        $cat = (new Category)->findCourseBySlug($slug);
        if (!$cat) {
            return Redirect::route('client.list_courses');
        }

        ################### SEO ##############################################################
            SEOMeta::setTitle('Khoá Học - '.$cat->name.' - Đại Thư Viện');
            SEOMeta::setDescription('Chia sẻ download các Khóa học từ nhiều nguồn, miễn phí cập nhật liên tục từ Udemy, Pluralsight. Udemy Free download.');
            SEOMeta::setCanonical('https://daithuvien.com/khoa-hoc/');

            OpenGraph::setDescription('Chia sẻ download các Khóa học từ nhiều nguồn, miễn phí cập nhật liên tục từ Udemy, Pluralsight. Udemy Free download');
            OpenGraph::setTitle('Khoá Học - '.$cat->name.' - Đại Thư Viện');        
            OpenGraph::setUrl('https://daithuvien.com/khoa-hoc');
            OpenGraph::addProperty('locale', 'en_US');
            OpenGraph::addProperty('type', 'website');
            OpenGraph::addProperty('site_name', 'Khoá Học - '.$cat->name.' - Đại Thư Viện');
            OpenGraph::addProperty('image', 'https://daithuvien.com/client/imgs/logo.png');

            JsonLd::setTitle('Khoá Học - '.$cat->name.' - Đại Thư Viện');
            JsonLd::setDescription('Chia sẻ download các Khóa học từ nhiều nguồn, miễn phí cập nhật liên tục từ Udemy, Pluralsight. Udemy Free download');
            JsonLd::addImage('https://daithuvien.com/client/imgs/logo.png');
        ################### END SEO #################################################
        
        $latestCourses = (new Course)->listHotCourses(6);
        $lsCategoryInCourses = (new Category)->listCategoryInCourses();
        $courses = (new Course)->getCoursesInCateWithPaginate($cat->id, 20);
        return view('client.courses.course_in_category', compact(['courses', 'cat', 'latestCourses', 'lsCategoryInCourses']));
    }

    public function filterCourse(Request $request){
        $paginateItems = env('COURSE_PAGINATION');
        if($request->category == "all"){
            if($request->filterBy == "id"){
                if($request->sortBy == "descending"){
                    return Course::where('delete_flag', false)->orderBy('id', 'DESC')->paginate($paginateItems);
                }else{
                    return Course::where('delete_flag', false)->orderBy('id', 'ASC')->paginate($paginateItems);
                }
            }else{
                if($request->sortBy == "descending"){
                    return Course::where('delete_flag', false)->orderBy('created_at', 'DESC')->paginate($paginateItems);
                }else{
                    return Course::where('delete_flag', false)->orderBy('created_at', 'ASC')->paginate($paginateItems);
                }
            }
        }else{
            $cateIds = Category::where([['delete_flag', false], ['name', $request->category]])->pluck('id');
            $courseIds = (new CourseCategory)->getCoursesIdByCategory($cateIds);
            if($request->filterBy == "id"){
                if($request->sortBy == "descending"){
                    return Course::where('delete_flag', false)->whereIn('id', $courseIds)->orderBy('id', 'DESC')->paginate($paginateItems);
                }else{
                    return Course::where('delete_flag', false)->whereIn('id', $courseIds)->orderBy('id', 'ASC')->paginate($paginateItems);
                }
            }else{
                if($request->sortBy == "descending"){
                    return Course::where('delete_flag', false)->whereIn('id', $courseIds)->orderBy('created_at', 'DESC')->paginate($paginateItems);
                }else{
                    return Course::where('delete_flag', false)->whereIn('id', $courseIds)->orderBy('created_at', 'ASC')->paginate($paginateItems);
                }
            }
        }
    }

}
