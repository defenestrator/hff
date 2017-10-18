<template>
    <form>
        <div class="input-group">
            <input class="form-control" placeholder="your email"
                   v-validate="'required|email'" v-model="email" name="email"
                   type="email"
                   :class="{'form-control': true, 'is-danger': errors.has('email') }"
                   value=""
                   aria-describedby="basic-addon2"
                   required>
                    <span class="input-group-btn">
                        <button class="btn btn-danger"
                                @click.prevent="signup"
                                type="submit"
                                role="button"
                                :disabled="errors.has('email')">
                            Ask!
                        </button>
                    </span>

        </div>
        <div style="padding:1em;"><span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span></div>
    </form>
</template>

<script>
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);
export default {
    name: 'sales-inquiry',
    validator: null,
    data() {
        return {
            email: '',
            message: 'Please contact this customer about Backcountry River Guides',
        }
    },
    methods: {
        signup() {
            this.validator.validateAll({
                  email: this.email
              })
                .then(result => {
                        axios.post(`/api/sales-inquiry`, {
                        email: this.email,
                        message: this.message
                    })
                    .then(result => {
                        swal({
                            title: 'Thanks for contacting us!',
                            text: 'Expect a response very soon!',
                            type: 'success',
                            timer: 3000
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