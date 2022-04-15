<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'text'
    ];

    public function courses() 
    {
        return $this->belongsToMany(Course::class, 'course_tags');
    }
}
