<?php
use Illuminate\Support\Facades\Route;
// PUBLIC GUEST VIEW ROUTES
Route::view('/', 'index')->name('home')->middleware(['guest']);

Route::view('/terms', 'terms')->name('terms');
Route::view('/privacy','privacy')->name('privacy');

Route::view('/contact', 'contact')->name('contact');
Route::post('/contact','ContactFormController@create')->name('contact');

// Publicly published assets:
Route::get('/publications/posts', 'PublishedPostsController@index')->name('publications.posts.index');
Route::get('/publications/posts/{slug}', 'PublishedPostsController@show')->name('publications.posts.show');


Route::get('/publications/podcasts', 'PublishedPodcastsController@index')->name('publications.podcasts.index');
Route::get('/publications/podcasts/{slug}', 'PublishedPodcastsController@show')->name('publications.podcasts.show');

Route::get('/posts/{tag}/tag', 'PostTagsController@index');
Route::any('loaderio-f9078dd3e7e9c306ca90d525395dc64b', function(){
    return view('loader-io');
});

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
//Route::post('register', function(){
//    return 'no';
//});

