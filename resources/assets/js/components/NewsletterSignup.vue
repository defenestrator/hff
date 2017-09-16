<template>
    <div>
        <a href="#newsletter"><h4>Newsletter</h4></a>
        <p>Get special deals and exclusive trip packages. We only send about one email per month.</p>
        <form class="form-inline newsletter">
            <div class="form-group">
                <input v-validate="'required|email'" v-model="newsletterEmail" name="newsletterEmail"
                       type="email"
                       :class="{'form-control': true, 'input-lg': true, 'is-danger': errors.has('email') }"
                       placeholder="your email"
                       value=""
                       aria-describedby="basic-addon2"
                       required
                >
                <button @click.prevent="signup" type="submit" class="btn btn-primary btn-lg" role="button" :disabled="errors.has('email')">Go</button>
                <div style="padding:1em;"><span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span></div>
            </div>
        </form>
    </div>
</template>

<script>
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);
export default {
    validator: null,
    data() {
        return {
            newsletterEmail: ''
        }
    },
    mounted() {
        console.log('Newsletter Subscription Component mounted.')
    },
    methods: {
        signup() {
            this.validator.validateAll({
                  email: this.newsletterEmail
              })
                .then(result => {
                        axios.post(`/api/newsletter-subscriptions`, {
                        email: this.newsletterEmail
                    })
                    .then(result => {
                        swal({
                            title: 'Thanks for signing up!',
                            text: 'We promise not to spam you.',
                            type: 'success',
                            timer: 2000
                        });
                        return result
                    })
                    .catch(error => {
                        this.error = true
                        swal({
                            title: 'Something\'s fucky',
                            text: 'Something went wrong.',
                            type: 'danger',
                            timer: 2000
                        });
                        return Promise.reject(error)
                    })
                .catch(error => {
                    this.error = true
                    swal({
                        title: 'Something\'s fucky',
                        text: 'Something went wrong.',
                        type: 'danger',
                        timer: 2000
                    });
                  return Promise.reject(error)
                })
            })
        }
    },
    created() {
        this.validator = new VeeValidate.Validator({
            email: 'required|email'
        });
        if (this.validator.errors) {
            this.$set(this, 'errors', this.validator.errors)
        }
    },
    watch: {
        newsletterEmail(value) {
            this.validator.validate('email', value);
        }
    },
}

</script>