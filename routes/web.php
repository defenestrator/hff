<?php

// PUBLIC GUEST VIEW ROUTES
Route::middleware('cacheResponse')->group( function(){
    // HOME, THERE's NO PLACE LIKE IT!
    Route::get('/', 'HomeController@index')->name('home');

    // General bullshit
    Route::view('/about', 'about')->name('about');
    Route::view('/terms', 'terms')->name('terms');
    Route::view('/privacy','privacy')->name('privacy');
    Route::post('/contact','ContactFormController@create')->name('contact');

    // Published Showcases
    Route::get('/showcases/{slug}', 'PublishedShowcasesController@show')->name('published.showcase.show');
    Route::get('/showcases', 'PublishedShowcasesController@index');

    // Published posts
    Route::get('/publications/posts', 'PublishedPostsController@index')->name('publications.posts.index');
    Route::get('/publications/posts/{slug}', 'PublishedPostsController@show')->name('publications.posts.show');

    // Tags
    Route::get('/posts/{tag}/tag', 'PostTagsController@index');
    Route::get('/showcases/{tag}/tag', 'ShowcaseTagsController@index');
    Route::get('/tag/{tag}', 'TagsController@index');

    // Regions
    Route::get('/regions/{slug}', 'RegionController@show');
    Route::get('/regions', 'RegionController@index');

    // Authors
    Route::get('/publications/authors/{uuid}', 'UserController@show');



});
// World Map
Route::get('/maps/world', 'WorldMapController@index');
Route::middleware('doNotCacheResponse')->group(function() {
    // Confirm Newsletter Subscription
    Route::get('/newsletter-subscription/{token}', 'NewsletterSubscriptionsController@confirm');

    // Contact Form
    Route::view('/contact', 'contact')->name('contact');
});

// Authenticated User Routes
Route::middleware(['auth:web', 'doNotCacheResponse'])->group(function () {
    Route::view('/dashboard', 'dashboard');
    Route::put('/settings/profile/details', 'ProfileDetailsController@update');

    // CMS Posts
    Route::get('/cms/posts', 'PostsController@create');
    Route::post('/cms/images', 'ImagesController@wysiwyg');
    Route::get('/cms/posts/{id}/tags', 'PostTagsController@edit');

    // CMS Fish Species
    Route::get('/cms/fish-species', 'FishSpeciesController@create');
});

// DEVELOPER LEVEL AUTH ROUTES
Route::middleware(['auth:web', 'dev', 'doNotCacheResponse'])->group(function () {


    // DEVELOPER CMS ROUTES
    Route::group(['middleware' => [], 'prefix' => 'cms'], function () {
        // CMS Newsletter editor
        Route::view('/newsletters', 'cms.newsletters');

        // CMS Email template previews
        Route::get('/preview/newsletter/{id}', 'NewsletterPreviewController@show');

        // CMS Publications
        Route::get('/publications', 'PublicationsController@index');

        // CMS Showcases
        Route::get('/showcases', 'ShowcasesController@edit');
        Route::get('/showcases/{id}/tags', 'ShowcaseTagsController@edit');

        // CMS Destinations
        Route::view('/destinations', 'cms.destinations');

        // CMS Regions
        Route::view('/regions', 'cms.regions');

    });
});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
// LOADER.IO TEST AUTHENTICATION
Route::view('/loaderio-f9078dd3e7e9c306ca90d525395dc64b', 'loader-io');