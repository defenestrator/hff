
/*
 |--------------------------------------------------------------------------
 | Laravel Spark Bootstrap
 |--------------------------------------------------------------------------
 |
 |
 */
require('spark-bootstrap');

require('./components/bootstrap');
//Vue.config.silent = true
var app = new Vue({
    mixins: [require('spark')],
    mounted() {
        // Async loading of external fonts.
        const mainFont = document.createElement('link');
        mainFont.href ='https://fonts.googleapis.com/css?family=Raleway:100,300,600';
        mainFont.rel = 'stylesheet';
        document.getElementsByTagName('head')[0].appendChild(link)
        // Async loading of css.
        const fa=document.createElement('link');
        fa.href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css';
        fa.rel='stylesheet';
        const swa=document.createElement('link');
        swa.href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.1/sweetalert2.min.css';
        swa.rel='stylesheet';
        document.getElementsByTagName('head')[0].appendChild(fa);
        document.getElementsByTagName('head')[0].appendChild(swa);
    }
})

