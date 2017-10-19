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
                        <button :class="{'btn': true, 'btn-danger': true, 'is-danger': errors.has('email') }"
                                @click.prevent="signup"
                                type="submit"
                                role="button"
                                :disabled="errors.has('email')">
                            Fish On!
                        </button>
                    </span>

        </div>
        <div style="min-height:24px;"><span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span></div>
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
            message: document.title,
        }
    },
    methods: {

        signup() {
            const alertResponse = 'Thanks for your interest in ' + this.message
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
                            title: alertResponse,
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