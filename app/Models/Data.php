<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Data extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'created_by', 'updated_by', 'delete_flag'];

    public $incrementing = false;
    public static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }
}
