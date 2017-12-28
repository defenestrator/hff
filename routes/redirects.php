<?php
use Illuminate\Support\Facades\Route;

// Redirected Blog Routes, 301
Route::redirect('/publications/posts/steelhead-on-the-salmon-river-with-backcountry-river-guides-and-brent-sawyer',
    '/publications/posts/backcountry-river-guides-steelhead');

// Redirected Static Trip Pages, 301
// features
Route::redirect('/publications/podcasts', 'https://have-rod-will-travel.fireside.fm/');
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

Route::group(['prefix' => 'destinations'], function () {
    // Alaska
    Route::redirect('/alaska/boardwalk-lodge', '/showcases/boardwalk-lodge-alaska');
    Route::redirect('/alaska/bristol-bay-sportfishing', '/showcases/bristol-bay-sportfishing');
    Route::redirect('/alaska/hidden-basin', '/showcases/-hidden-basin-kidiak-ak');
    Route::redirect('/alaska/kvichak-lodge', '/showcases/kvichak-lodge');
    Route::redirect('/alaska/midnight-sun-trophy-pike', '/showcases/midnight-sun-trophy-pike-adventures');
    Route::redirect('/alaska/naknek-river-camp', '/showcases/naknek-river-camp');

    // Argentina
    Route::redirect('/argentina/rio-manso-lodge', '/showcases/rio-manso-lodge-patagonia-argentina');

    // Australia
    Route::redirect('/australia/true-blue-bonefish', '/showcases/true-blue-bonefish-exmouth-western-australia');
    Route::redirect('/australia/wilderness-island', '/showcases/wilderness-island-western-australia');
    // Bahamas
    Route::redirect('/bahamas/big-charlie-andros', '/showcases/big-charlies-faitha-s-fishing-lodge');
    Route::redirect('/bahamas/swains-cay-lodge-andros', '/showcases/swains-cay-lodge-andros-island-bahamas');
    Route::redirect('/bahamas/tranquility-lodge-andros', '/showcases/tranquility-hill-lodge');
    Route::redirect('/bahamas/two-boys-inn-andros', '/showcases/two-boys-inn');

    // Baja
    Route::redirect('/baja/pursuit-anglers', '/showcases/pursuit-anglers-baja');

    // Belize
    Route::redirect('/belize/el-pescador', '/showcases/el-pescador');
    Route::redirect('/belize/mango-creek-lodge', '/showcases/mango-creek-lodge');
    Route::redirect('/belize/the-blue-bonefish', '/showcases/the-blue-bonefish');

    // Bolivia
    Route::redirect('/bolivia/pluma-lodge-untamed-angling', '/showcases/pluma-lodge-untamed-angling');

    // British Columbia, Canada
    Route::redirect('/british-columbia/deep-creek-lodge', '/showcases/deep-creek-lodge');
    Route::redirect('/british-columbia/blackfish-lodge', '/showcases/blackfish-lodge');

    // Christmas Island
    Route::redirect('/christmas-island/ikari-house', '/showcases/ikari-house/christmas-island');

    // Costa Rica
    Route::redirect('/costa-rica/bahia-rica', '/showcases/bahia-rica-costa-rica');
    Route::redirect('/costa-rica/silver-king-lodge', '/showcases/silver-king-lodge-costa-rica');

    // Florida
    Route::redirect('/florida/bahia-honda-sporting-club', '/showcases/bahia-honda-sporting-club');

    // Idaho
    Route::redirect('/idaho/backcountry-river-guides', '/showcases/backcountry-river-guides');

    // Labrador & Newfoundland Region, Canada
    Route::redirect('/labrador/fly-fishing-labrador', '/showcases/eagle-river-lodge-labrador');
    Route::redirect('/labrador/salmon-hole-lodge', '/showcases/salmon-hole-lodge');
    Route::redirect('/labrador/silver-bullet-lodge', '/');

    // Louisiana
    Route::redirect('/louisiana/drum-house', '/');

    // New Zealand
    Route::redirect('/new-zealand/stonefly-lodge', '/showcases/stonefly-lodge-south-island-nz');

    // Yucatan, MX
    Route::redirect('/yucatan/costa-de-cocos', '/showcases/costa-de-cocos');
});