<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'referrals', 'namespace' => 'Referrals'], function () {
    Route::get('/', 'ReferralController@index')->name('referrals.index');
    Route::post('/', 'ReferralController@store')->name('referrals.store');
});
