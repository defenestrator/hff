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

Route::view('/', 'index')->name('home')->middleware(['guest']);

Route::view('/contact', 'contact')->name('contact');

Route::view('/terms', 'terms')->name('terms');
Route::view('/privacy','privacy')->name('privacy');
Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('blog', 'blog-placeholder');

Route::post('contact',array('as' => 'contact','uses' => 'ContactFormController@create'));
Route::post('/newsletter', 'NewsletterController@addSubscription')->name('newsletter');