<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'phone',
    ];


    // Relationships BEGIN
    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function currency()
    {
        return $this->hasOne('App\Currency');
    }

    public function payment()
    {
        return $this->hasMany('App\Payment');
    }
    // Relationships END
}
