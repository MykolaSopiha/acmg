<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    protected $fillable = [
        'country_id',
        'amount',
        'payment_type_id',
    ];


    // Relationships BEGIN
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function paymentType()
    {
        return $this->belongsTo('App\PaymentType');
    }
    // Relationships END


    // Mutators BEGIN
    public function getAmountAttribute($value)
    {
        return $value/(pow(10, $this->country->currency->decimal_digits));
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = intval($value*pow(10, $this->country->currency->decimal_digits));
    }
    // Mutators END
}
