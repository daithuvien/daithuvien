<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'en_name',
        'slug',
        'image',
        'content',
        'zip_pass',
        'course_size',
        'course_status',
        'course_duration',
        'course_release',
        'original_url',
        'date_to_deliver',
        'hours_to_deliver',
        'minute_to_deliver',
        'time_to_deliver',
        'created_by',
        'updated_by',
        'delete_flag'
    ];

    public function tags(){
        return $this->belongsToMany(Tags::class,'course_tags');
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'course_categories');
    }

    public function links()
    {
        return $this->hasMany(CourseLink::class);
    }

    public function findBySlug($slug)
    {
        $course = Course::whereDate('time_to_deliver', '<=', Carbon::now('Asia/Singapore'))->where([['delete_flag', false], ['slug', $slug]])->first();
        return $course;
    }

    public function getCoursesWithPaginate($paginate)
    {
        return Course::whereDate('time_to_deliver', '<=', Carbon::now('Asia/Singapore'))->where('delete_flag', false)->orderBy('time_to_deliver', 'DESC')->paginate($paginate);
    }

    public function listHotCourses($number)
    {
        return Course::whereDate('time_to_deliver', '<=', Carbon::now('Asia/Singapore'))->where('delete_flag', false)->orderBy('time_to_deliver', 'DESC')->take($number)->get();
    }

    public function listViewCourses($number)
    {
        return Course::whereDate('time_to_deliver', '<=', Carbon::now('Asia/Singapore'))->where('delete_flag', false)->orderBy('num_of_views', 'DESC')->take($number)->get();
    }

    public function getCoursesInCateWithPaginate($cateId, $paginate)
    {
        $courseIds = (new CourseCategory)->getCoursesIdByCategory($cateId);
        return Course::whereDate('time_to_deliver', '<=', Carbon::now('Asia/Singapore'))->where('delete_flag', false)->whereIn('id', $courseIds)->orderBy('created_at', 'DESC')->paginate($paginate);
    }

    public function updateView()
    {
        $this['num_of_views'] += 1;
        $this->save();
    }
}
