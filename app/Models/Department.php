<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'dept_name'
    ];

    public function employee(){
        return $this->hasMany('App\Models\Employee');
    }
}
