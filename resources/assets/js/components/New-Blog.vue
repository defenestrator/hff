<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default new-blog">
                    <div class="panel-heading">New Blog Post</div>

                    <div class="panel-body">
                        <form enctype='multipart/form-data' class="form-horizontal" role="form">
                            <div class="form-group">
                                <div class="col-md-12">
                                <input v-validate="'required|min:2'" name="title" v-model="newBlog.title" :class="{'form-control': true, 'input': true, 'is-danger': errors.has('title') }" class="" type="text" placeholder="Post Title" size="140" style="width:100%">
                                <span v-show="errors.has('title')" class="help is-danger">{{ errors.first('title') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div name="slug">Slug: {{newBlog.slug}} </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <vue-editor name="body" v-validate="'required|min:4'" v-model="newBlog.body"></vue-editor>
                                    <span v-show="newBlog.saveError" class="help is-danger">Get your shit together. You need to put something in the body of the post.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 col-sm-12">
                                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newBlog.saveError }" @click.prevent="save" :disabled="newBlog.disabled">
                                        <span v-if="newBlog.saveBusy">
                                            <i class="fa fa-btn fa-spinner fa-spin"></i>Saving
                                         </span>
                                        <span v-else-if="newBlog.postId !== null">
                                            <i class="fa fa-btn fa-check-circle"></i>Saved! {{postId}}
                                         </span>
                                        <span v-else>
                                            <i class="fa fa-btn fa-check-circle"></i>Save
                                        </span>
                                    </button>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <button @click.prevent="publish" class="btn btn-warning" :disabled="newBlog.disabled">
                                    <span v-if="newBlog.publishBusy">
                                            <i class="fa fa-btn fa-spinner fa-spin"></i>Publishing
                                         </span>
                                        <span v-else>
                                            <i class="fa fa-btn fa-newspaper-o"></i>Publish
                                        </span>
                                    </button>
                                </div>
                                <!--<div class="col-md-4 col-md-offset-1 col-sm-12">-->
                                    <!--<button class="btn btn-danger">-->
                                        <!--Delete-->
                                    <!--</button>-->
                                <!--</div>-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Recent posts</div>
                    <div class="panel-body">
                        I'm an example sidebar
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
                postId: null,
                disabled: false,
                saveBusy: false,
                saveError: false,
                publishBusy: false,
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
            if (this.newBlog.slug == '' ||
                    this.newBlog.slug == oldVal.toLowerCase().replace(/[\s\W-]+/g, '-')
            ) {
                this.newBlog.slug = val.toLowerCase().replace(/[\s\W-]+/g, '-');
            }
        }
    },
    methods: {
        validateForm() {

        },
        clearErrors() {
            this.errors.clear();
        },
        save() {
            this.newBlog.saveError = false
            this.newBlog.saveBusy = true
            this.newBlog.disabled = true
            this.validator.validateAll({
                title: this.newBlog.title,
                body: this.newBlog.body
                }).then((result) => {
                    axios.post(`/posts`, {
                                title: this.newBlog.title,
                                slug:  this.newBlog.slug,
                                body:  this.newBlog.body
                            })
                            .then(result  => {
                            this.newBlog.disabled = false
                            this.newBlog.saveBusy = false
                            this.newBlog.postId = result.id
                             return result
                            })
                            .catch(error => {
                                this.newBlog.saveError = true
                                this.newBlog.disabled = false
                                this.newBlog.saveBusy = false
                                return Promise.reject(error)
                            });
                        })
            .catch(error => {
                this.newBlog.disabled = false
                this.newBlog.saveBusy = false
                this.newBlog.saveError = true
            });
        },
        publish() {
            this.newBlog.disabled = true
            this.newBlog.publishBusy = true
            if (this.newBlog.postId === null) {
                this.save()
                return this.newBlog.publishBusy = false
            }
            axios.post(`/publications`, {
                    title: this.newBlog.title,
                    slug:  this.newBlog.slug,
                    body:  this.newBlog.body
                })
                .then(result  => {
                    alert('published!');
                    this.newBlog.disabled = false
                    this.newBlog.publishBusy = false
                    return result
                })
                .catch(error => {
                    this.newBlog.disbled = false
                    this.newBlog.publishBusy = false
                    return Promise.reject(error)
                });
            }
        },
        created() {
            this.validator = new VeeValidate.Validator({
                title: 'required|min:2',
                body: 'required|min:4'
            });
            this.$set(this, 'errors', this.validator.errors);
        }
}
</script>
