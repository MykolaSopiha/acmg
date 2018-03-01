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

    // Relationships BEGIN
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function account()
    {
        return $this->hasMany('App\Account', 'user_id', 'id');
    }

    public function payment()
    {
        return $this->hasMany('App\Payment');
    }

    public function referals()
    {
        return User::where('parent_id', $this->id)->get();
    }
    // Relationships END
}
