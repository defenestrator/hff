
/*
 |--------------------------------------------------------------------------
 | Laravel Spark Components
 |--------------------------------------------------------------------------
 |
 | Here we will load the Spark components which makes up the core client
 | application. This is also a convenient spot for you to load all of
 | your components that you write while building your applications.
 */

// Laravel Spark
require('./../spark-components/bootstrap').default
require('./profile/update-profile-details.js').default
// Internal CMS - Routes/Controllers should have Developer access only!
Vue.component('posts', require('./cms/Posts.vue').default)
Vue.component('newsletters', require('./cms/Newsletters.vue').default)
Vue.component('publications', require('./cms/Publications.vue').default)
Vue.component('showcases', require('./cms/Showcases.vue').default)
Vue.component('input-tag', require('./InputTag.vue').default)
Vue.component('destinations', require('./cms/Destinations.vue').default)
Vue.component('regions', require('./cms/Regions.vue').default)
// Public "guest" components
Vue.component('public-footer', require('./PublicFooter.vue').default)
Vue.component('sales-inquiry', require('./SalesInquiry.vue').default)
Vue.component('newsletter-signup', require('./NewsletterSignup.vue').default)
Vue.component('world-map', require('./WorldMap.vue').default)
Vue.component('site-search', require('./Search.vue').default)
Vue.component('fish-species', require('./cms/FishSpecies.vue').default)
