<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Account extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'profile_id',
        'user_id',
        'viewer_id',
        'viewer_pass',
        'schedule',
        'comment',
        'status',
        'confirmed_by',
        'confirmed_at',
    ];


    // Relationships BEGIN
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function session()
    {
        return $this->hasMany('App\Session');
    }

    public function deposit()
    {
        return $this->hasMany('App\Deposit');
    }

    public function inspector()
    {
        return $this->hasOne('App\User', 'id', 'confirmed_by');
    }
    // Relationships END


    // Mutators BEGIN
    public function setViewerIdAttribute($value)
    {
        $this->attributes['viewer_id'] = encrypt($value);
    }

    public function setViewerPassAttribute($value)
    {
        $this->attributes['viewer_pass'] = encrypt($value);
    }

    public function getViewerIdAttribute($value)
    {
        return decrypt($value);
    }

    public function getViewerPassAttribute($value)
    {
        return decrypt($value);
    }
    // Mutators END


    public function setStatus($status)
    {
        if (config('accounts.statuses') != 'confirmed') {

        } else {

        }
    }

    public function confirm()
    {
        $account = $this->update([
            'confirmed_at' => date("Y-m-d H:i:s"),
            'confirmed_by' => Auth::user()->id,
            'status' => 3,
        ]);

        $payment_type = PaymentType::findOrFail(1); // account confirmation
        $payment = $payment_type->payment->where('country_id', $this->user->country_id)->first();

        $deposit = new Deposit();
        $deposit->fill([
            'wallet_id' => $this->user->wallet->id,
            'amount' => $payment['amount'],
            'payment_type_id' => 1,
            'account_id' => $this->id,
            'available' => false,
        ]);
        $deposit->save();
        $deposit->makeAvailable();

        if ($this->user->parent_id) {
            $perent = $this->user->getParent();

            $payment_type = PaymentType::findOrFail(3); // referal account confirmation
            $payment = $payment_type->payment->where('country_id', $this->user->country_id)->first();

            $deposit = new Deposit();
            $deposit->fill([
                'wallet_id' => $perent->wallet->id,
                'amount' => $payment['amount'],
                'payment_type_id' => 3,
                'account_id' => $this->id,
                'available' => false,
            ]);
            $deposit->save();
            $deposit->makeAvailable();
        }

        return ($account && $deposit);
    }

    public function isConfirmed()
    {
        return ( !is_null($this->confirmed_by) && !is_null($this->confirmed_at) );
    }
}
