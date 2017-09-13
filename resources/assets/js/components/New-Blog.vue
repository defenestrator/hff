<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default new-blog">
                    <div class="panel-heading">Blog Post<span v-show="newBlog.postId">: <strong>{{newBlog.title}}</strong></span></div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <div class="col-md-12">
                                <input v-validate="'required|min:2'" name="title" v-model="newBlog.title" :class="{'form-control': true, 'input': true, 'is-danger': errors.has('title') }" type="text" placeholder="Post Title" style="width:100%">
                                <span v-show="errors.has('title')" class="help is-danger">{{ errors.first('title') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div name="slug">slug: {{newBlog.slug}} </div>
                                    <span v-show="newBlog.serverErrors" class="help is-danger">{{ newBlog.serverErrors }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <vue-editor name="body" v-validate="'required|min:4'" v-model="newBlog.body"></vue-editor>
                                    <span v-show="newBlog.saveError" class="help is-danger">
                                        Get your shit together. Write something worth reading, won't you please?.
                                        </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input-tag class="input-tag" name="tags" v-model="newBlog.tags" :tags="newBlog.tags" placeholder="add tag"></input-tag>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2 col-sm-12">
                                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newBlog.saveError }" @click.prevent="save" :disabled="newBlog.saveDisabled">
                                        <span v-if="newBlog.saveBusy">
                                            <i class="fa fa-btn fa-spinner fa-spin"></i>Saving
                                         </span>
                                        <span v-else-if="newBlog.postId !== null">
                                            <i class="fa fa-btn fa-check-circle"></i>Saved!
                                         </span>
                                        <span v-else>
                                            <i class="fa fa-btn fa-check-circle"></i>Save
                                        </span>
                                    </button>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <button :class="{'btn': true, 'btn-warning': true, 'is-success': newBlog.published }"  @click.prevent="publish" :disabled="newBlog.published">
                                    <span v-if="newBlog.publishBusy">
                                            <i class="fa fa-btn fa-spinner fa-spin"></i>Publishing
                                         </span>
                                         <span class="is-success" v-else-if="newBlog.published !== null">
                                            <i class="fa fa-btn btn-success fa-newspaper-o"></i>Published!
                                         </span>
                                        <span v-else>
                                            <i class="fa fa-btn fa-newspaper-o"></i>Publish
                                        </span>
                                    </button>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <button @click.prevent="unpublish" :class="{'btn': true, 'btn-warning': true, 'hidden': ! newBlog.published }">
                                        Unpublish
                                    </button>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <button @click.prevent="leeroyjenkins" :class="{'btn': true, 'btn-danger': true, 'hidden': newBlog.published }" :disabled="! newBlog.postId">
                                        Delete
                                    </button>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <button @click.prevent="newPost" class="btn btn-success" :disabled="! newBlog.title">
                                        New
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { VueEditor } from 'vue2-editor'
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);

export default {
    validator: null,
    mounted() {
        console.log('New Blog Component mounted.')
    },
    components: {
        VueEditor
    },
    data() {
        return {
            newBlog: {
                title: '',
                slug: '',
                body: '',
                tags: [],
                postId: null,
                saveDisabled: false,
                saveBusy: false,
                saveError: false,
                serverErrors: null,
                publishBusy: false,
                published: null,
                publicationId: null,
                errors: null
            }
        }
    },
    watch: {
        title(value) {
            this.validator.validate('title', value);
        },
        body(value) {
            this.validator.validate('body', value);
        },
        /**
            * Watch the title and create slug.
            */
        'newBlog.title': function (val, oldVal) {
            this.newBlog.serverErrors = null
            if (this.newBlog.slug == '' ||
                    this.newBlog.slug == oldVal.toLowerCase().replace(/[\s\W-]+/g, '-')
            ) {
                this.newBlog.slug = val.toLowerCase().replace(/[\s\W-]+/g, '-');
            }
            if (this.newBlog.postId) {
                this.update()
            }
        },
        'newBlog.body': function (val, oldVal) {
            if (this.newBlog.postId) {
                this.update()
            }
        },
        'newBlog.tags': function (val, oldVal) {
            if (this.newBlog.postId) {
                this.update()
            }
        }
    },
    methods: {
        save() {
            this.newBlog.saveError = false
            this.newBlog.saveBusy = true
            this.validator.validateAll({
                title: this.newBlog.title,
                body: this.newBlog.body,
                slug: this.newBlog.slug
                }).then((result) => {
                    axios.post(`/posts`, {
                                title: this.newBlog.title,
                                user_id: Spark.state.user.id,
                                slug:  this.newBlog.slug,
                                body:  this.newBlog.body,
                                tags: this.newBlog.tags
                            })
                            .then(result  => {
                            this.newBlog.saveDisabled = true
                            this.newBlog.saveBusy = false
                            this.newBlog.postId = result.data.id
                            console.log(result)
                             return result
                            })
                            .catch(error => {
                                this.newBlog.saveError = true
                                this.newBlog.saveBusy = false
                                this.newBlog.serverErrors = error.response.data.errors.slug[0]
                                return Promise.reject(error)
                            })
                        })
            .catch(error => {
                this.newBlog.saveBusy = false
                this.newBlog.saveError = true
            })
        },
        publish() {
            this.newBlog.publishBusy = true
            if (this.newBlog.postId === null) {
                this.newBlog.publishBusy = false
                this.save()
                return
            }
             axios.post(`/publications`, {
                    type:    'post',
                    post_id: this.newBlog.postId
                 })
                 .then(result  => {
                     this.newBlog.publishBusy = false
                     this.newBlog.publicationId = result.data.id
                     return result
                 })
                 .catch(error => {
                     this.newBlog.publishBusy = false
                     return Promise.reject(error)
                 });
                this.newBlog.publishBusy = false
                this.newBlog.published = true

            },
        unpublish() {
            axios.delete(`/publications/`
                + this.newBlog.publicationId, {})
            .then(result  => {
                this.newBlog.disabled = false
                this.newBlog.publishBusy = false
                this.newBlog.publicationId = null
                console.log(result)
                return result
            })
            .catch(error => {
                    this.newBlog.disabled = false
                this.newBlog.publishBusy = false
                return Promise.reject(error)
            });
            this.newBlog.disabled = false
            this.newBlog.saveBusy = false
            this.newBlog.published = null
        },
        update() {
            this.newBlog.saveError = false
            this.newBlog.saveBusy = true
            this.newBlog.disabled = true
            this.validator.validateAll({
                title: this.newBlog.title,
                body: this.newBlog.body
                }).then((result) => {
                    axios.put(`/posts/` + this.newBlog.postId, {
                        title: this.newBlog.title,
                        slug:  this.newBlog.slug,
                        body:  this.newBlog.body,
                        tags:  this.newBlog.tags,
                        id:    this.newBlog.id
                    })
                    .then(result  => {
                        this.newBlog.disabled = false
                        this.newBlog.saveBusy = false
                        return result
                    })
                    .catch(error => {
                        this.newBlog.saveError = true
                        this.newBlog.disabled = false
                        this.newBlog.saveBusy = false
                        this.newBlog.serverErrors = error.response.data.errors.slug[0]
                        return Promise.reject(error)
                    })
            })
            .catch(error => {
                this.newBlog.disabled = false
                this.newBlog.saveBusy = false
                this.newBlog.saveError = true
            })
        },
        leeroyjenkins() {
            if(confirm("Permanently destroy this post?")) {
                axios.delete(`/posts/` + this.newBlog.postId, {})
                .then(result  => {
                    this.clear()
                })
                .catch(error => {
                    return Promise.reject(error)
                });
            }
        },
        newPost() {
            if (!this.newBlog.postId) {
                if (confirm('Abandon this post and start over?')) {
                    this.clear()
                }
            } else {
                this.clear()
            }
        },
        clear() {
            this.newBlog.disabled = false
            this.newBlog.saveBusy = false
            this.newBlog.saveDisabled = false
            this.newBlog.published = null
            this.newBlog.publicationId = null
            this.newBlog.postId = null
            this.newBlog.title = ''
            this.newBlog.body = ''
            this.newBlog.slug = ''
            this.newBlog.tags = []
        }
    },
    created() {
        this.validator = new VeeValidate.Validator({
            title: 'required|min:2',
            body: 'required|min:40',
            slug: 'required'
        });
        this.$set(this, 'errors', this.validator.errors);
    }
}
</script>
<style>
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
        .new-blog .btn
        {
            width:100%;
            padding:1.34em;
            margin: 0.66em 0;
        }
    }
</style>
