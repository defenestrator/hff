<template>
    <div>
        <p class="text-center">Get exclusive offers with our monthly newsletter</p>
        <form>
            <div class="input-group">
                <input style="font-size:18px;"class="form-control" placeholder="your email"
                       v-validate="'required|email'" v-model="email" name="newsletter-email"
                       type="email"
                       :class="{'form-control': true, 'is-danger': errors.has('newsletter-email') }"
                       aria-describedby="basic-addon2" required>
                    <span class="input-group-btn">
                        <button :class="{'btn': true, 'btn-primary': true, 'is-danger': errors.has('newsletter-email') }"
                                @click.prevent="signup"
                                type="submit"
                                style="font-size:18px;"
                                role="button"
                                :disabled="email == '' || errors.has('newsletter-email')">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </button>
                    </span>

            </div>
            <div style="min-height:24px;">
                <span v-show="errors.has('newsletter-email')" class="help is-danger">{{ errors.first('newsletter-email') }}</span>
            </div>
        </form>
    </div>
</template>

<script>
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);
export default {
    name: 'newsletter-signup',
    data() {
        return {
            email: ''
        }
    },
    mounted() {
    },
    methods: {
        signup() {
            this.validator.validateAll({
                  email: this.email
              })
                .then(result => {
                        axios.post(`/api/newsletter-subscriptions`, {
                        email: this.email
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
                            title: 'Something\'s not right',
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
    },
    watch: {
        email(value) {
            this.validator.validate('email', value);
        }
    }
}
</script>