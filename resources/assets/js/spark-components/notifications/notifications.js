var base = require('notifications/notifications');

Vue.component('spark-notifications', {
    props: ['notifications', 'hasUnreadAnnouncements', 'loadingNotifications'],
    mixins: [base],

    /**
     * The component's data.
     */
    data() {
        return {
            showingNotifications: false,
            showingAnnouncements: true
        }
    },


    methods: {
        /**
         * Show the user notifications.
         */
        showNotifications() {
            this.showingNotifications = true;
            this.showingAnnouncements = false;
        },


        /**
         * Show the product announcements.
         */
        showAnnouncements() {
            this.showingNotifications = false;
            this.showingAnnouncements = true;

            this.updateLastReadAnnouncementsTimestamp();
        },


        /**
         * Update the last read announcements timestamp.
         */
        updateLastReadAnnouncementsTimestamp() {
            axios.put('/user/last-read-announcements-at')
                .then(() => {
                    Bus.$emit('updateUser');
                });
        }
    },


    computed: {
        /**
         * Get the active notifications or announcements.
         */
        activeNotifications() {
            if ( ! this.notifications) {
                return [];
            }

            if (this.showingNotifications) {
                return this.notifications.notifications;
            } else {
                return this.notifications.announcements;
            }
        },


        /**
         * Determine if the user has any notifications.
         */
        hasNotifications() {
            return this.notifications && this.notifications.notifications.length > 0;
        },


        /**
         * Determine if the user has any announcements.
         */
        hasAnnouncements() {
            return this.notifications && this.notifications.announcements.length > 0;
        }
    }
});
