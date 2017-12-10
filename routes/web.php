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
// Destinations
Route::group(['prefix' => 'destinations'], function () {
    // Alaska
    Route::view('/alaska/boardwalk-lodge', 'destinations.boardwalk-lodge')->name('boardwalk-lodge');
    Route::view('/alaska/bristol-bay-sportfishing', 'destinations.bristol-bay-sportfishing')->name('bristol-bay-sportfishing');
    Route::view('/alaska/hidden-basin', 'destinations.hidden-basin')->name('hidden-basin');
    Route::view('/alaska/kvichak-lodge', 'destinations.kvichak-lodge')->name('kvichak-lodge');
    Route::view('/alaska/midnight-sun-trophy-pike', 'destinations.midnight-sun-trophy-pike')->name('midnight-sun-trophy-pike');
    Route::view('/alaska/naknek-river-camp', 'destinations.naknek-river-camp')->name('naknek-river-camp');

    // Argentina
    Route::view('/argentina/rio-manso-lodge', 'destinations.rio-manso-lodge')->name('rio-manso-lodge');

    // Australia
    Route::view('/australia/true-blue-bonefish', 'destinations.true-blue-bonefish')->name('true-blue-bonefish');
    Route::view('/australia/wilderness-island', 'destinations.wilderness-island')->name('wilderness-island');
    // Bahamas
    Route::view('/bahamas/big-charlie-andros', 'destinations.big-charlie-andros')->name('big-charlie-andros');
    Route::view('/bahamas/swains-cay-lodge-andros', 'destinations.swains-cay-lodge-andros')->name('swains-cay-lodge-andros');
    Route::view('/bahamas/tranquility-lodge-andros', 'destinations.tranquility-lodge-andros')->name('tranquility-lodge-andros');
    Route::view('/bahamas/two-boys-inn-andros', 'destinations.two-boys-inn-andros')->name('two-boys-inn-andros');

    // Baja
    Route::view('/baja/pursuit-anglers', 'destinations.pursuit-anglers')->name('pursuit-anglers');

    // Belize
    Route::view('/belize/el-pescador', 'destinations.el-pescador')->name('el-pescador');
    Route::view('/belize/mango-creek-lodge', 'destinations.mango-creek-lodge')->name('mango-creek-lodge');
    Route::view('/belize/the-blue-bonefish', 'destinations.the-blue-bonefish')->name('the-blue-bonefish');

    // Bolivia
    Route::view('/bolivia/pluma-lodge-untamed-angling', 'destinations.pluma-lodge-untamed-angling')->name('pluma-lodge-untamed-angling');

    // British Columbia, Canada
    Route::view('/british-columbia/deep-creek-lodge', 'destinations.deep-creek-lodge')->name('deep-creek-lodge');
    Route::view('/british-columbia/blackfish-lodge', 'destinations.blackfish-lodge')->name('blackfish-lodge');

    // Christmas Island
    Route::view('/christmas-island/ikari-house', 'destinations.ikari-house')->name('ikari-house');

    // Costa Rica
    Route::view('/costa-rica/bahia-rica', 'destinations.bahia-rica')->name('bahia-rica');
    Route::view('/costa-rica/silver-king-lodge', 'destinations.silver-king-lodge')->name('silver-king-lodge');

    // Florida
    Route::view('/florida/bahia-honda-sporting-club', 'destinations.bahia-honda-sporting-club')->name('bahia-honda-sporting-club');

    // Idaho
    Route::view('/idaho/backcountry-river-guides', 'destinations.backcountry-river-guides')->name('backcountry-river-guides');

    // Labrador & Newfoundland Region, Canada
    Route::view('/labrador/fly-fishing-labrador', 'destinations.fly-fishing-labrador')->name('fly-fishing-labrador');
    Route::view('/labrador/salmon-hole-lodge', 'destinations.salmon-hole-lodge')->name('salmon-hole-lodge');
    Route::view('/labrador/silver-bullet-lodge', 'destinations.silver-bullet-lodge')->name('silver-bullet-lodge');

    // Louisiana
    Route::view('/louisiana/drum-house', 'destinations.drum-house')->name('drum-house');

    // New Zealand
    Route::view('/new-zealand/stonefly-lodge', 'destinations.stonefly-lodge')->name('stonefly-lodge');

    // Yucatan, MX
    Route::view('/yucatan/costa-de-cocos', 'destinations.costa-de-cocos')->name('costa-de-cocos');
});

// Published posts
Route::get('/publications/posts', 'PublishedPostsController@index')->name('publications.posts.index');
Route::get('/publications/posts/{slug}', 'PublishedPostsController@show')->name('publications.posts.show');
Route::get('/publications/showcases', 'ShowcasesController@list');
Route::get('/publications/showcases/{slug}', 'PublishedShowcasesController@show');
Route::get('/posts/{tag}/tag', 'PostTagsController@index');
Route::get('/showcases/{tag}/tag', 'ShowcaseTagsController@index');


// LOADER.IO AUTHENTICATION
Route::view('/loaderio-f9078dd3e7e9c306ca90d525395dc64b', 'loader-io');
Route::group(['middleware' => ['auth:web']], function () {
    Route::view('/dashboard', 'dashboard');
});
// DEVELOPER LEVEL AUTH ROUTES
Route::group(['middleware' => ['auth:web', 'dev']], function () {
    // Tags
    Route::get('/posts/{id}/tags', 'PostTagsController@edit');
    Route::get('/showcases/{id}/tags', 'ShowcaseTagsController@edit');
    // Dashboard

    // CMS ROUTES
    Route::group(['middleware' => [], 'prefix' => 'cms'], function () {
        //Publications
        Route::get('/publications', 'PublicationsController@index');
        // Posts
        Route::view('/posts', 'cms.posts');
        Route::post('/posts/images', 'ImagesController@wysiwyg');
        Route::post('/images', 'ImagesController@wysiwyg');
        // Showcases
        Route::get('/showcases', 'ShowcasesController@create');
        // Destinations
        Route::view('/destinations', 'cms.destinations');
    });
});

// Confirm Newsletter Subscription
Route::get('/newsletter-subscription/{token}', 'NewsletterSubscriptionsController@confirm');

