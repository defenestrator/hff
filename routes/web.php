<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@show')->name('welcome');

Route::get('/home', 'HomeController@show')->name('home');

Route::get('/index', function () {
    return view('index');
});

Route::post('/newsletter', 'NewsletterController@addSubscription')->name('newsletter');
Route::get('/terms', function() {
    return view('terms');
})->name('terms');
Route::get('/privacy', function() {
    return view('privacy');
})->name('privacy');