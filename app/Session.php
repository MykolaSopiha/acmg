<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'account_id',
        'manager_id',
        'start',
        'end',
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
    // Relationships END
}
