<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allowexp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','employee_id','allowance_id','rent','prof','resp','risk','vma','ent','dom','cola','ssf','ssf1','ssf2','intr','tnt','new1','new2','new3','new4','new5'
    ];

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }
}
