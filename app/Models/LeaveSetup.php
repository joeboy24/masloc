<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveSetup extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','maternity','casual','annual','study','sick','others'
    ];
}
