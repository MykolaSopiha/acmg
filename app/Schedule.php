<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'day_of_the_week',
        'time_start_hours',
        'time_start_minutes',
        'time_stop_hours',
        'time_stop_minutes',
        'account_id'
    ];


}
