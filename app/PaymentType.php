<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'label',
    ];


    // Relationships BEGIN
    public function payment()
    {
        return $this->hasMany('App\Payment');
    }

    public function deposit()
    {
        return $this->hasMany('App\Deposit');
    }
    // Relationships END
}
