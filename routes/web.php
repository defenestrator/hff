<?php
// PUBLIC GUEST ROUTES
Route::view('/', 'index')->name('home')->middleware(['guest']);
Route::view('/contact', 'contact')->name('contact');
Route::view('/terms', 'terms')->name('terms');
Route::view('/privacy','privacy')->name('privacy');

Route::post('/contact',array('as' => 'contact','uses' => 'ContactFormController@create'));

// Publicly published assets:
Route::get('publications/posts', 'PublishedPostsController@index')->name('publications.posts.index');
Route::get('publications/posts/{slug}', 'PublishedPostsController@show')->name('publications.posts.show');

Route::get('publications/podcasts', 'PublishedPodcastsController@index')->name('publications.podcasts.index');
Route::get('publications/podcasts/{slug}', 'PublishedPodcastsController@show')->name('publications.podcasts.show');

Route::get('/posts/{tag}/tag', 'PostTagsController@index');

// ADMIN AKA 'DEVELOPER' AUTH ROUTES
Route::group(['middleware' => ['auth:web', 'dev']], function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/posts/{id}/edit', 'PostsController@edit');
    Route::get('/posts/{id}/tags', 'PostTagsController@edit');
});


