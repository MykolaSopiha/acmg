<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function inspector()
    {
        return $this->hasOne('App\User', 'id', 'confirmed_by');
    }
    // Relationships END


    // Mutators BEGIN
    public function getAmountAttribute($value)
    {
        return $value / (pow(10, $this->wallet->currency->decimal_digits));
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = intval($value * pow(10, $this->wallet->currency->decimal_digits));
    }
    // Mutators END


    public function confirm()
    {
        if ($this->wallet->balance >= $this->amount) {
            $balance = $this->wallet->update([
                'balance' => $this->wallet->balance - $this->amount,
            ]);

            $withdraw = $this->update([
                'confirmed_at' => date("Y-m-d H:i:s"),
                'confirmed_by' => Auth::user()->id,
            ]);

            return $balance && $withdraw;
        }

        return false;
    }
}
