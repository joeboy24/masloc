<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','department_id','allowance_id','salarycat_id','salary_id','bank_id','loan_id','staff_id',
        'afis_no','fname','sname','oname','gender','dob','position','date_emp','cur_pos','ssn','salary',
        'contact','ssf','2tier_ssf','email','dept','region','bank','branch','acc_no','sub_div',
        'staff_loan','loan_date_started','loan_bal','loan_monthly_ded','photo','status','del'

        // 'biometric_reg_no',
        // 'year',
        // 'years_served',
        // 'staff_id',
        // 'name',
        // 'dob',
        // 'age',
        // 
        // 
        // 'position',
        // 
        // 'qualification',
        // 'prog',
        // 'classification',
        // 'grade',
        // 'level',
        // 'ssnit_no',
        // 'contact',


        // 'photo',
        // 'email',
        // 'nat_id',
        // 'passport',
        // 'marital_status',
        // 'religion',
        // 'region',
        // 'res_address',
        // 'city',
        // 'nok',
        // 'nok_contact',
    ];

    // public function user(){
    //     return $this->belongsTo('App\Models\User');
    // }

    public function bank(){
        return $this->belongsTo('App\Models\Bank');
    }

    public function loan(){
        return $this->belongsTo('App\Models\Loan');
    }

    public function region(){
        return $this->belongsTo('App\Models\Region');
    }

    public function allowance(){
        return $this->belongsTo('App\Models\Allowance');
    }

    public function allowexp(){
        return $this->belongsTo('App\Models\Allowexp');
    }

    public function taxation(){
        return $this->hasMany('App\Models\Taxation');
    }

    public function leave(){
        return $this->hasMany('App\Models\Leave');
    }

}
