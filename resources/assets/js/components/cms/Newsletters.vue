<template>
<div class="row">
    <div class="container">
        <h2>Be careful not to email them too often!</h2>
        <button @click.prevent="toggleIndex" id="create" class="btn btn-create">
            <span v-if="index">Write</span>
            <span v-if="! index">Index</span>
        </button>
        <div v-show="! index">
            <button @click.prevent="createNewNewsletter" class="btn btn-primary" :disabled="! newNewsletter.subject">
                New
            </button>
        </div>
        <table v-show="index" class="table table-striped table-inverse">
            <thead class="thead-inverse">
            <tr>
                <th>Subject</th>
                <th>Sent On</th>
                <th> </th>
            </tr>
            </thead>
            <tbody class="resource-list">
            <tr v-for="newsletter in newsletters" class="table-hover">
                <td><strong>{{ newsletter.subject }}</strong></td>
                <td v-if="newsletter.sent_on">{{newsletter.sent_on}}</td>
                <td v-else>Not yet!</td>
                <td><button @click.prevent="(edit(newsletter.id))"role="button" class="btn btn-warning" :disabled="newsletter.sent_on">Edit</button></td>
            </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="container">
        <form class="form-horizontal new-newsletter" v-if="! index" role="form">
            <div class="form-group">
                <div class="col-md-12">
                    <label for="subject"><p>Subject:</p></label>
                    <input v-validate="'required|min:3|max:140'" id="subject" name="subject" v-model="newNewsletter.subject" :class="{'form-control': true, 'input': true, 'is-danger': errors.has('subject') }" type="text" placeholder="Newsletter Title" style="width:100%">
                    <span v-show="errors.has('subject')" class="help is-danger">{{ errors.first('subject') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <p>Body:</p>
                    <trumbowyg id="trumbowyg" :config="trumbowygConfig" name="body" v-validate="'required|min:16'" v-model="newNewsletter.body"></trumbowyg>
                    <span v-show="errors.has('body')" class="help is-danger">{{ errors.first('body') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div v-show="newNewsletter.newsletterId" class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newNewsletter.saveError }" @click.prevent="update" :disabled="newNewsletter.saveDisabled">
                            <span v-if="newNewsletter.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Updating
                             </span>
                            <span v-else-if="newNewsletter.saved">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                        <span v-else-if="newNewsletter.saved == false">
                                <i class="fa fa-btn fa-check-circle"></i>Update
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Updated
                            </span>

                    </button>
                </div>
                <div v-show="! newNewsletter.newsletterId" class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newNewsletter.saveError }" @click.prevent="save" :disabled="newNewsletter.saveDisabled">
                            <span v-if="newNewsletter.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Saving
                             </span>
                            <span v-else-if="newNewsletter.newsletterId !== null">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Save
                            </span>
                    </button>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-warning': true, 'is-success': newNewsletter.sent_on }"  @click.prevent="send" :disabled="newNewsletter.sent_on || ! newNewsletter.newsletterId">
                        <span v-if="newNewsletter.sendBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Sending
                             </span>
                             <span class="is-success" v-else-if="newNewsletter.sent_on !== null">
                                <i class="fa fa-btn btn-success fa-newspaper-o"></i>Sent!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-newspaper-o"></i>Send
                            </span>
                    </button>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button class="btn btn-default"  @click.prevent="preview" :disabled="! newNewsletter.newsletterId">
                        <i class="fa fa-btn fa-newspaper-o"></i>Preview
                    </button>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button @click.prevent="leeroyjenkins" :class="{'btn': true, 'btn-danger': true }" :disabled="! newNewsletter.newsletterId">
                        Delete
                    </button>
                </div>
            </div>
        </form>
    </div>
    <hr>
</div>
</template>

<script>
"use strict"
// Import this component
import trumbowyg from 'vue-trumbowyg';

// Import editor css
import 'trumbowyg/dist/ui/trumbowyg.css';

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);
export default {
    props: ['user'],
    validator: null,
    mounted() {
        this.getIndex()
    },
    components: {
        trumbowyg
    },
    data() {
        return {
            index: true,
            newsletters: [],
            newNewsletter: new SparkForm ({
                subject: '',
                body: '',
                sent_on: null,
                newsletterId: null,
                saveDisabled: false,
                saveBusy: false,
                saveError: false,
                saved: false,
                serverErrors: null,
                errors: null
            }),
            trumbowygConfig: {
                id: 'trumbowyg',
                autogrowOnEnter: true,
                btnsDef: {
                    // Customizables dropdowns
                    image: {
                        dropdown: ['insertImage', 'upload'],
                        ico: 'insertImage'
                    }
                },
                btns: [
                    ['viewHTML'],
                    ['formatting'],
                    ['strong', 'em', 'underline'],
                    ['link'],
                    ['image'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                    ['unorderedList', 'orderedList'],
                    ['horizontalRule'],
                    ['removeformat']
                ],
                plugins: {
                    upload: {
                        serverPath: '/cms/images',
                        fileFieldName: 'image',
                        urlPropertyName: 'large',
                        headers: {
                            'X-CSRF-TOKEN': Spark.csrfToken
                        },
                        xhrFields: {}
                    },
                }
            }
        }
    },
    watch: {
        subject(value) {
            this.validator.validate('subject', value);
        },
        body(value) {
            this.validator.validate('body', value);
        },
        /**
            * Watch the subject and create slug.
        */
        'newNewsletter.subject': function (val, oldVal) {
            this.newNewsletter.serverErrors = null
            this.newNewsletter.saved = false
            this.newNewsletter.saveDisabled = false
        },
        'newNewsletter.body': function (val, oldVal) {
            this.newNewsletter.saved = false
            this.newNewsletter.saveDisabled = false
        }
    },
    methods: {
        getIndex() {
            axios.get(`/api/newsletters`, {})
            .then(result  => {
                this.newsletters = result.data.data
                return this.newsletters
            })
            .catch(error => {
                return Promise.reject(error)
            })
        },
        preview() {
            window.open('/cms/preview/newsletter/'+ this.newNewsletter.newsletterId, '_blank')
        },
        toggleIndex() {
            if(this.index == true) {
                return this.index = false
            }
            this.getIndex()
            return this.index = true
        },

        save() {
            this.newNewsletter.saveError = false
            this.newNewsletter.saveBusy = true
            this.validator.validateAll({
                subject: this.newNewsletter.subject,
                body: this.newNewsletter.body,
                }).then((result) => {
                    axios.post(`/api/newsletters`, {
                                subject: this.newNewsletter.subject,
                                body:  this.newNewsletter.body
                            })
                            .then(result  => {
                                this.newNewsletter.saveDisabled = true
                                this.newNewsletter.saveBusy = false
                                this.newNewsletter.saved= true
                                this.newNewsletter.newsletterId = result.data.id
                                this.newNewsletter.sent_on = result.data.sent_on
                             return result
                            })
                            .catch(error => {
                                this.newNewsletter.saveError = true
                                this.newNewsletter.saveBusy = false
                                this.newNewsletter.serverErrors = error.response.data.errors.slug[0]
                                return Promise.reject(error)
                            })
                        })
            .catch(error => {
                this.newNewsletter.saveBusy = false
                this.newNewsletter.saveError = true
                this.errors = Promise.reject(error)
                return Promise.reject(error)
            })
        },

        send() {
            this.newNewsletter.sendBusy = true
            if (this.newNewsletter.newsletterId === null) {
                this.newNewsletter.sendBusy = false
                this.save()
                return
            }
            this.update()
            if (confirm('Are you sure you want to send this email to all Hobo Fly Fishing Newsletter Subscribers?')) {
                axios.post(`/api/newsletters/send/` +this.newNewsletter.newsletterId, {})
                .then(result  => {
                    this.newNewsletter.sendBusy = false
                    this.newNewsletter.sent_on = result.data.sent_on
                    this.newNewsletter.sent = true
                    this.clear()
                    this.toggleIndex()
                    return result
                })
                .catch(error => {
                    this.newNewsletter.sendBusy = false
                    return Promise.reject(error)
                })
            }
            this.newNewsletter.sendBusy = false
        },
        update() {
            this.newNewsletter.saveError = false
            this.newNewsletter.saveBusy = true
            this.newNewsletter.saveDisabled = true
            this.validator.validateAll({
                subject: this.newNewsletter.subject,
                body: this.newNewsletter.body
                }).then((result) => {
                    axios.put(`/api/newsletters/` + this.newNewsletter.newsletterId, {
                        subject: this.newNewsletter.subject,
                        body:  this.newNewsletter.body
                    })
                    .then(result  => {
                        this.newNewsletter.saveBusy = false
                        this.newNewsletter.saved = true
                        return result
                    })
                    .catch(error => {
                        this.newNewsletter.saveError = true
                        this.newNewsletter.saveBusy = false
                        this.newNewsletter.serverErrors = error.response.data.errors.slug[0]
                        return Promise.reject(error)
                    })
            })
            .catch(error => {
                this.newNewsletter.saveBusy = false
                this.newNewsletter.saveError = true
                return Promise.reject(error)
            })
        },

        leeroyjenkins() {
            if(confirm("Permanently destroy this newsletter?")) {
                axios.delete(`/api/newsletters/` + this.newNewsletter.newsletterId, {})
                .then(result  => {
                    this.clear()
                })
                .catch(error => {
                    return Promise.reject(error)
                });
            }
        },
        createNewNewsletter() {
            if (!this.newNewsletter.newsletterId) {
                if (confirm('Abandon this newsletter and start over?')) {
                    this.clear()
                }
                } else {
                    this.clear()
                }
        },
        clear() {
            this.newNewsletter.saved = false
            this.newNewsletter.saveBusy = false
            this.newNewsletter.saveDisabled = false
            this.newNewsletter.sendBusy = false
            this.newNewsletter.sent = null
            this.newNewsletter.sent_on = null
            this.newNewsletter.newsletterId = null
            this.newNewsletter.subject = ''
            this.newNewsletter.body = ''
        },
        edit(id){
            this.newNewsletter.saveDisabled = true
            this.saveBusy = true
            this.index = false
            this.newNewsletter.newsletterId = id
            axios.get(`/api/newsletters/`+ id , {})
            .then(result => {
                this.newNewsletter.subject = result.data.subject
                this.newNewsletter.body = result.data.body;
                this.newNewsletter.newsletterId = result.data.id;
                this.saveBusy = false
                this.newNewsletter.saved = true
                this.newNewsletter.saveDisabled = true
                return result.data
                })
            .catch(error => {
                return Promise.reject(error)
            })
        },
    },
    created() {
        this.validator = new VeeValidate.Validator({
            subject: 'required|min:2',
            body: 'required|min:40'
        });
    }
}
</script>
<style>
    .btn-warning.disabled:hover, .btn-warning[disabled]:hover, fieldset[disabled] .btn:hover, .btn.disabled:focus, .btn[disabled]:focus, fieldset[disabled] .btn:focus{
        background-color:#cbb956 !important;
    }
    .help.is-danger {
    color : #ef6f6c;
    }
    .btn.is-danger {
    border-color: #ef6f6c;
    outline: 0;
    box-shadow: inset 0 0 2px red, 0 0 4px red;
    }
    .btn.btn-warning.is-success {
    border-color: #0A8A4A;
    outline: 0;
    box-shadow: inset 0 0 2px #0A8A4A, 0 0 4px #0A8A4A;
    background-color:transparent;
    color: #0A8A4A;
    }
    .btn-warning.disabled:hover, .btn-warning[disabled]:hover,
    fieldset[disabled] .btn:hover,
    .btn.disabled:focus, .btn[disabled]:focus,
    fieldset[disabled] .btn:focus {
    background-color:transparent;
    border:none;
    outline: 0;
    }
    input.is-danger, textarea.is-danger {
    border-color: #ef6f6c;
    outline: 0;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(239, 111, 108, 0.6);
    }
    .ql-container.ql-snow {
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    }
    .ql-toolbar.ql-snow {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    }
    @media (max-width: 991px) {
        .new-newsletter .btn
        {
            width:100%;
            padding:1.34em;
            margin: 0.66em 0;
        }
    }
    .newsletter-index {
        position:relative;
        display:block
    }
</style>
