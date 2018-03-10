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
    Route::post('/deploy-HfDamFwqhXEUUsHg6t4L', 'DeploymentController@create');

    // Posts
    Route::get('/posts', 'Api\PostsApiController@index');
    Route::post('/posts', 'Api\PostsApiController@create');
    Route::put('/posts/{id}', 'Api\PostsApiController@update');
    Route::get('/posts/{id}', 'Api\PostsApiController@edit');
    Route::delete('/posts/{id}', 'Api\PostsApiController@destroy');
    Route::get('/posts/publications/{postId}', 'Api\PostsApiController@show');

    // Newsletters
    Route::get('/newsletters', 'Api\NewslettersApiController@index');
    Route::post('/newsletters', 'Api\NewslettersApiController@create');
    Route::put('/newsletters/{id}', 'Api\NewslettersApiController@update');
    Route::get('/newsletters/{id}', 'Api\NewslettersApiController@edit');
    Route::delete('/newsletters/{id}', 'Api\NewslettersApiController@destroy');
    Route::post('/newsletters/send/{id}', 'Api\NewslettersApiController@send');

    // Showcases
    Route::get('/showcases', 'Api\ShowcasesApiController@index');
    Route::post('/showcases', 'Api\ShowcasesApiController@create');
    Route::put('/showcases/{id}', 'Api\ShowcasesApiController@update');
    Route::get('/showcases/{id}', 'Api\ShowcasesApiController@edit');
    Route::delete('/showcases/{id}', 'Api\ShowcasesApiController@destroy');
    Route::get('/showcases', 'Api\ShowcasesApiController@index');
    Route::get('/showcases/publications/{showcaseId}', 'Api\ShowcasesApiController@show');

    // Tags
    Route::get('showcases/{id}/tags', 'ShowcaseTagsController@index');
    Route::get('posts/{id}/tags', 'PostTagsController@index');

    //Destinations
    Route::get('/destinations', 'Api\DestinationsApiController@index');
    Route::post('/destinations', 'Api\DestinationsApiController@create');
    Route::get('/destinations/{id}', 'Api\DestinationsApiController@edit');
    Route::put('/destinations/{id}', 'Api\DestinationsApiController@update');
    Route::delete('/destinations/{id}', 'Api\DestinationsApiController@destroy');

    //Regions
    Route::get('/regions', 'Api\RegionsApiController@index');
    Route::post('/regions', 'Api\RegionsApiController@create');
    Route::get('/regions/{id}', 'Api\RegionsApiController@edit');
    Route::put('/regions/{id}', 'Api\RegionsApiController@update');
    Route::delete('/regions/{id}', 'Api\RegionsApiController@destroy');

    // Images
    Route::post('/photo', 'ImagesController@header');

    // Publications
    Route::get('/publications', 'PublicationsController@get');
    Route::delete('/publications/showcase/{id}', 'PublicationsController@destroyByShowcaseId');
    Route::delete('/publications/post/{id}', 'PublicationsController@destroyByPostId');
    Route::post('/publications', 'PublicationsController@create');
    Route::delete('/publications/{id}', 'PublicationsController@destroy');
});

// Public
Route::group([
    'middleware' => 'api'
], function () {
    Route::post('/newsletter-subscriptions', 'NewsletterSubscriptionsController@create');
    Route::post('/sales-inquiry', 'SalesInquiryController@create');
    Route::get('/maps/destinations', 'Api\WorldMapApiController@index');
});
