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
    'middleware' => 'auth:api'
], function () {
    Route::post('/posts', 'PostsController@create');
    Route::put('/posts/{id}', 'PostsController@update');
    Route::delete('/posts/{id}', 'PostsController@destroy');
    Route::post('/publications', 'PublicationsController@create');
    Route::delete('/publications/{id}', 'PublicationsController@destroy');
});
