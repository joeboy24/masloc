<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryCat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','title','position','basic_sal'
    ];

    // public function position(){
    //     return $this->belongsTo('App\Models\Position');
    // }

    public function employee(){
        return $this->hasMany('App\Models\Employee');
    }
}
