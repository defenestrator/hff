<template>
<div class="row">
    <div class="col-md-12">
        <button @click.prevent="toggleIndex" id="create" class="btn btn-create">
            <span v-if="index">Upload</span>
            <span v-if="! index">Index</span>
        </button>
        <div v-show="! index">
            <button @click.prevent="createNewPodcast" class="btn btn-primary":disabled="! newPodcast.title">
                New
            </button>
        </div>
        <table v-show="index" class="table table-striped table-inverse">
            <thead  class="thead-inverse">
            <tr>
                <th>Title</th>
                <th>Episode</th>
                <th>Season</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody class="resource-list">
            <tr v-for="podcast in podcasts" class="table-hover">
                <td><strong>{{ podcast.title }}</strong></td>
                <td>{{ podcast.episode }}</td>
                <td>{{ podcast.season }}</td>
                <td>{{ podcast.slug }}</td>
                <td><button @click.prevent="(edit(podcast.id))"role="button" class="btn btn-warning">Edit</button></td>
            </tr>
            </tbody>
        </table>
        <form enctype='multipart/form-data' class="form-horizontal podcast" v-if="! index" role="form">
            <div class="form-group">
                <div class="col-md-12">
                    <input v-validate="'required|min:2'" name="title" v-model="newPodcast.title" :class="{'form-control': true, 'input': true, 'is-danger': errors.has('title') }" type="text" placeholder="Podcast Title" style="width:100%">
                    <span v-show="errors.has('title')" class="help is-danger">{{ errors.first('title') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div name="slug">slug: {{newPodcast.slug}} </div>
                    <span v-show="newPodcast.serverErrors" class="help is-danger">{{ newPodcast.serverErrors }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <ul>
                        <li v-for="file in files">{{file.name}} - Error: {{file.error}}, Success: {{file.success}}</li>
                    </ul>
                    <file-upload
                            ref="upload"
                            v-model="files"
                            :post-action="postAction"
                            :put-action="putAction"
                            @input-file="inputFile"
                            @input-filter="inputFilter"
                            class="btn btn-success"
                    >
                        Upload file
                    </file-upload>
                    <button v-show="!$refs.upload || !$refs.upload.active" @click.prevent="$refs.upload.active = true" type="button">Start upload</button>
                    <button v-show="$refs.upload && $refs.upload.active" @click.prevent="$refs.upload.active = false" type="button">Stop upload</button>
                    <span v-show="newPodcast.saveError" class="help is-danger">
                        Get your shit together. Post something worth hearing, won't you please?.
                        </span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input-tag class="input-tag" name="tags" v-model="newPodcast.tags" :tags="newPodcast.tags" placeholder="add tag"></input-tag>
                    <label>Spaces are allowed! Use ENTER/RETURN key, or type a comma to separate tags.</label>
                </div>
            </div>
            <div class="form-group">
                <div v-show="newPodcast.podcastId" class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newPodcast.saveError }" @click.prevent="update" :disabled="newPodcast.saveDisabled">
                            <span v-if="newPodcast.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Updating
                             </span>
                            <span v-else-if="newPodcast.saved">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                        <span v-else-if="newPodcast.saved == false">
                                <i class="fa fa-btn fa-check-circle"></i>Update
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Updated
                            </span>

                    </button>
                </div>
                <div v-show="! newPodcast.podcastId" class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newPodcast.saveError }" @click.prevent="save" :disabled="newPodcast.saveDisabled">
                            <span v-if="newPodcast.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Saving
                             </span>
                            <span v-else-if="newPodcast.podcastId !== null">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Save
                            </span>
                    </button>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-warning': true, 'is-success': newPodcast.published }"  @click.prevent="publish" :disabled="newPodcast.published">
                        <span v-if="newPodcast.publishBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Publishing
                             </span>
                             <span class="is-success" v-else-if="newPodcast.published !== null">
                                <i class="fa fa-btn btn-success fa-newspaper-o"></i>Published!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-newspaper-o"></i>Publish
                            </span>
                    </button>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button @click.prevent="unpublish" :class="{'btn': true, 'btn-warning': true, 'hidden': ! newPodcast.published }">
                        Unpublish
                    </button>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button @click.prevent="leeroyjenkins" :class="{'btn': true, 'btn-danger': true, 'hidden': newPodcast.published }" :disabled="! newPodcast.podcastId">
                        Delete
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>
</template>

<script>
import VeeValidate from 'vee-validate';
const VueUploadComponent = require('vue-upload-component')
Vue.use(VeeValidate);
export default {
    validator: null,
    mounted() {
        this.getIndex()
    },
    components: {
        FileUpload: VueUploadComponent
    },
    data() {
        return {
            files: [],
            accept: 'image/png,image/gif,image/jpeg,image/webp',
            extensions: /\.(gif|jpe?g|png|webp)$/i,
            index: true,
            podcasts: [],
            multiple: false,
            directory: false,
            drop: true,
            auto: false,
            postAction: '/api/podcasts',
            putAction: '/api/podcasts',
            newPodcast: {
                title: '',
                slug: '',
                file: null,
                episode: null,
                season: null,
                body: '',
                tags: [],
                podcastId: null,
                saveDisabled: false,
                saveBusy: false,
                saveError: false,
                saved: false,
                serverErrors: null,
                publishBusy: false,
                published: null,
                publicationId: null,
                errors: null
            }
        }
    },
    watch: {
        auto(auto) {
            if (auto && !this.$refs.upload.uploaded && !this.$refs.upload.active) {
                this.$refs.upload.active = true
            }
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
        'newPodcast.title': function (val, oldVal) {
            this.newPodcast.serverErrors = null
            if (this.newPodcast.slug == '' ||
                    this.newPodcast.slug == oldVal.toLowerCase().replace(/[\s\W-]+/g, '-')
            ) {
                this.newPodcast.slug = val.toLowerCase().replace(/[\s\W-]+/g, '-');
            }
            this.newPodcast.saved = false
            this.newPodcast.saveDisabled = false
        },
        'newPodcast.body': function (val, oldVal) {
            this.newPodcast.saved = false
            this.newPodcast.saveDisabled = false
        },
        'newPodcast.tags': function (val, oldVal) {
                this.newPodcast.saved = false
                this.newPodcast.saveDisabled = false
        }
    },
    methods: {
        getIndex() {
            axios.get(`/api/podcasts`, {})
            .then(result  => {
                this.podcasts = result.data.data
                return this.podcasts
            })
            .catch(error => {
                return Promise.reject(error)
            })
        },
        inputFile: function(newFile, oldFile) {
            if (newFile && oldFile && !newFile.active && oldFile.active) {
                // Get response data
                console.log('response', newFile.response)
                if (newFile.xhr) {
                    //  Get the response status code
                    //  Required html5 support
                    console.log('status', newFile.xhr.status)
                }
            }
        },

        inputFilter: function(newFile, oldFile, prevent) {
            if (newFile && !oldFile) {
                // Filter non-image file
                if (!/\.(jpeg|jpe|jpg|gif|png|webp)$/i.test(newFile.file)) {
                    return prevent()
                }
            }

            // Create a blob field
            newFile.blob = ''
            let URL = window.URL || window.webkitURL
            if (URL && URL.createObjectURL) {
                newFile.blob = URL.createObjectURL(newFile.file)
            }
        },
        toggleIndex() {
            this.index = this.index ? false : true
        },

        save() {
            this.newPodcast.saveError = false
            this.newPodcast.saveBusy = true
            this.validator.validateAll({
                title: this.newPodcast.title,
                body: this.newPodcast.body,
                slug: this.newPodcast.slug
                }).then((result) => {
                    axios.podcast(`/api/podcasts`, {
                                title: this.newPodcast.title,
                                user_id: Spark.state.user.id,
                                author: Spark.state.user.name,
                                slug:  this.newPodcast.slug,
                                body:  this.newPodcast.body,
                                tags: this.newPodcast.tags
                            })
                            .then(result  => {
                                this.newPodcast.saveDisabled = true
                                this.newPodcast.saveBusy = false
                                this.newPodcast.saved= true
                                this.newPodcast.podcastId = result.data.id
                                console.log(result)
                             return result
                            })
                            .catch(error => {
                                this.newPodcast.saveError = true
                                this.newPodcast.saveBusy = false
                                this.newPodcast.serverErrors = error.response.data.errors.slug[0]
                                return Promise.reject(error)
                            })
                        })
            .catch(error => {
                this.newPodcast.saveBusy = false
                this.newPodcast.saveError = true
                this.errors = Promise.reject(error)
                return Promise.reject(error)
            })
        },

        publish() {
            this.newPodcast.publishBusy = true
            if (this.newPodcast.podcastId === null) {
                this.newPodcast.publishBusy = false
                this.save()
                return
            }
             axios.podcast(`/api/publications`, {
                    type:    'podcast',
                    podcast_id: this.newPodcast.podcastId
                 })
                 .then(result  => {
                     this.newPodcast.publishBusy = false
                     this.newPodcast.publicationId = result.data.id
                     return result
                 })
                 .catch(error => {
                     this.newPodcast.publishBusy = false
                     return Promise.reject(error)
                 });
                this.newPodcast.publishBusy = false
                this.newPodcast.published = true

            },

        unpublish() {
            const podcastId = this.newPodcast.podcastId
            axios.delete(`/api/publications/`
                + this.newPodcast.publicationId, {})
            .then(result  => {
                this.newPodcast.publicationId = null
                this.newPodcast.publishBusy = false
                this.newPodcast.published = null
                this.checkPublication(podcastId)
                return result
            })
            .catch(error => {
                this.newPodcast.publishBusy = false
                return Promise.reject(error)
            });
        },

        checkPublication(id){
            axios.get(`/api/podcasts/publications/` + id, {})
                .then(result  => {
                    this.newPodcast.publicationId = result.data.id
                    if (this.newPodcast.publicationId === undefined) {
                        this.newPodcast.publicationId = null
                        this.newPodcast.published = null
                    } else {
                        this.newPodcast.published = true
                        this.newPodcast.publishBusy = false
                    }
                    return result.data
                })
                .catch(error => {
                    return Promise.reject(error)
                })
        },

        update() {
            this.newPodcast.saveError = false
            this.newPodcast.saveBusy = true
            this.newPodcast.saveDisabled = true
            this.validator.validateAll({
                title: this.newPodcast.title,
                body: this.newPodcast.body
                }).then((result) => {
                    axios.put(`/api/podcasts/` + this.newPodcast.podcastId, {
                        title: this.newPodcast.title,
                        user_id: Spark.state.user.id,
                        author: Spark.state.user.name,
                        slug:  this.newPodcast.slug,
                        body:  this.newPodcast.body,
                        tags: this.newPodcast.tags
                    })
                    .then(result  => {
                        this.newPodcast.saveBusy = false
                        this.newPodcast.saved = true
                        return result
                    })
                    .catch(error => {
                        this.newPodcast.saveError = true
                        this.newPodcast.saveBusy = false
                        this.newPodcast.serverErrors = error.response.data.errors.slug[0]
                        return Promise.reject(error)
                    })
            })
            .catch(error => {
                this.newPodcast.saveBusy = false
                this.newPodcast.saveError = true
                return Promise.reject(error)
            })
        },

        leeroyjenkins() {
            if(confirm("Permanently destroy this podcast?")) {
                axios.delete(`/api/podcasts/` + this.newPodcast.podcastId, {})
                .then(result  => {
                    this.clear()
                })
                .catch(error => {
                    return Promise.reject(error)
                });
            }
        },

        createNewPodcast() {
            if (!this.newPodcast.podcastId) {
                if (confirm('Abandon this podcast and start over?')) {
                    this.clear()
                }
            } else {
                this.clear()
            }
        },
        clear() {
            this.newPodcast.saved = false
            this.newPodcast.saveBusy = false
            this.newPodcast.saveDisabled = false
            this.newPodcast.publishBusy = false
            this.newPodcast.published = null
            this.newPodcast.publicationId = null
            this.newPodcast.podcastId = null
            this.newPodcast.title = ''
            this.newPodcast.body = ''
            this.newPodcast.slug = ''
            this.newPodcast.tags = []
        },
        edit(id){
            this.newPodcast.saveDisabled = true
            this.saveBusy = true
            this.index = false
            this.newPodcast.podcastId = id
            this.getTags(this.newPodcast.podcastId)
            axios.get(`/podcasts/`+ id + '/edit', {})
            .then(result => {
                this.newPodcast.title = result.data.title;
                this.newPodcast.slug = result.data.slug;
                this.newPodcast.body = result.data.body;
                this.newPodcast.podcastId = result.data.id;
                this.checkPublication(id)
                this.saveBusy = false
                this.newPodcast.saved = true
                this.newPodcast.saveDisabled = true

                return result.data
                })
            .catch(error => {
                return Promise.reject(error)
            })
        },
        getTags(id) {
            axios.get(`/podcasts/`+ id + '/tags', {})
                .then(result => {
                    this.newPodcast.tags = result.data;
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
        .new-podcast .btn
        {
            width:100%;
            padding:1.34em;
            margin: 0.66em 0;
        }
    }
    .podcast-index {
        position:relative;
        display:block
    }
</style>
