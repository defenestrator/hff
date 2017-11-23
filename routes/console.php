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

Artisan::command('sitemap', function () {
    $this->comment('Generating Sitemap');
        SitemapGenerator::create('https://hoboflyfishing.com')->writeToFile(public_path('sitemap.xml'));
    $this->comment('Sitemap Generated!');
})->describe('Generate an updated sitemap for teh googlebots pleasure, slave.');

Artisan::command('image-processing', function() {
    $this->comment('Resize and store images');

})->describe('Resize and store images');
