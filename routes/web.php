<?php

// PUBLIC GUEST ROUTES
Route::view('/', 'index')->name('home')->middleware(['guest']);
Route::view('/contact', 'contact')->name('contact');
Route::view('/terms', 'terms')->name('terms');
Route::view('/privacy','privacy')->name('privacy');
Route::post('/contact',array('as' => 'contact','uses' => 'ContactFormController@create'));
Route::post('/newsletter', 'NewsletterController@addSubscription')->name('newsletter');
Route::get('/blog', 'PublishedPostsController@index');

// PUBLIC WEB AUTH ROUTES
Route::group(['middleware' => 'auth:web'], function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});

// ADMIN AKA 'DEVELOPER' AUTH ROUTES