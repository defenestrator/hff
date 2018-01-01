<?php

// PUBLIC GUEST VIEW ROUTES
Route::get('/', 'HomeController@index')->name('home');

Route::view('/about', 'about')->name('about');
Route::view('/terms', 'terms')->name('terms');
Route::view('/privacy','privacy')->name('privacy');
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact','ContactFormController@create')->name('contact');
Route::get('/tag/{tag}', 'TagsController@index');

// Features and Specials

Route::group(['prefix' => 'features'], function () {
    Route::view('/weekly-special', 'features.weekly-special')->name('weekly-special');
    Route::view('/flats-special', 'features.flats-special')->name('flats-special');
    Route::view('/alaska-special', 'features.alaska-special')->name('alaska-special');
    Route::view('/idaho-steelhead-special', 'features.idaho-steelhead-special')->name('idaho-steelhead-special');
});
// Showcases
Route::group(['prefix' => 'showcases'], function () {
    Route::get('{slug}', 'PublishedShowcasesController@show');

});

// Published posts
Route::get('/publications/posts', 'PublishedPostsController@index')->name('publications.posts.index');
Route::get('/publications/posts/{slug}', 'PublishedPostsController@show')->name('publications.posts.show');
Route::get('/publications/showcases', 'ShowcasesController@index');
Route::get('/publications/showcases/{slug}', 'PublishedShowcasesController@show');
Route::get('/posts/{tag}/tag', 'PostTagsController@index');
Route::get('/showcases/{tag}/tag', 'ShowcaseTagsController@index');
Route::get('regions/{slug}', 'RegionController@show');

// Authors
Route::get('/publications/authors/{uuid}', 'UserController@show');
Route::group(['middleware' => ['auth:web']], function () {
    Route::view('/dashboard', 'dashboard');
    Route::put('/settings/profile/details', 'ProfileDetailsController@update');
    // Posts
    Route::get('/cms/posts', 'PostsController@create');
    Route::post('/cms/images', 'ImagesController@wysiwyg');
    // Tags
    Route::get('/posts/{id}/tags', 'PostTagsController@edit');
});

// DEVELOPER LEVEL AUTH ROUTES
Route::group(['middleware' => ['auth:web', 'dev']], function () {
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