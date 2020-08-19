<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referrals extends Model
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
}
