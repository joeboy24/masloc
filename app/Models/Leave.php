<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'user_id','employee_id','leave_type','days','issue_date','resume_date','status'
    ];

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }

}
