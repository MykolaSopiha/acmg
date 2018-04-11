<?php

namespace App;

use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{

    protected $fillable = [
        'account_id',
        'start_time',
        'user_changes',
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


    // Mutators BEGIN
    public function convertTimeZone($value, $primaryTz, $finalTz)
    {
        $schedule_date = new DateTime($value, new DateTimeZone($primaryTz) );
        return $schedule_date->setTimeZone(new DateTimeZone($finalTz));
    }

    public function getStartTimeAttribute($value)
    {
        if (is_null($value)) {
            return null;
        }

        $userTz = $this->account->user->timezone;
        return self::convertTimeZone($value, 'UTC', $userTz)->format('H:i');
    }

    public function setStartTimeAttribute($value)
    {
        $userTz = $this->account->user->timezone;
        $this->attributes['start_time'] = self::convertTimeZone($value, $userTz, 'UTC')->format('H:i');
    }
    // Mutators END


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

    public function isFirst()
    {
        $timetable = self::orderBy('account_id','asc')
            ->where('account_id', $this->account_id)
            ->first();


        if ($timetable['id'] == $this->id) {
            return true;
        }

        return false;
    }

    public function isSecond()
    {
        $timetables = self::orderBy('account_id','asc')
            ->where('account_id', $this->account_id)
            ->limit(2)
            ->get();


        if ($timetables[1]['id'] == $this->id) {
            return true;
        }

        return false;
    }

    public function isReadyToUserUpdate()
    {
        if (config('accounts.user_change_limit') > $this->user_changes && $this->updated_at > Carbon::now()->subDay())
            return true;

        return false;
    }
}
