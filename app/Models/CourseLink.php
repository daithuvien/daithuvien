<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'provider_name',
        'provider_part',
        'provider_url',
        'created_at',
        'updated_at',
    ];

    public function course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }

    public function listCourseProviders($courseId)
    {
        return CourseLink::where('course_id', $courseId)->select(['provider_name'])->distinct()->get();
    }
}
