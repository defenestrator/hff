<?php

use Spatie\Sitemap\SitemapGenerator;
use Intervention\Image\Facades\Image;
use GuzzleHttp\Client;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('purgelog', function(){
    $f = @fopen(storage_path("logs/laravel.log"), "r+");
    if ($f !== false) {
        ftruncate($f, 0);
        fclose($f);
    }
});

Artisan::command('warmcache', function(){
    $this->comment('Warming Cache');
    shell_exec('wget -q http://hoboflyfishing.com/sitemap.xml --no-cache -O - | egrep -o "https://hoboflyfishing.com[^<]+" | wget --spider -i - --wait 1 &');
});

Artisan::command('sitemap', function () {
    $this->comment('Generating Sitemap');
        SitemapGenerator::create('https://hoboflyfishing.com')->writeToFile(public_path('sitemap.xml'));
    $this->comment('Sitemap Generated!');
})->describe('Generate an updated sitemap for teh googlebots pleasure, slave.');
