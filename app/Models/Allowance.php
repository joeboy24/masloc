<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','employee_id','fname','rent','prof','resp','risk','vma','ent','dom','cola','intr','tnt','new1','new2','new3','new4','new5'
    ];

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }

}
