<?php

namespace App\Http\Controllers\Referrals;

use App\Http\Controllers\Controller;
use App\Mail\Referrals\ReferralReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReferralController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('referrals.index');
    }

    public function store(Request $request)
    {
        $referral = $request->user()->referrals()->create($request->only('email'));

        Mail::to($referral->email)->send(
            new ReferralReceived($request->user(), $referral)
        );

        return back();
    }
}
