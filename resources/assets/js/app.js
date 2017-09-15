
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
    mixins: [require('spark')]
})

