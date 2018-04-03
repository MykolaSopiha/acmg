<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $fillable = [
        'account_id',
        'start_time',
        'earliest_time',
        'latest_time',
        'days'
    ];


    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function isTimeCorrect($value)
    {
        $parts = explode(':', $value);

        if(count($parts) > 2){
            return false;
        }

        $hours = $parts[0];
        $minutes = $parts[1];

        $earliest_hh = explode(':', $this->earliest_time)[0];
        $earliest_mm = explode(':', $this->earliest_time)[1];

        $latest_hh = explode(':', $this->latest_time)[0];
        $latest_mm = explode(':', $this->latest_time)[1];


        if (
            $hours >= 0 &&
            $hours < 24 &&

            $minutes >= 0 &&
            $minutes < 60 &&

            $hours >= $earliest_hh &&
            $minutes >= $earliest_mm &&

            $hours <= $latest_hh &&
            $latest_mm <= $latest_mm &&

            is_numeric($hours) &&
            is_numeric($minutes)
        ){
            return true;
        }

        return false;
    }
}
