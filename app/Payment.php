<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'account_id',
        'amount',
        'currency_id',
        'status',
    ];

    // Mutators BEGIN
    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = intval(100*$value);
    }

    public function getAmountAttribute($value)
    {
        return money_format('%i', $value/100);
    }
    // Mutators END


    // Relationships BEGIN
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }

    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function session()
    {
        return $this->hasMany('App\Session');
    }
    // Relationships END
}
