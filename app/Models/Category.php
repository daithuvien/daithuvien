<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'created_by',
        'updated_by',
        'delete_flag'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_categories');
    }

    public function findCourseBySlug($slug) {
        $id = Category::where('slug', 'khoa-hoc')->where('parent_id', NULL)->first()->id;
        return Category::where([['delete_flag', false], ['slug', $slug], ['parent_id', $id]])->first();
    }

    public function listCategoryInCourses() {       
        $cat = Category::where('slug', 'khoa-hoc')->where('parent_id', NULL)->first()->id;
        return Category::where('delete_flag', false)->where('parent_id', $cat)->get();
    }
}
