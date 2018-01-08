<?php

// PUBLIC GUEST VIEW ROUTES
Route::get('/', 'HomeController@index')->name('home')->middleware(['cacheResponse']);

Route::view('/about', 'about')->name('about')->middleware(['cacheResponse']);
Route::view('/terms', 'terms')->name('terms')->middleware(['cacheResponse']);
Route::view('/privacy','privacy')->name('privacy')->middleware(['cacheResponse']);
Route::group(['middleware' => ['doNotCacheResponse']], function() {
    Route::view('/contact', 'contact')->name('contact');
});

Route::post('/contact','ContactFormController@create')->name('contact');
Route::get('/tag/{tag}', 'TagsController@index');


// Showcases
Route::group(['middleware'=> ['cacheResponse'] ,'prefix' => 'showcases'], function () {
    Route::get('{slug}', 'PublishedShowcasesController@show');
});

// Published posts
Route::get('/publications/posts', 'PublishedPostsController@index')->name('publications.posts.index');
Route::get('/publications/posts/{slug}', 'PublishedPostsController@show')->name('publications.posts.show');

Route::get('/posts/{tag}/tag', 'PostTagsController@index')->middleware(['cacheResponse']);
Route::get('/showcases/{tag}/tag', 'ShowcaseTagsController@index')->middleware(['cacheResponse']);
Route::get('regions/{slug}', 'RegionController@show')->middleware(['cacheResponse']);

// Authors
Route::get('/publications/authors/{uuid}', 'UserController@show')->middleware(['cacheResponse']);

Route::group(['middleware' => ['auth:web', 'doNotCacheResponse']], function () {
    Route::view('/dashboard', 'dashboard');
    Route::put('/settings/profile/details', 'ProfileDetailsController@update');
    // Posts
    Route::get('/cms/posts', 'PostsController@create');
    Route::post('/cms/images', 'ImagesController@wysiwyg');
    // Tags
    Route::get('/posts/{id}/tags', 'PostTagsController@edit');
});

// DEVELOPER LEVEL AUTH ROUTES
Route::group(['middleware' => ['auth:web', 'dev', 'doNotCacheResponse']], function () {
    // Tags
    Route::get('/showcases/{id}/tags', 'ShowcaseTagsController@edit');
    // DEVELOPER CMS ROUTES
    Route::group(['middleware' => [], 'prefix' => 'cms'], function () {

        Route::view('/newsletters', 'cms.newsletters');
        // email template previews
        Route::get('/preview/newsletter/{id}', 'NewsletterPreviewController@show');
        //Publications
        Route::get('/publications', 'PublicationsController@index');

        // Showcases
        Route::get('/showcases', 'ShowcasesController@edit');
        // Destinations
        Route::view('/destinations', 'cms.destinations');
        Route::view('/regions', 'cms.regions');
    });
});

// Confirm Newsletter Subscription
Route::get('/newsletter-subscription/{token}', 'NewsletterSubscriptionsController@confirm');

// LOADER.IO TEST AUTHENTICATION
Route::view('/loaderio-f9078dd3e7e9c306ca90d525395dc64b', 'loader-io');