<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Referral extends Model
{   
    /**
     * [$guarded description]
     * @var array
     */
    protected $guarded = [];

    /**
     * [$dates description]
     * @var [type]
     */
    protected $dates = [
        'completed_at'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function (Referral $referral) {
            $referral->token = Str::random(50);
        });
    } 
}
