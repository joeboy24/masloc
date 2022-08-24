<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxationRead extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'employee_id',
        'name',
        'pos',
        'basic_sal',
        'rent_alw',
        'prof_alw',
        'total_income',
        'ssf',
        'tax_income',
        'tot_tax_pay',
        'first319',
        'next419',
        'next539',
        'cum_income',
        'next3539',
        'next20000',
        'net_amt'
    ];

}
