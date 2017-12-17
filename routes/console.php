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

Artisan::command('s3-migration', function() {
    $this->comment('Mapping all images to S3, like a boss');
    DB::table('images')->update(['large' => DB::raw("REPLACE(large, 'https://hoboflyfishing.com/storage/images/', 'https://hobo-assets.s3-us-west-2.amazonaws.com/images/')")]);
    DB::table('images')->update(['thumbnail' => DB::raw("REPLACE(thumbnail, 'https://hoboflyfishing.com/storage/images/', 'https://hobo-assets.s3-us-west-2.amazonaws.com/images/')")]);
    DB::table('images')->update(['stamp' => DB::raw("REPLACE(stamp, 'https://hoboflyfishing.com/storage/images/', 'https://hobo-assets.s3-us-west-2.amazonaws.com/images/')")]);
    DB::table('posts')->update(['header_photo' => DB::raw("REPLACE(header_photo, 'https://hoboflyfishing.com/storage/images/', 'https://hobo-assets.s3-us-west-2.amazonaws.com/images/')")]);
    DB::table('showcases')->update(['thumbnail' => DB::raw("REPLACE(thumbnail, 'https://hoboflyfishing.com/storage/images/', 'https://hobo-assets.s3-us-west-2.amazonaws.com/images/')")]);
    DB::table('showcases')->update(['header_photo' => DB::raw("REPLACE(header_photo, 'https://hoboflyfishing.com/storage/images/', 'https://hobo-assets.s3-us-west-2.amazonaws.com/images/')")]);

})->describe('Map all images to S3, like a boss');
