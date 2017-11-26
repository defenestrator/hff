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

    // Posts
    Route::get('/posts', 'Api\PostsController@index');
    Route::post('/posts', 'Api\PostsController@create');
    Route::put('/posts/{id}', 'Api\PostsController@update');
    Route::get('/posts/{id}', 'Api\PostsController@edit');
    Route::delete('/posts/{id}', 'Api\PostsController@destroy');
    Route::get('/posts/publications/{postId}', 'Api\PostsController@show');
    Route::get('posts/{id}/tags', 'PostTagsController@index');

    Route::post('/newsletter-subscriptions', 'NewsletterSubscriptionsController@create');

    // Showcases
    Route::get('/showcases', 'Api\ShowcasesApiController@index');
    Route::post('/showcases', 'Api\ShowcasesApiController@create');
    Route::put('/showcases/{id}', 'Api\ShowcasesApiController@update');
    Route::get('/showcases/{id}', 'Api\ShowcasesApiController@edit');
    Route::delete('/showcases/{id}', 'Api\ShowcasesApiController@destroy');
    Route::get('/showcases', 'Api\ShowcasesApiController@index');
    Route::get('/showcases/publications/{showcaseId}', 'Api\ShowcasesApiController@show');
    Route::post('showcases/photo', 'ShowcaseImagesController@create');
    Route::get('showcases/{id}/tags', 'PostTagsController@index');

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
