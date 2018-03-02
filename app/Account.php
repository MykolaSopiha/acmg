<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'url',
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
}
