<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'symbol',
        'symbol_native',
        'decimal_digits',
        'rounding',
        'name_plural',
        'country_id',
    ];


    // Relationships BEGIN
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function wallet()
    {
        return $this->hasMany('App\Wallet');
    }
    // Relationships END
}
