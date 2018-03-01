<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'account_id',
        'start',
        'end',
        'manager_id',
        'comment',
    ];


    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function manager()
    {
        return $this->belongsTo('App\User', 'manager_id', 'id');
    }
}
