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
    mix.combine(
        [
            'public/js/app.js',
            './node_modules/trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js'
        ],
        'public/js/script.js'
    )
    .less('resources/assets/less/styles.less', 'public/css')





