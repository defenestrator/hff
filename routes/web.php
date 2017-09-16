<?php
// PUBLIC GUEST ROUTES
Route::view('/', 'index')->name('home')->middleware(['guest']);
Route::view('/contact', 'contact')->name('contact');
Route::view('/terms', 'terms')->name('terms');
Route::view('/privacy','privacy')->name('privacy');

Route::post('/contact',array('as' => 'contact','uses' => 'ContactFormController@create'));

// Publicly published assets:
Route::get('/posts', 'PublishedPostsController@index')->name('posts.index');
Route::get('/posts/{slug}', 'PublishedPostsController@show')->name('posts.show');

Route::get('/podcasts', 'PublishedPodcastsController@index')->name('podcasts.index');
Route::get('/podcasts/{slug}', 'PublishedPodcastsController@show')->name('podcasts.show');

// PUBLIC WEB AUTH ROUTES
Route::group(['middleware' => ['auth:web', 'dev']], function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});

// ADMIN AKA 'DEVELOPER' AUTH ROUTES
