<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllowanceList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','allow_name','allow_perc'
    ];

    public function employee(){
        return $this->hasMany('App\Models\Employee');
    }
    
}
