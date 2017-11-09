<?php

use Spatie\Sitemap\SitemapGenerator;
use Intervention\Image\Facades\Image;
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

//Artisan::command('image-processing', function() {
//    $this->comment('Resizing new images and pushing to DO spaces.');
//    resizing(public_path('images'));
//})->describe('Resize and store assets on DO object store');

//function resizing( $folder )
//{
//    foreach( scandir( $folder ) as $file )
//    {
//        $filepath = $folder . '/' . $file;
//
//        if( preg_match( '/^\./', $file ) ) continue; // not . and ..
//        if( is_dir( $filepath ) ) resizing( $filepath ); // Send it off to drill - with this function!!
//        // It's time to resize
//        echo($filepath . "\r\n");
//        $img = Image::make($filepath);
//        $img->resize(300, 200)->save(config('filesystems.cloud'));
//    };
//
//};