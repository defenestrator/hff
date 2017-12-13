
/*
 |--------------------------------------------------------------------------
 | Laravel Spark Components
 |--------------------------------------------------------------------------
 |
 | Here we will load the Spark components which makes up the core client
 | application. This is also a convenient spot for you to load all of
 | your components that you write while building your applications.
 */

//require('./home') keep this around to test when things go awry?

// Laravel Spark
require('./../spark-components/bootstrap')

// Internal CMS - Routes/Controllers should have Developer access only!
Vue.component('posts', require('./cms/Posts.vue'))
Vue.component('publications', require('./cms/Publications.vue'))
Vue.component('showcases', require('./cms/Showcases.vue'))
Vue.component('input-tag', require('./InputTag.vue'))
Vue.component('destinations', require('./cms/Destinations.vue'))
Vue.component('regions', require('./cms/Regions.vue'))
// Public "guest" components
Vue.component('public-footer', require('./PublicFooter.vue'))
Vue.component('sales-inquiry', require('./SalesInquiry.vue'))
