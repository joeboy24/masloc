<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','month','employee_id','position','salary','rent','prof','tot_income','ssf','taxable_inc',
        'tax_pay','first1','next1','next2','next3','next4','next5','net_amount'
    ];

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }
}
