<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDept extends Model
{
    use HasFactory;

    protected $fillable = [
        'subdept_name'
    ];

    public function employee(){
        return $this->hasMany('App\Models\Employee');
    }
}
