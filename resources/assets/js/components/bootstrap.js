
/*
 |--------------------------------------------------------------------------
 | Laravel Spark Components
 |--------------------------------------------------------------------------
 |
 | Here we will load the Spark components which makes up the core client
 | application. This is also a convenient spot for you to load all of
 | your components that you write while building your applications.
 */

require('./../spark-components/bootstrap')
require('./home')
require('./cms/showcases/create-showcase')
Vue.component('posts', require('./Posts.vue'))
Vue.component('input-tag', require('./InputTag.vue'))
Vue.component('public-footer', require('./PublicFooter.vue'))
Vue.component('newsletter-signup-registration', require('./NewsletterSignupRegistration.vue'))
Vue.component('sales-inquiry', require('./SalesInquiry.vue'))

