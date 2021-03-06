<?php

use Spatie\Sitemap\SitemapGenerator;
use Intervention\Image\Facades\Image;
use GuzzleHttp\Client;
use App\Transformers\Keywords;
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

Artisan::command('purgelog', function() {
    $f = @fopen(storage_path("logs/laravel.log"), "r+");
    if ($f !== false) {
        ftruncate($f, 0);
        fclose($f);
    }
})->describe('Clear application log at storage/logs/laravel.log');

Artisan::command('warmcache', function() {
    $this->comment('Warming Cache');
    shell_exec('wget -q https://hoboflyfishing.com/sitemap.xml --no-cache -O - | egrep -o "https://hoboflyfishing.com[^<]+" | wget --spider -i - --wait 1 &');
})->describe('Warm spatie responsecache');

Artisan::command('reheat', function() {
    $this->comment('Flushing Cache');
    Artisan::call('responsecache:flush');
    $this->comment('Warming Cache');
    Artisan::call('warmcache');
    $this->comment('Cache warmed');
})->describe('Flush and re-warm responsecache');

Artisan::command('sitemap', function () {
    $this->comment('Generating Sitemap');
    SitemapGenerator::create('https://hoboflyfishing.com')
        ->writeToFile(public_path('sitemap.xml'));
    $this->comment('Sitemap generated');
})->describe('Generate an updated sitemap for teh googlebots\' pleasure, slave.');

Artisan::command('keywords', function(Keywords $keywords) {
    $k = $keywords->generate();
    file_put_contents(public_path('keywords.txt'), $k);
    foreach($k as $z) {
        $this->comment($z);
    }
    return $k;
})->describe('Generate keywords for AdWords\' pleasure, slave.');