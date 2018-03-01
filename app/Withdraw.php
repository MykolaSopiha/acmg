<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $table = 'withdrawals';

    protected $fillable = [
        'card_code'
    ];

    public function payments()
    {
        return $this->hasMany('App/Payments');
    }
}
