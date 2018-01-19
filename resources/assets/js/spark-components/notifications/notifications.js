var base = require('notifications/notifications');

Vue.component('spark-notifications', {
    props: ['notifications', 'hasUnreadAnnouncements', 'loadingNotifications'],
    mixins: [base],


});
