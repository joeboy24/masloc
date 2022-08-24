<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'img1_title',
        'img2_title',
        'img3_title',
        'img1_text',
        'img2_text',
        'img3_text',
        'img1_photo',
        'img2_photo',
        'img3_photo',

        'goals_header',
        'goals_body',
        'goal1_title',
        'goal2_title',
        'goal3_title',
        'goal4_title',
        'goal1_text',
        'goal2_text',
        'goal3_text',
        'goal4_text',

        'meet_header',
        'meet_body',
        'headteacher_photo',
        'meet1_title',
        'meet2_title',
        'meet3_title',
        'meet4_title',
        'meet1_text',
        'meet2_text',
        'meet3_text',

        'curious_header',
        'curious_body',
        'cur_bul1',
        'cur_bul2',
        'cur_bul3',
        'cur_bul4',
    ];

}
