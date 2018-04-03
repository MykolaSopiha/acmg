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
        'manager_id',
        'user_id',
        'viewer_id',
        'viewer_pass',
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

    public function timetable()
    {
        return $this->hasMany('App\Timetable');
    }

    public function deposit()
    {
        return $this->hasMany('App\Deposit');
    }

    public function inspector()
    {
        return $this->hasOne('App\User', 'id', 'confirmed_by');
    }

    public function manager()
    {
        return $this->hasOne('App\User', 'id', 'manager_id');
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

    /**
     * Function make account confirmed by admin who call it and add
     * available deposit to account user and user's patron (if patron exists).
     *
     * @return bool
     */
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

    /**
     * Check if account is confirmed by some admin
     *
     * @return bool
     */
    public function isConfirmed()
    {
        return ( !is_null($this->confirmed_by) && !is_null($this->confirmed_at) );
    }

    /**
     * Get collection of confirmed accounts
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getConfirmedAccounts()
    {
        return self::where([
            ['confirmed_by', '<>', null],
            ['confirmed_at', '<>', null],
        ])->get();
    }

    public static function getConfirmedManagedAccounts()
    {
        return self::where([
            ['confirmed_by', '<>', null],
            ['confirmed_at', '<>', null],
            ['manager_id', '<>', null],
        ])->get();
    }

    /**
     * Function make week payment to user wallet if user's account is confirmed
     */
    public function depositWeekPayment()
    {
        $weekPaymentType = PaymentType::where('label', 'week')->first();
        $weekPayment = $weekPaymentType->payment->where('country_id', $this->user->country->id)->first();

        $deposit = new Deposit();
        $deposit->fill([
            'wallet_id' => $this->user->wallet->id,
            'amount' => $weekPayment['amount'],
            'payment_type_id' => $weekPaymentType['id'],
            'account_id' => $this->id,
            'available' => false,
        ]);
        $deposit->save();
        $deposit->makeAvailable();
    }
}
