let mix = require('laravel-mix');
var path = require('path');
mix.webpackConfig({
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
            './node_modules/trumbowyg/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js',
            './node_modules/trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js',
            './node_modules/trumbowyg/dist/plugins/pasteimage/trumbowyg.pasteimage.min.js',
        ],
        'public/js/hoboscript.js' )
    mix.less('resources/assets/less/app.less', 'public/css')
        .styles([
            './resources/assets/less/sweetalert2.min.css',
            './resources/assets/less/animate.min.css',
        ], 'public/css/libs.css')
    mix.copy('resources/assets/images', 'public/images', false)
    if(process.env.APP_ENV === "production"){
        mix.combine(['public/js/app.js','public/js/hoboscript.js'], 'public/js/script.js').version()
        mix.combine(['public/css/app.css','public/css/libs.css' ], 'public/css/styles.css').version()
    } else {
        mix.combine(['public/js/app.js','public/js/hoboscript.js'], 'public/js/script.js')
        mix.combine(['public/css/app.css','public/css/libs.css' ], 'public/css/styles.css')
    }





