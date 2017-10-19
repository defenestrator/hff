<?php
use Illuminate\Support\Facades\Route;
// PUBLIC GUEST VIEW ROUTES
Route::view('/', 'index')->name('home');

Route::view('/terms', 'terms')->name('terms');
Route::view('/privacy','privacy')->name('privacy');

Route::view('/contact', 'contact')->name('contact');
Route::post('/contact','ContactFormController@create')->name('contact');
//Featured Specials
Route::view('/flats-special', 'flats-special')->name('flats-special');
// Static Trip Pages
Route::view('/trips/backcountry-river-guides', 'trips.backcountry-river-guides')->name('backcountry-river-guides');
Route::view('/trips/costa-de-cocos', 'trips.costa-de-cocos')->name('costa-de-cocos');
Route::view('/trips/deep-creek-lodge', 'trips.deep-creek-lodge')->name('deep-creek-lodge');
Route::view('/trips/naknek-river-camp', 'trips.naknek-river-camp')->name('naknek-river-camp');
// Publicly published assets:
Route::get('/publications/posts', 'PublishedPostsController@index')->name('publications.posts.index');
Route::get('/publications/posts/{slug}', 'PublishedPostsController@show')->name('publications.posts.show');


Route::get('/publications/podcasts', 'PublishedPodcastsController@index')->name('publications.podcasts.index');
Route::get('/publications/podcasts/{slug}', 'PublishedPodcastsController@show')->name('publications.podcasts.show');

Route::get('/posts/{tag}/tag', 'PostTagsController@index');

// LOADER.IO AUTHENTICATION
Route::view('/loaderio-f9078dd3e7e9c306ca90d525395dc64b', 'loader-io');

// AUTH ROUTES
Route::group(['middleware' => ['auth:web']], function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/posts/{id}/edit', 'PostsController@edit');
    Route::get('/posts/{id}/tags', 'PostTagsController@edit');
    // CMS ROUTES
    Route::group(['middleware' => [], 'prefix' => 'cms'], function () {
        Route::view('/podcasts', 'cms.podcasts');
        Route::view('/posts', 'cms.posts');
    });
});

// Registrations are closed, hacker.
Route::any('/register', function(){
    return 'no';
});

