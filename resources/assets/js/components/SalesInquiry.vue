<template>
    <div>
            <h3 class="text-center" style="font-weight:600;">Contact Hobo Fly Fishing for details.</h3>
            <div class="input-group">
                <!--<span class="input-group-btn">-->
                        <!--<a @click.prevent="telephone" title="Give us a call, just click!">-->
                            <!--<button class="btn btn-warning" role="link" style="border:1px solid #535965; border-right:none; border-bottom-right-radius: 0; border-top-right-radius: 0;">-->
                                <!--<i data-name="phone" data-size="20" data-loop="true" data-c="#fff"-->
                                   <!--data-hc="#F0F8FF" class="livicon icon4 icon3" style="width: 20px; height: 20px;"></i>-->
                            <!--</button>-->
                        <!--</a>-->
                <!--</span>-->
                <input style="font-size:18px; border:1px solid #535965;"
                       @click="touched" class="form-control" placeholder="your email address"
                       v-validate="'required|email'"
                       v-model="email" name="email" id="newsletter-email"
                       type="email"
                       :class="{'form-control': true, 'is-danger': errors.has('email') }"
                       aria-describedby="basic-addon2">
                    <span class="input-group-btn">
                        <button style="border:1px solid #535965; border-left:none;"
                                :class="{'btn': true, 'btn-warning': true, 'is-danger': errors.has('email') }"
                                @click.prevent="signup"
                                type="submit"
                                role="button"
                                :disabled="errors.has('email')">
                            <i style="height:22px;" class="fa fa-envelope" aria-hidden="true"></i>
                        </button>
                    </span>

            </div>
        <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>
            <div style="font-weight:600;" class="text-center">or call <a href="tel:12088599133">1-208-859-9133</a>
            </div>
        <hr>
    </div>

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
            untouched: true
        }
    },
    methods: {
        telephone() {
            return window.location.href="tel:2088599133"
        },
        touched() {
           return this.untouched = false
        },
        signup() {
            const alertResponse = 'Thanks for your interest in ' + this.message
            if (this.untouched == true) {
                return window.location.href =  '/contact'
            }
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
                        return 'success'
                    })
                    .catch(error => {
                        this.error = true
                        swal({
                            title: 'Something went wrong',
                            text: 'Is that a valid email address?',
                            type: 'danger',
                            timer: 2000
                        });
                        return Promise.reject(error)
                    })
                .catch(error => {
                    this.error = true
                    swal({
                        title: 'Invalid email address',
                        text: 'Please enter a valid email address',
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
        newsletterEmail(value) {
            this.untouched(false)
            this.validator.validate('email', value);
        }
    },
}
</script>