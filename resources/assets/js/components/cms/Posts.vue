<template>
<div class="row">
    <div class="container">
        <button @click.prevent="toggleIndex" id="create" class="btn btn-create">
            <span v-if="index">Write</span>
            <span v-if="! index">Index</span>
        </button>
        <div v-show="! index">
            <button @click.prevent="createNewPost" class="btn btn-primary" :disabled="! newPost.title">
                New
            </button>
        </div>
        <table v-show="index" class="table table-striped table-inverse">
            <thead class="thead-inverse">
            <tr>
                <th>Title</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody class="resource-list">
            <tr v-for="post in posts" v-if="user.id == post.user_id || isDev" class="table-hover">
                <td><strong>{{ post.title }}</strong></td>
                <td><button @click.prevent="(edit(post.id))"role="button" class="btn btn-warning">Edit</button></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <hr>
        <form class="form-horizontal new-post" v-if="! index" role="form">
            <div class="form-group">
                <div v-show="newPost.postId" class="col-md-2 hidden-sm hidden-xs">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newPost.saveError }" @click.prevent="update" :disabled="newPost.saveDisabled">
                            <span v-if="newPost.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Updating
                             </span>
                            <span v-else-if="newPost.saved">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                        <span v-else-if="newPost.saved == false">
                                <i class="fa fa-btn fa-check-circle"></i>Update
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Updated
                            </span>

                    </button>
                </div>
                <div v-show="! newPost.postId" class="col-md-2 hidden-sm hidden-xs">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newPost.saveError }" @click.prevent="save" :disabled="newPost.saveDisabled">
                            <span v-if="newPost.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Saving
                             </span>
                            <span v-else-if="newPost.postId !== null">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Save
                            </span>
                    </button>
                </div>
                <div v-if="isDev" class="col-md-2 hidden-sm hidden-xs">
                    <button :class="{'btn': true, 'btn-warning': true, 'is-success': newPost.published }"  @click.prevent="publish" :disabled="newPost.published">
                        <span v-if="newPost.publishBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Publishing
                             </span>
                             <span class="is-success" v-else-if="newPost.published !== null">
                                <i class="fa fa-btn btn-success fa-newspaper-o"></i>Published!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-newspaper-o"></i>Publish
                            </span>
                    </button>
                </div>
                <div class="col-md-2 hidden-sm hidden-xs">
                    <button v-if="isDev" @click.prevent="unpublish" :class="{'btn': true, 'btn-warning': true, 'hidden': ! newPost.published }">
                        Unpublish
                    </button>
                </div>
                <div class="col-md-2 hidden-sm hidden-xs">
                    <button @click.prevent="leeroyjenkins" :class="{'btn': true, 'btn-danger': true, 'hidden': newPost.published }" :disabled="! newPost.postId">
                        Delete
                    </button>
                </div>
            </div>
            <!-- Header Photo Button -->
            <div class="form-group">
                <div class="container">
                    <label type="button" class="btn btn-primary btn-upload" :disabled="newPost.busy">
                        <span>Select Header Photo</span>
                        <input v-validate="'required|mimes:jpg,jpeg,png,gif'" ref="header_photo" type="file" class="form-control" name="header_photo" @change="update_header">
                    </label>
                    <span v-show="! newPost.header_photo" class="help is-danger">This is required</span><br>
                    <span v-show="errors.has('header_photo')" class="help is-danger">{{ errors.first('header_photo') }}</span>
                    <div role="img" class="header-photo-preview"
                         :style="previewStyle">

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="title"><p>Title:</p></label>
                    <input v-validate="'required|min:3|max:140'" id="title" name="title" v-model="newPost.title"
                           :class="{'form-control': true, 'input': true, 'is-danger': errors.has('title') }" type="text" placeholder="Post Title"
                           style="width:100%">
                    <span v-show="errors.has('title')" class="help is-danger">{{ errors.first('title') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <p>Body:</p>
                    <trumbowyg id="trumbowyg" :config="trumbowygConfig" name="body" v-validate="'required|min:16'" v-model="newPost.body"></trumbowyg>
                    <span v-show="errors.has('body')" class="help is-danger">{{ errors.first('body') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input-tag class="input-tag" name="tags" v-model="newPost.tags" :tags="newPost.tags" placeholder="add tag"></input-tag>
                    <label>Spaces are allowed! Use ENTER/RETURN key, or type a comma to separate tags.</label>
                </div>
            </div>
            <div class="form-group">
                <div v-show="newPost.postId" class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newPost.saveError }" @click.prevent="update" :disabled="newPost.saveDisabled">
                            <span v-if="newPost.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Updating
                             </span>
                            <span v-else-if="newPost.saved">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                        <span v-else-if="newPost.saved == false">
                                <i class="fa fa-btn fa-check-circle"></i>Update
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Updated
                            </span>

                    </button>
                </div>
                <div v-show="! newPost.postId" class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newPost.saveError }" @click.prevent="save" :disabled="newPost.saveDisabled">
                            <span v-if="newPost.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Saving
                             </span>
                            <span v-else-if="newPost.postId !== null">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Save
                            </span>
                    </button>
                </div>
                <div v-if="isDev" class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-warning': true, 'is-success': newPost.published }"  @click.prevent="publish" :disabled="newPost.published">
                        <span v-if="newPost.publishBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Publishing
                             </span>
                             <span class="is-success" v-else-if="newPost.published !== null">
                                <i class="fa fa-btn btn-success fa-newspaper-o"></i>Published!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-newspaper-o"></i>Publish
                            </span>
                    </button>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button v-if="isDev" @click.prevent="unpublish" :class="{'btn': true, 'btn-warning': true, 'hidden': ! newPost.published }">
                        Unpublish
                    </button>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button @click.prevent="leeroyjenkins" :class="{'btn': true, 'btn-danger': true, 'hidden': newPost.published }" :disabled="! newPost.postId">
                        Delete
                    </button>
                </div>
            </div>
        </form>
    </div>
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
    props: ['user','dev'],
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
            posts: [],
            isDev: this.isADev(),
            newPost: new SparkForm ({
                header_photo:'',
                title: '',
                slug: '',
                body: '',
                tags: [],
                link: '',
                postId: null,
                saveDisabled: false,
                saveBusy: false,
                saveError: false,
                saved: false,
                serverErrors: null,
                publishBusy: false,
                published: null,
                publicationId: null,
                errors: null
            }),
            trumbowygConfig: {
                id: 'trumbowyg',
                autogrow: true,
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
        'newPost.header_photo': function (val, oldVal) {
            this.newPost.saved = false
            this.newPost.saveDisabled = false
        },
        title(value) {
            this.validator.validate('title', value);
        },
        body(value) {
            this.validator.validate('body', value);
        },
        /**
            * Watch the title and create slug.
        */
        'newPost.title': function (val, oldVal) {
            this.newPost.serverErrors = null
            if (this.newPost.slug == '' ||
                    this.newPost.slug == oldVal.toLowerCase().replace(/[\s\W-]+/g, '-')
            ) {
                this.newPost.slug = val.toLowerCase().replace(/[\s\W-]+/g, '-');
            }
            this.newPost.saved = false
            this.newPost.saveDisabled = false
        },
        'newPost.body': function (val, oldVal) {
            this.newPost.saved = false
            this.newPost.saveDisabled = false
        },
        'newPost.tags': function (val, oldVal) {
                this.newPost.saved = false
                this.newPost.saveDisabled = false
        }
    },
    methods: {
        isADev() {
            if(this.dev == 'yes')
            {
                return true
            }
            return false
        },
        getIndex() {
            axios.get(`/api/posts`, {})
            .then(result  => {
                this.posts = result.data.data
                return this.posts
            })
            .catch(error => {
                return Promise.reject(error)
            })
        },

        toggleIndex() {
            if(this.index == true) {
                return this.index = false
            }
            this.getIndex()
            return this.index = true
        },

        save() {
            this.newPost.saveError = false
            this.newPost.saveBusy = true
            this.validator.validateAll({
                title: this.newPost.title,
                body: this.newPost.body,
                slug: this.newPost.slug
                }).then((result) => {
                    axios.post(`/api/posts`, {
                                title: this.newPost.title,
                                user_id: Spark.state.user.id,
                                author: Spark.state.user.name,
                                header_photo: this.newPost.header_photo,
                                image_id: this.newPost.image_id,
                                slug:  this.newPost.slug,
                                body:  this.newPost.body,
                                tags: this.newPost.tags
                            })
                            .then(result  => {
                                this.newPost.saveDisabled = true
                                this.newPost.saveBusy = false
                                this.newPost.saved= true
                                this.newPost.postId = result.data.id
                             return result
                            })
                            .catch(error => {
                                this.newPost.saveError = true
                                this.newPost.saveBusy = false
                                this.newPost.serverErrors = error.response.data.errors.slug[0]
                                return Promise.reject(error)
                            })
                        })
            .catch(error => {
                this.newPost.saveBusy = false
                this.newPost.saveError = true
                this.errors = Promise.reject(error)
                return Promise.reject(error)
            })
        },

        publish() {
            this.newPost.publishBusy = true
            if (this.newPost.postId === null) {
                this.newPost.publishBusy = false
                this.save()
                return
            }
             axios.post(`/api/publications`, {
                    type:    'post',
                    post_id: this.newPost.postId
                 })
                 .then(result  => {
                     this.newPost.publishBusy = false
                     this.newPost.publicationId = result.data.id
                     return result
                 })
                 .catch(error => {
                     this.newPost.publishBusy = false
                     return Promise.reject(error)
                 });
                this.newPost.publishBusy = false
                this.newPost.published = true

            },

        unpublish() {
            const postId = this.newPost.postId
            axios.delete(`/api/publications/`
                + this.newPost.publicationId, {})
            .then(result  => {
                this.newPost.publicationId = null
                this.newPost.publishBusy = false
                this.newPost.published = null
                this.checkPublication(postId)
                return result
            })
            .catch(error => {
                this.newPost.publishBusy = false
                return Promise.reject(error)
            });
        },

        checkPublication(id){
            axios.get(`/api/posts/publications/` + id, {})
                .then(result  => {
                    this.newPost.publicationId = result.data.id
                    if (this.newPost.publicationId === undefined) {
                        this.newPost.publicationId = null
                        this.newPost.published = null
                    } else {
                        this.newPost.published = true
                        this.newPost.publishBusy = false
                    }
                    return result.data
                })
                .catch(error => {
                    return Promise.reject(error)
                })
        },

        update() {
            this.newPost.saveError = false
            this.newPost.saveBusy = true
            this.newPost.saveDisabled = true
            this.validator.validateAll({
                title: this.newPost.title,
                body: this.newPost.body
                }).then((result) => {
                    axios.put(`/api/posts/` + this.newPost.postId, {
                        title: this.newPost.title,
                        header_photo: this.newPost.header_photo,
                        user_id: Spark.state.user.id,
                        author: Spark.state.user.name,
                        image_id: this.newPost.image_id,
                        body:  this.newPost.body,
                        tags: this.newPost.tags
                    })
                    .then(result  => {
                        this.newPost.saveBusy = false
                        this.newPost.saved = true
                        return result
                    })
                    .catch(error => {
                        this.newPost.saveError = true
                        this.newPost.saveBusy = false
                        this.newPost.serverErrors = error.response.data.errors.slug[0]
                        return Promise.reject(error)
                    })
            })
            .catch(error => {
                this.newPost.saveBusy = false
                this.newPost.saveError = true
                return Promise.reject(error)
            })
        },

        leeroyjenkins() {
            if(confirm("Permanently destroy this post?")) {
                axios.delete(`/api/posts/` + this.newPost.postId, {})
                .then(result  => {
                    this.clear()
                })
                .catch(error => {
                    return Promise.reject(error)
                });
            }
        },
        /**
         * Update the showcase photo.
         */
        update_header(e) {
            e.preventDefault();

            if ( ! this.$refs.header_photo.files.length) {
                return;
            }

            var self = this;

            this.newPost.startProcessing();

            // We need to gather a fresh FormData instance with the profile photo appended to
            // the data so we can POST it up to the server. This will allow us to do async
            // uploads of the profile photos. We will update the user after this action.
            axios.post(this.urlForUpdate, this.gatherFormData())
                .then(result  => {
                    this.newPost.header_photo = result.data.large
                    this.newPost.thumbnail = result.data.thumbnail
                    this.newPost.image_id = result.data.image_id
                    self.newPost.finishProcessing();
                },
                (error) => {
                    self.newPost.setErrors(error.response.data.errors);
                }
        );
        },
        /**
         * Gather the form data for the photo upload.
         */
        gatherFormData() {
            const data = new FormData();

            data.append('header_photo', this.$refs.header_photo.files[0]);

            return data;
        },
        createNewPost() {
            if (!this.newPost.postId) {
                if (confirm('Abandon this post and start over?')) {
                    this.clear()
                }
            } else {
                this.clear()
            }
        },
        clear() {
            this.newPost.saved = false
            this.newPost.saveBusy = false
            this.newPost.saveDisabled = false
            this.newPost.publishBusy = false
            this.newPost.published = null
            this.newPost.publicationId = null
            this.newPost.postId = null
            this.newPost.header_photo = ''
            this.newPost.title = ''
            this.newPost.body = ''
            this.newPost.slug = ''
            this.newPost.tags = []
        },
        edit(id){
            this.newPost.saveDisabled = true
            this.saveBusy = true
            this.index = false
            this.newPost.postId = id
            this.getTags(this.newPost.postId)
            axios.get(`/api/posts/`+ id , {})
            .then(result => {
                this.newPost.title = result.data.title;
                this.newPost.header_photo = result.data.header_photo
                this.newPost.slug = result.data.slug;
                this.newPost.body = result.data.body;
                this.newPost.postId = result.data.id;
                this.checkPublication(id)
                this.saveBusy = false
                this.newPost.saved = true
                this.newPost.saveDisabled = true

                return result.data
                })
            .catch(error => {
                return Promise.reject(error)
            })
        },
        getTags(id) {
            axios.get(`/posts/`+ id + '/tags', {})
                .then(result => {
                    this.newPost.tags = result.data;
                    return result.data.tags
                })
                .catch(error => {
                    return Promise.reject(error)
                })
        }
    },

    created() {
        this.validator = new VeeValidate.Validator({
            title: 'required|min:2',
            body: 'required|min:40',
            slug: 'required'
        });
    },
    computed: {
        /**
         * Get the URL for updating the team photo.
         */
        urlForUpdate() {
            return `/api/photo`;
        },
        /**
         * Calculate the style attribute for the photo preview.
         */
        previewStyle() {
            return `background-image: url(${this.newPost.header_photo})`;
        }
    },
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
        .new-post .btn
        {
            width:100%;
            padding:1.34em;
            margin: 0.66em 0;
        }
    }
    .post-index {
        position:relative;
        display:block
    }
</style>
