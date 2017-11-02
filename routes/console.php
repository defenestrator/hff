<?php

use Illuminate\Foundation\Inspiring;
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

//Artisan::command('inspire', function () {
//    $this->comment(Inspiring::quote());
//})->describe('Display an inspiring quote');
//
//Artisan::command('image-processing', function() {
//    $path = '/public/images/';
//    if ($handle = opendir($path)) {
//        while (false !== ($file = readdir($handle))) {
//            if ('.' === $file) {
//                continue;
//            }
//            if ('..' === $file) {
//                continue;
//            }
//            Image::make()->resize(300, 200)->save(config('filesystems.disks.DO' . 'images/'));
//        }
//        closedir($handle);
//    };
//
//    $this->comment('Resizing new images and pushing to DO spaces.')->describe('Resize and store assets on object store');
//});