let mix = require('laravel-mix');
var path = require('path');

mix.less('resources/assets/less/app.less', 'public/css')
   .js('./resources/assets/js/app.js', 'public/js')
   .styles([
        './resources/assets/less/sweetalert2.min.css',
        './resources/assets/less/animate.min.css',
        './resources/assets/less/font-awesome.min.css'
    ], 'public/css/libs.css')
    .scripts([
        './resources/assets/js/sweetalert.min.js',
        './resources/assets/js/raphael-min.js',
        './resources/assets/js/livicons-1.4.min.js'
    ], 'public/js/libs.js')
    .copy('./node_modules/trumbowyg/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js','public/js')
    .copy('./node_modules/trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js', 'public/js')
    .copy('./node_modules/trumbowyg/dist/plugins/pasteimage/trumbowyg.pasteimage.min.js','public/js' )
    .copy('resources/assets/images', 'public/assets/images', false)
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