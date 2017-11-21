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
    Route::post('/deploy-HfDamFwqhXEUUsHg6t4L', 'DeploymentController@create');
    Route::get('/posts', 'Api\PostsController@index');
    Route::post('/posts', 'Api\PostsController@create');
    Route::put('/posts/{id}', 'Api\PostsController@update');
    Route::get('/posts/{id}', 'Api\PostsController@edit');
    Route::delete('/posts/{id}', 'Api\PostsController@destroy');
    Route::get('/posts/publications/{postId}', 'PostsController@show');
    Route::get('posts/{id}/tags', 'PostTagsController@index');
    Route::post('/newsletter-subscriptions', 'NewsletterSubscriptionsController@create');

    // Registrations are closed, hacker.
    Route::any('/register', 'Auth\RegisterController@no');

    Route::post('/publications', 'PublicationsController@create');
    Route::delete('/publications/{id}', 'PublicationsController@destroy');
});

Route::group([
    'middleware' => 'api'
], function () {
    Route::post('/sales-inquiry', 'SalesInquiryController@create');
});
