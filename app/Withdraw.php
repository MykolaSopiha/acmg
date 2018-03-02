<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = [
        'wallet_id',
        'amount',
        'card_code',
        'status',
        'confirmed_by',
        'confirmed_at',
    ];


    // Relationships BEGIN
    public function wallet()
    {
        return $this->belongsTo('App\Wallet');
    }
    // Relationships END


    // Mutators BEGIN
    public function getAmountAttribute($value)
    {
        return $value / ( pow(10, $this->wallet->currency->decimal_digits) );
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = intval($value * pow(10, $this->wallet->currency->decimal_digits));
    }
    // Mutators END
}
