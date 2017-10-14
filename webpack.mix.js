let mix = require('laravel-mix');
var path = require('path');
mix.less('resources/assets/less/app.less', 'public/css')
    .styles([
        './resources/assets/less/sweetalert2.min.css',
        './resources/assets/less/animate.min.css',
        './resources/assets/less/font-awesome.min.css'
    ], 'public/css/libs.css')
    .combine(['public/css/app.css','public/css/libs.css' ], 'storage/app/public/assets/css/styles.css')
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
    .js('./resources/assets/js/app.js', 'public/js/')
    .combine([
        './resources/assets/js/sweetalert.min.js',
        './resources/assets/js/raphael-min.js',
        './resources/assets/js/livicons-1.4.min.js',
        './resources/assets/js/wow.min.js',
        ],
        'public/js/hoboscript.js' )
    .combine([
        'public/js/app.js',
        'public/js/hoboscript.js',
        './node_modules/trumbowyg/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js',
        './node_modules/trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js',
        './node_modules/trumbowyg/dist/plugins/pasteimage/trumbowyg.pasteimage.min.js',
    ], './storage/app/public/assets/js/app.js')
    .copy([

    ], './storage/app/public/assets/js')
    .copy('resources/assets/images', 'storage/app/public/assets/images', false)
