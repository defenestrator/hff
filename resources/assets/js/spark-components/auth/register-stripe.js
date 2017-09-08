var base = require('auth/register-stripe');

Vue.component('spark-register-stripe', {
    mixins: [base],
    /**
     * The component's data.
     */
    data() {
        return {
            query: null,

            coupon: null,
            invalidCoupon: false,

            country: null,
            taxRate: 0,
            angler_registration: true,
            outfitter_registration: null,
            registerForm: $.extend(true, new SparkForm({
                stripe_token: '',
                plan: '',
                team: '',
                team_slug: '',
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                address: '',
                address_line_2: '',
                city: '',
                state: '',
                zip: '',
                country: 'US',
                vat_id: '',
                terms: false,
                coupon: null,
                invitation: null
            }), Spark.forms.register),

            cardForm: new SparkForm({
                name: '',
                number: '',
                cvc: '',
                month: '',
                year: '',
            })
        };
    },
    methods: {
        showAnglerRegistration() {
            this.angler_registration = true;
            this.outfitter_registration = false;
        },
        showOutfitterRegistration() {
            this.outfitter_registration = true;
            this.angler_registration = false;
        }
    }
});
