<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'account_id',
        'manager_id',
        'timetable_id',
        'start',
        'end',
        'status',
        'carried_out_at',
        'carried_out_by',
        'comment',
    ];


    // Relationships BEGIN
    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function manager()
    {
        return $this->belongsTo('App\User', 'manager_id', 'id');
    }

    public function timetable()
    {
        return $this->belongsTo('App\Timetable');
    }
    // Relationships END

}
