<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'month', 'taxation_id', 'employee_id', 'position', 'salary', 'ssf', 'sal_aft_ssf', 'rent', 'prof', 'taxable_inc',
        'income_tax', 'net_aft_inc_tax', 'resp', 'risk', 'vma', 'ent', 'dom', 'intr', 'tnt', 'back_pay', 'net_bef_ded', 'staff_loan',
        'net_aft_ded', 'ssf_emp_cont', 'tot_ded', 'ssn', 'email', 'dept', 'region', 'bank', 'branch', 'acc_no',
    ];

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }

    public function taxation(){
        return $this->belongsTo('App\Models\Taxation');
    }
    
}
