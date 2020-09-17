<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    public $timestamps = true;

//    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name' , 'description' , 'max'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class , 'courses_users' , 'user_id', 'course_id') ;
    }
}
