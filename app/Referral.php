<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
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

    /**
     * [boot description]
     * @return [type] [description]
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function (Referral $referral) {
            $referral->token = Str::random(50);
        });
    } 

    public function scopeWhereNotCompleted(Builder $builder)
    {
        return $builder->where('completed', false);
    }

    public function scopeWhereNotFromUser(Builder $builder, ?User $user)
    {
        if(!$user) {
            return $builder;
        }
        return $builder->where('user_id', '!=', $user->id);
    }

    public function complete()
    {
        $this->update([
            'completed' => true,
            'completed_at' => now()
        ]);
    }
}
