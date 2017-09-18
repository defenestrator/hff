<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the API routes for your application as
| the routes are automatically authenticated using the API guard and
| loaded automatically by this application's RouteServiceProvider.
|
*/

Route::group([
    'middleware' => 'api'
], function () {
    Route::post('/newsletter-subscriptions', 'NewsletterSubscriptionsController@create');

    Route::get('/posts', 'PostsController@index');
    Route::post('/posts', 'PostsController@create');
    Route::put('/posts/{id}', 'PostsController@update');
    Route::get('/posts/{id}', 'PostsController@edit');
    Route::delete('/posts/{id}', 'PostsController@destroy');
    Route::get('/posts/publications/{postId}', 'PostsController@show');
    Route::get('posts/{id}/tags', 'PostTagsController@index');

    Route::post('/publications', 'PublicationsController@create');
    Route::delete('/publications/{id}', 'PublicationsController@destroy');
});
