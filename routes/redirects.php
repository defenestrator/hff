<?php
use Illuminate\Support\Facades\Route;

// Redirected Blog Routes, 301
Route::redirect('/publications/posts/steelhead-on-the-salmon-river-with-backcountry-river-guides-and-brent-sawyer',
    '/publications/posts/backcountry-river-guides-steelhead');

// Redirected Static Trip Pages, 301
    // features
    Route::redirect('/publications/podcasts', 'https://have-rod-will-travel.fireside.fm/')->name('podredirect');
    Route::redirect('/flats-special', '/features/flats-special');
    Route::redirect('/showcases/weekly-special', '/showcases/costa-rica-roosterfish');
    // trips changed to destinations
    Route::redirect('/trips/backcountry-river-guides', '/destinations/idaho/backcountry-river-guides');
    Route::redirect('/trips/costa-de-cocos', '/destinations/yucatan/costa-de-cocos');
    Route::redirect('/trips/deep-creek-lodge', '/destinations/british-columbia/deep-creek-lodge');
    Route::redirect('/trips/naknek-river-camp', '/destinations/alaska/naknek-river-camp');
    Route::redirect('/features/weekly-special', '/');
    // 'destinations/lodge' changed to to 'destinations/region/lodge'
    Route::redirect('/destinations/backcountry-river-guides', '/destinations/idaho/backcountry-river-guides');
    Route::redirect('/destinations/costa-de-cocos', '/destinations/yucatan/costa-de-cocos');
    Route::redirect('/destinations/deep-creek-lodge', '/destinations/british-columbia/deep-creek-lodge');
    Route::redirect('/destinations/naknek-river-camp', '/destinations/alaska/naknek-river-camp');
    Route::redirect('/destinations/blackfish-lodge', '/destinations/british-columbia/blackfish-lodge');
    Route::redirect('/destinations/two-boys-inn-andros', '/destinations/bahamas/two-boys-inn-andros');

    Route::redirect('/showcases/looking-for-that-perfect-holiday-gift-', '/');