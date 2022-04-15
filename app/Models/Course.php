<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return Course::where([['delete_flag', false], ['slug', $slug]])->first();
    }

    public function getCoursesWithPaginate($paginate)
    {
        return Course::where('delete_flag', false)->orderBy('created_at', 'DESC')->paginate($paginate);
    }

    public function listHotCourses($number)
    {
        return Course::where('delete_flag', false)->orderBy('updated_at', 'DESC')->take($number)->get();
    }

    public function listViewCourses($number)
    {
        return Course::where('delete_flag', false)->orderBy('num_of_views', 'DESC')->take($number)->get();
    }

    public function getCoursesInCateWithPaginate($cateId, $paginate)
    {
        $courseIds = (new CourseCategory)->getCoursesIdByCategory($cateId);
        return Course::where('delete_flag', false)->whereIn('id', $courseIds)->orderBy('created_at', 'DESC')->paginate($paginate);
    }

    public function updateView()
    {
        $this['num_of_views'] += 1;
        $this->save();
    }
}
