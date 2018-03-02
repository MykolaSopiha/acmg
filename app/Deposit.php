<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deposit extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'wallet_id',
        'amount',
        'payment_type_id',
        'account_id',
        'available',
    ];


    // Relationships BEGIN
    public function wallet()
    {
        return $this->belongsTo('App\Wallet');
    }

    public function paymentType()
    {
        return $this->belongsTo('App\PaymentType');
    }

    public function account()
    {
        return $this->belongsTo('App\Account');
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
