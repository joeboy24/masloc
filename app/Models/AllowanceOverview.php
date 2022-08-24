<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllowanceOverview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','rent','prof','resp','risk','vma','ent','dom','intr','tnt','ssf','ssf1','ssf2'
    ];

}
