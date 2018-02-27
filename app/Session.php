<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'account_id',
        'session_start',
        'session_end',
        'manager_id',
        'comment',
    ];


    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function manager()
    {
        return $this->belongsTo('App\Payment', 'manager_id', 'id');
    }
}
