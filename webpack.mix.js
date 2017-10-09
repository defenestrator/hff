let mix = require('laravel-mix');
var path = require('path');

mix.less('resources/assets/less/app.less', 'public/css')
    .copy('./node_modules/trumbowyg/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js','public/js')
    .copy('./node_modules/trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js', 'public/js')
    .copy('./node_modules/trumbowyg/dist/plugins/pasteimage/trumbowyg.pasteimage.min.js','public/js' )
    .copy('resources/assets/images', 'public/assets/images', false)
    .styles([
        './resources/assets/less/sweetalert2.min.css',
        './resources/assets/less/animate.min.css',
        './resources/assets/less/font-awesome.min.css'
    ], 'public/css/libs.css')
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
   })
    .js('./resources/assets/js/app.js', 'public/js')
    .scripts([
        './resources/assets/js/sweetalert.min.js',
    ], 'public/js/libs.js');