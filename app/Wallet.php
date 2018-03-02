<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'balance',
        'currency_id'
    ];


    // Relationships BEGIN
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }

    public function deposit()
    {
        return $this->hasMany('App\Deposit');
    }

    public function withdraw()
    {
        return $this->hasMany('App\Withdraw');
    }
    // Relationships END


    // Mutators BEGIN
    public function getAmountAttribute($value)
    {
        return $value / ( pow(10, $this->currency->decimal_digits) );
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = intval($value * pow(10, $this->currency->decimal_digits));
    }
    // Mutators END


    public function checkBalance()
    {
        // todo: make balance amount checking
        return true;
    }
}
