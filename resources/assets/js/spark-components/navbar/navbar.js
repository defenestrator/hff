var base = require('navbar/navbar');

Vue.component('spark-navbar', {
    mixins: [base],
    methods: {
        /**
         * Show the user's notifications.
         */
        showNotifications() {
            Bus.$emit('showNotifications');
            this.has
        },


        /**
         * Show the customer support e-mail form.
         */
        showSupportForm() {
            Bus.$emit('showSupportForm');
        }
    }
});
