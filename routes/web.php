<?php
use Illuminate\Support\Facades\Route;
// PUBLIC GUEST VIEW ROUTES
Route::view('/', 'index')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/terms', 'terms')->name('terms');
Route::view('/privacy','privacy')->name('privacy');

Route::view('/contact', 'contact')->name('contact');
Route::post('/contact','ContactFormController@create')->name('contact');
// Features and Specials
Route::view('/features/flats-special', 'features.flats-special')->name('flats-special');
Route::view('/features/alaska-special', 'features.alaska-special')->name('alaska-special');
Route::view('/features/idaho-steelhead-special', 'features.idaho-steelhead-special')->name('idaho-steelhead-special');
// Redirected Static Trip Pages
Route::redirect('/flats-special', '/features/flats-special');
Route::redirect('/trips/backcountry-river-guides', '/destinations/backcountry-river-guides');
Route::redirect('/trips/costa-de-cocos', '/destinations/costa-de-cocos');
Route::redirect('/trips/deep-creek-lodge', '/destinations/deep-creek-lodge');
Route::redirect('/trips/naknek-river-camp', '/destinations/naknek-river-camp');
// Destinations
Route::view('/destinations/backcountry-river-guides', 'destinations.backcountry-river-guides')->name('backcountry-river-guides');
Route::view('/destinations/blackfish-lodge', 'destinations.blackfish-lodge')->name('blackfish-lodge');
Route::view('/destinations/costa-de-cocos', 'destinations.costa-de-cocos')->name('costa-de-cocos');
Route::view('/destinations/deep-creek-lodge', 'destinations.deep-creek-lodge')->name('deep-creek-lodge');
Route::view('/destinations/mango-creek-lodge', 'destinations.mango-creek-lodge')->name('mango-creek-lodge');
Route::view('/destinations/naknek-river-camp', 'destinations.naknek-river-camp')->name('naknek-river-camp');
Route::view('/destinations/rio-manso-lodge', 'destinations.rio-manso-lodge')->name('rio-manso-lodge');
Route::view('/destinations/the-blue-bonefish', 'destinations.the-blue-bonefish')->name('the-blue-bonefish');
Route::view('/destinations/true-blue-bones', 'destinations.true-blue-bones')->name('true-blue-bones');
Route::view('/destinations/two-boys-inn-andros', 'destinations.two-boys-inn-andros')->name('two-boys-inn-andros');

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

