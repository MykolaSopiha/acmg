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


    // Relationships BEGIN
    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function session()
    {
        return $this->hasOne('App\Session');
    }
    // Relationships END


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

    public function isMissed()
    {
        $currTime = date('h:i');
        $currTimeParts = explode(':', $currTime);

        $currHour = $currTimeParts[0];
        $currMinute = $currTimeParts[1];

        $latest_hh = explode(':', $this->latest_time)[0];
        $latest_mm = explode(':', $this->latest_time)[1];

        if ($currHour > $latest_hh || ($currHour == $latest_hh && $currMinute > $latest_mm)) {
            return true;
        } else {
            return false;
        }
    }
}
