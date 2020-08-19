<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'referrals', 'namespace' => 'Referrals'], function () {
    Route::get('/', 'ReferralController@index')->name('referrals.index');
    Route::post('/', 'ReferralController@store')->name('referrals.store');
});

Route::group(['prefix' => 'subscriptions', 'namespace' => 'Subscriptions'], function () {
    Route::get('/', 'SubscriptionController@index')->name('subscription.index');
    Route::post('/', 'SubscriptionController@store')->name('subscription.store');
});
