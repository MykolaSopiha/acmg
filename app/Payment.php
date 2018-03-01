<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'account_id',
        'amount',
        'currency_id',
        'status',
        'comment',
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

    public function withdraw()
    {
        return $this->belongsTo('App\Withdraw');
    }
    // Relationships END
}
