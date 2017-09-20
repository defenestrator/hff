
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
Vue.component('posts', require('./Posts.vue'))
Vue.component('podcasts', require('./Podcasts.vue'))
Vue.component('editor', require('./Editor.vue'))
Vue.component('input-tag', require('./InputTag.vue'))
Vue.component('newsletter-signup', require('./NewsletterSignup.vue'))
Vue.component('newsletter-signup-registration', require('./NewsletterSignupRegistration.vue'))
