<?php
// Blog Routes
Route::redirect('/publications/posts/steelhead-on-the-salmon-river-with-backcountry-river-guides-and-brent-sawyer',
    '/publications/posts/backcountry-river-guides-steelhead');
Route::redirect('/blog', '/publications/posts');
Route::redirect('/blogitem/tequila-and-popcorn', '/publications/posts/tequila-and-popcorn');
Route::redirect('/posts/tequila/mi', '/publications/posts/tequila-and-popcorn');
Route::redirect('/publications/posts/all-fish-lives-matter', '/publications/posts/any-fish-any-time');
Route::redirect('/publications/posts/test-header-photo', 'up-your-flyfishing-game-by-mastering-the-strip-strike');
// Showcases
Route::redirect('/publications/showcases', '/showcases');
Route::get('/publications/showcases/{slug}', 'PublishedShowcasesController@redirect');
Route::redirect('/showcases/-hidden-basin-kodiak-ak', '/showcases/hidden-basin-kodiak-ak');
Route::redirect('/showcases/looking-for-that-perfect-holiday-gift-', '/');
Route::redirect('/showcases/weekly-special', '/');

// Miscellaneous
Route::redirect('/publications/podcasts', 'https://have-rod-will-travel.fireside.fm/');
Route::redirect('/flats-special', '/showcases/costa-de-cocos');

// trips changed to destinations
Route::redirect('/trips/backcountry-river-guides', '/showcases/backcountry-river-guides');
Route::redirect('/trips/costa-de-cocos', '/showcases/costa-de-cocos');
Route::redirect('/trips/deep-creek-lodge', '/showcases/deep-creek-lodge');
Route::redirect('/trips/naknek-river-camp', '/showcases/naknek-river-camp');

// Features and Specials
Route::group(['prefix' => 'features'], function () {
    Route::redirect('/weekly-special', '/');
    Route::redirect('/flats-special', '/showcases/costa-de-cocos');
    Route::redirect('/alaska-special', '/showcases/naknek-river-camp');
    Route::redirect('/idaho-steelhead-special', '/showcases/backcountry-river-guides');
});

// 'destinations/lodge' changed to to 'destinations/region/lodge'
Route::redirect('/destinations/backcountry-river-guides', '/showcases/backcountry-river-guides');
Route::redirect('/destinations/costa-de-cocos', '/showcases/costa-de-cocos');
Route::redirect('/destinations/deep-creek-lodge', '/showcases/deep-creek-lodge');
Route::redirect('/destinations/naknek-river-camp', '/showcases/naknek-river-camp');
Route::redirect('/destinations/blackfish-lodge', '/showcases/blackfish-lodge');
Route::redirect('/destinations/two-boys-inn-andros', '/showcases/two-boys-inn');

Route::group(['prefix' => 'destinations'], function () {
    Route::redirect('/alaska/boardwalk-lodge', '/showcases/boardwalk-lodge-alaska');
    Route::redirect('/alaska/bristol-bay-sportfishing', '/showcases/bristol-bay-sportfishing');
    Route::redirect('/alaska/hidden-basin', '/showcases/hidden-basin-kodiak-ak');
    Route::redirect('/alaska/kvichak-lodge', '/showcases/kvichak-lodge');
    Route::redirect('/alaska/midnight-sun-trophy-pike', '/showcases/midnight-sun-trophy-pike-adventures');
    Route::redirect('/alaska/naknek-river-camp', '/showcases/naknek-river-camp');
    Route::redirect('/argentina/rio-manso-lodge', '/showcases/rio-manso-lodge-patagonia-argentina');
    Route::redirect('/australia/true-blue-bonefish', '/showcases/true-blue-bonefish-exmouth-western-australia');
    Route::redirect('/australia/wilderness-island', '/showcases/wilderness-island-western-australia');
    Route::redirect('/bahamas/big-charlie-andros', '/showcases/big-charlies-faitha-s-fishing-lodge');
    Route::redirect('/bahamas/swains-cay-lodge-andros', '/showcases/swains-cay-lodge-andros-island-bahamas');
    Route::redirect('/bahamas/tranquility-lodge-andros', '/showcases/tranquility-hill-lodge');
    Route::redirect('/bahamas/two-boys-inn-andros', '/showcases/two-boys-inn');
    Route::redirect('/baja/pursuit-anglers', '/showcases/pursuit-anglers-baja');
    Route::redirect('/belize/el-pescador', '/showcases/el-pescador');
    Route::redirect('/belize/mango-creek-lodge', '/showcases/mango-creek-lodge');
    Route::redirect('/belize/the-blue-bonefish', '/showcases/the-blue-bonefish');
    Route::redirect('/bolivia/pluma-lodge-untamed-angling', '/showcases/pluma-lodge-untamed-angling');
    Route::redirect('/british-columbia/deep-creek-lodge', '/showcases/deep-creek-lodge');
    Route::redirect('/british-columbia/blackfish-lodge', '/showcases/blackfish-lodge');
    Route::redirect('/christmas-island/ikari-house', '/showcases/ikari-house/christmas-island');
    Route::redirect('/costa-rica/bahia-rica', '/showcases/bahia-rica-costa-rica');
    Route::redirect('/costa-rica/silver-king-lodge', '/showcases/silver-king-lodge-costa-rica');
    Route::redirect('/showcases/costa-rica-roosterfish', '/showcases/bahia-rica-costa-rica');
    Route::redirect('/florida/bahia-honda-sporting-club', '/showcases/bahia-honda-sporting-club');
    Route::redirect('/idaho/backcountry-river-guides', '/showcases/backcountry-river-guides');
    Route::redirect('/labrador/fly-fishing-labrador', '/showcases/eagle-river-lodge-labrador');
    Route::redirect('/labrador/salmon-hole-lodge', '/showcases/salmon-hole-lodge');
    Route::redirect('/labrador/silver-bullet-lodge', '/');
    Route::redirect('/louisiana/drum-house', '/');
    Route::redirect('/new-zealand/stonefly-lodge', '/showcases/stonefly-lodge-south-island-nz');
    Route::redirect('/yucatan/costa-de-cocos', '/showcases/costa-de-cocos');
});

// Old Josh Template Redirects from google.
Route::redirect('/compareproducts', '/');
Route::redirect('/forgot-password', '/password/reset');
Route::redirect('/destinations/yucatan/da', '/regions/mexico');

