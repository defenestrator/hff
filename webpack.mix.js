let mix = require('laravel-mix');
var path = require('path');

const vendors = 'resources/assets/vendors/';
const resourcesAssets = 'resources/assets/';
const srcJs = resourcesAssets + 'js/';

const dest = 'public/assets/';
const destImages = dest + 'images/';
const destJs = dest + 'js/';
const destImg = dest + 'img/';
const destVendors= dest + 'vendors/';

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.less('resources/assets/less/app.less', 'public/css')
   .copy('node_modules/sweetalert/dist/sweetalert.min.js', 'public/js/sweetalert.min.js')
   .copy('node_modules/sweetalert/dist/sweetalert.css', 'public/css/sweetalert.css')
   .js('resources/assets/js/app.js', 'public/js')
   .webpackConfig({
        resolve: {
            modules: [
                path.resolve(__dirname, 'vendor/laravel/spark/resources/assets/js'),
                'node_modules'
            ],
            alias: {
                'vue$': 'vue/dist/vue.js'
            }
        }
   });

// Images
mix.copy(resourcesAssets + 'images', destImages, false);
mix.copy(resourcesAssets + 'img', destImg, false);
mix.copy( srcJs + 'livicons-1.4.min.js', destJs);
mix.copy( vendors + 'gmaps/gmaps.min.js', destJs);
mix.copy( srcJs + 'carousel.js', destJs);
mix.copy( srcJs + 'jquery.circliful.js', destJs);
mix.copy( vendors + 'wow/dist/' + 'wow.min.js',  destVendors + 'wow/js');
mix.combine(
    [
        vendors + 'raphael/raphael-min.js',
        srcJs + 'livicons-1.4.min.js',
        srcJs + 'josh_frontend.js'
    ], destJs + 'lib.js');