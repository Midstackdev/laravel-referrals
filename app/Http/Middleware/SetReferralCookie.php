<?php

namespace App\Http\Middleware;

use Closure;

class SetReferralCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($request->referral($request->referral, $request));

        if ($referral = $request->referral($request->referral, $request)) {
            cookie()->queue(cookie()->forever('referral', $referral->token));
        }

        return $next($request);
    }
}
