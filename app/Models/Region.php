<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg_name'
    ];

    public function employee(){
        return $this->hasMany('App\Models\Employee');
    }
}
