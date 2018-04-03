<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', // nickname
        'full_name',
        'email',
        'country_id',
        'password',
        'skype',
        'phone',
        'parent_id',
        'referer_key',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => UserSaved::class,
        'deleted' => UserDeleted::class,
    ];


    // Relationships BEGIN
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function account()
    {
        return $this->hasMany('App\Account');
    }

    public function wallet()
    {
        return $this->hasOne('App\Wallet');
    }

    public function inspector()
    {
        return $this->belongsTo('App\Account', 'id', 'confirmed_by');
    }
    // Relationships END


    // Mutators BEGIN
//    public function getPhoneAttribute($value)
//    {
//        return (is_null($value)) ? null : decrypt($value);
//    }
//
//    public function getSkypeAttribute($value)
//    {
//        return (is_null($value)) ? null : decrypt($value);
//    }
//
//    public function setPhoneAttribute($value)
//    {
//        $this->attributes['phone'] = encrypt($value);
//    }
//
//    public function setSkypeAttribute($value)
//    {
//        $this->attributes['skype'] = encrypt($value);
//    }
    // Mutators END


    public function createWallet()
    {
        if (is_null($this->wallet)) {
            $wallet = new Wallet();
            $wallet->user_id = $this->id;
            $wallet->currency_id = $this->country->currency->id;
            $wallet->balance = 0;
            $wallet->save();
        }
    }

    public static function getAdmins()
    {
        return User::whereHas('roles', function($q)
        {
            $q->where('name', 'admin');
        })->get();
    }

    public static function getManagers()
    {
        return User::whereHas('roles', function($q)
        {
            $q->where('name', 'manager');
        })->get();
    }

    public function getReferals()
    {
        return $this->where('parent_id', $this->id)->get();
    }

    public function getParent()
    {
        return $this->where('id', $this->parent_id)->first();
    }
}
