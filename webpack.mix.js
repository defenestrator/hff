let mix = require('laravel-mix');
var path = require('path');

const vendors = 'resources/assets/vendors/';
const resourcesAssets = 'resources/assets/';
const srcCss = resourcesAssets + 'less/';
const srcJs = resourcesAssets + 'js/';

const dest = 'public/assets/';
const destImages = dest + 'images/';
const destCss = dest + 'css/';
const destJs = dest + 'js/';
const destImg = dest + 'img/';
const destVendors= dest + 'vendors/';

const paths = {
    'owlcarousel': vendors +'owl.carousel/owl-carousel/',
    'wow' : vendors + 'wow/dist/',
}
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

mix.copy(resourcesAssets + 'images', destImages, false);
mix.copy(resourcesAssets + 'img', destImg, false);

mix.combine(
    [
        srcCss + 'fonts.css',
        srcCss +  'font-awesome.min.css',
        srcCss +  'custom.css'
    ], destCss + 'lib.css');

mix.copy(paths.owlcarousel + 'owl.carousel.css',  destVendors + 'owl_carousel/css');
mix.copy(paths.owlcarousel + 'owl.theme.css',  destVendors + 'owl_carousel/css');
mix.copy(paths.owlcarousel + 'owl.transitions.css',  destVendors + 'owl_carousel/css');
mix.copy(paths.owlcarousel + 'owl.carousel.min.js',  destVendors + 'owl_carousel/js');

// default layout
mix.copy( srcCss + 'custom.css', destCss);

//mix.copy( srcJs + 'josh_frontend.js', destJs);
mix.copy( srcJs + 'livicons-1.4.min.js', destJs);

// index page
mix.copy( srcCss + 'tabbular.css', destCss);
mix.copy( srcCss + 'animate.min.css', destCss);
mix.copy( srcCss + 'jquery.circliful.css', destCss);

mix.copy( srcJs + 'carousel.js', destJs);
//mix.copy( srcJs + 'index.js', destJs);
mix.copy( srcJs + 'jquery.circliful.js', destJs);
mix.copy(paths.wow + 'wow.min.js',  destVendors + 'wow/js');
mix.combine(
    [
        vendors + 'raphael/raphael-min.js',
        srcJs + 'livicons-1.4.min.js',
        srcJs + 'josh_frontend.js'
    ], destJs + 'lib.js');