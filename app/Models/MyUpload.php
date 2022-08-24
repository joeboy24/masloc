<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','course_id','staff_id','department_id','title','type','status','photo'
    ];

    public function staff(){
        return $this->belongsTo('App\Models\Staff');
    }

    public function department(){
        return $this->belongsTo('App\Models\Department');
    }

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

}
