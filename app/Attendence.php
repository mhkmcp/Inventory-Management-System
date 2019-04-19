<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{

      protected $fillable = [
        'user_id', 'attendence', 'att_year','att_date','edit_date','month'
    ];
}
