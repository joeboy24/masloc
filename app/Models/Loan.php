<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','employee_id','elig_amt','lump_sum','dur','interest','monthly_ded','amt_paid','bal','date_started','months_left','status'
    ];

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }

}
