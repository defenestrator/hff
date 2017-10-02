
/*
 |--------------------------------------------------------------------------
 | Laravel Spark Bootstrap
 |--------------------------------------------------------------------------
 |
 |
 */
require('spark-bootstrap');
import VueCarousel from 'vue-carousel';
Vue.use(VueCarousel);
require('./components/bootstrap');
//Vue.config.silent = true
var app = new Vue({
    mixins: [require('spark')],
    mounted() {
        // Async loading of external fonts.
        link=document.createElement('link');
        link.href='https://fonts.googleapis.com/css?family=Raleway:100,300,600';
        link.rel='stylesheet';
        document.getElementsByTagName('head')[0].appendChild(link)
    }
})

