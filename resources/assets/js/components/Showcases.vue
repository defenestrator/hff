<template>
<div class="row">
        <button @click.prevent="toggleIndex" id="create" class="btn btn-create">
            <span v-if="index">Build Showcase</span>
            <span v-if="! index">List Showcases</span>
        </button>
        <div v-show="! index">
            <button @click.prevent="createnewShowcase" class="btn btn-warning">
                New
            </button>
        </div>
        <table v-show="index" class="table table-striped table-inverse">
            <thead  class="thead-inverse">
            <tr>
                <th>Title</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody class="resource-list">
            <tr v-for="showcase in showcases" class="table-hover">
                    <td><strong>{{ showcase.title }}</strong></td>
                <td><button @click.prevent="(edit(showcase.id))"role="button" class="btn btn-warning">Edit</button></td>
            </tr>
            </tbody>
        </table>
        <form  enctype="multipart/form-data" class="form-horizontal new-post" v-if="! index" role="form">
            <!-- Update Button -->
            <div class="form-group">
                <div class="col-md-12">
                    <label type="button" class="btn btn-primary btn-upload" :disabled="newShowcase.busy">
                        <span>Select Header Photo</span>
                        <input v-validate="'required|mimes:jpg,jpeg,png,gif'" ref="header_photo" type="file" class="form-control" name="header_photo" @change="update_header">
                    </label>
                    <span v-show="errors.has('header_photo')" class="help is-danger">{{ errors.first('header_photo') }}</span>
                    <div role="img" class="header-photo-preview"
                         :style="previewStyle">

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <p role="presentation" name="title">Title: {{newShowcase.title}} </p>
                    <input v-validate="'required|min:8'" name="title" v-model="newShowcase.title" :class="{'form-control': true, 'input': true, 'is-danger': errors.has('title') }"
                           type="text" placeholder="Showcase Title" style="width:100%">
                    <span v-show="errors.has('title')" class="help is-danger">{{ errors.first('title') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div name="slug">slug: {{newShowcase.slug}} </div>
                    <span v-show="newShowcase.serverErrors" class="help is-danger">{{ newShowcase.serverErrors }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <h4 role="presentation">Fishery Type: {{ newShowcase.fishery_type }}</h4>
                    <input v-validate="'required|min:3'" id="fishery_type" class="form-control input" name="fishery_type" v-model="newShowcase.fishery_type" placeholder="Fishery Type" />
                </div>
                <div class="col-md-6">
                    <h4 role="presentation">Region: {{ newShowcase.region }}</h4>
                    <input v-validate="'required|min:3'" class="form-control input" name="region" v-model="newShowcase.region" placeholder="Region" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <h4 role="presentation">Sub-header: {{ newShowcase.tagline }}</h4>
                    <input v-validate="'required|min:4'" class="form-control input" name="tagline" v-model="newShowcase.tagline" placeholder="Make it a zinger" />

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <h4 role="presentation">Showcase Body:</h4>
                    <trumbowyg id="trumbowyg" :config="trumbowygConfig" name="body" v-validate="'required|min:20'" v-model="newShowcase.body"></trumbowyg>
                    <span v-show="newShowcase.saveError" class="help is-danger">
                        Get your shit together. Write something worth reading, won't you please?.
                        </span>
                </div>
            </div>

            <div>
                <div class="form-group">
                    <div class="col-md-6">
                        <h4 role="presentation">Sidebar Top:</h4>
                        <trumbowyg id="sidebarTopTrumbowyg" :config="trumbowygConfig" name="sidebar_top" v-validate="'required|min:4'" v-model="newShowcase.sidebar_top"></trumbowyg>
                    <span v-show="newShowcase.saveError" class="help is-danger">
                        Get your shit together. Write something worth reading, won't you please?.
                        </span>
                    </div>
                    <div class="col-md-6">
                        <h4 role="presentation">Sidebar Bottom:</h4>
                        <trumbowyg id="sidebarBottomTrumbowyg" :config="trumbowygConfig" name="sidebar_bottom" v-validate="'required|min:4'" v-model="newShowcase.sidebar_bottom"></trumbowyg>
                    <span v-show="newShowcase.saveError" class="help is-danger">
                        Get your shit together. Write something worth reading, won't you please?.
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <input-tag class="input-tag" name="tags" v-model="newShowcase.tags" :tags="newShowcase.tags" placeholder="add tag"></input-tag>
                    <label>Spaces are allowed. Use ENTER/RETURN key, or type a comma to separate tags.</label>
                </div>
            </div>
            <div class="form-group">
                <div v-show="newShowcase.showcaseId" class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newShowcase.saveError }" @click.prevent="update" :disabled="newShowcase.saveBusy">
                            <span v-if="newShowcase.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Updating
                             </span>
                            <span v-else-if="newShowcase.saved">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                        <span v-else-if="newShowcase.saved == false">
                                <i class="fa fa-btn fa-check-circle"></i>Update
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Updated
                            </span>

                    </button>
                </div>
                <div v-show="! newShowcase.showcaseId" class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newShowcase.saveError }" @click.prevent="save" :disabled="newShowcase.saveBusy">
                            <span v-if="newShowcase.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Saving
                             </span>
                            <span v-else-if="newShowcase.showcaseId !== null">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Save
                            </span>
                    </button>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-warning': true, 'is-success': newShowcase.published }"  @click.prevent="publish" :disabled="newShowcase.published">
                        <span v-if="newShowcase.publishBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Publishing
                             </span>
                             <span class="is-success" v-else-if="newShowcase.published !== null">
                                <i class="fa fa-btn btn-success fa-newspaper-o"></i>Published!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-newspaper-o"></i>Publish
                            </span>
                    </button>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button @click.prevent="unpublish" :class="{'btn': true, 'btn-warning': true, 'hidden': ! newShowcase.published }">
                        Unpublish
                    </button>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button @click.prevent="leeroyjenkins" :class="{'btn': true, 'btn-danger': true, 'hidden': newShowcase.published }" :disabled="! newShowcase.showcaseId">
                        Delete
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
// Import this component
import trumbowyg from 'vue-trumbowyg';

// Import editor css
import 'trumbowyg/dist/ui/trumbowyg.css';

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);
export default {
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
            showcases: [],
            newShowcase: new SparkForm({
                title: '',
                slug: '',
                body: '',
                tagline: "",
                sidebar_top: "",
                sidebar_bottom: "",
                fishery_type: "",
                region: "",
                header_photo:"",
                thumbnail: "",
                tags: [],
                link: '',
                showcaseId: null,
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
                        serverPath: '/cms/posts/images',
                        fileFieldName: 'image',
                        urlPropertyName: 'file',
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
        title(value) {
            this.validator.validate('title', value);
        },
        body(value) {
            this.validator.validate('body', value);
        },
        fishery_type(value) {
            this.validator.validate('fishery_type', value);
        },
        region(value) {
            this.validator.validate('region', value);
        },
        /**
            * Watch the title and create slug.
        */
        'newShowcase.title': function (val, oldVal) {
            this.newShowcase.serverErrors = null
            if (this.newShowcase.slug == '' ||
                    this.newShowcase.slug == oldVal.toLowerCase().replace(/[\s\W-]+/g, '-')
            ) {
                this.newShowcase.slug = val.toLowerCase().replace(/[\s\W-]+/g, '-');
            }
            this.newShowcase.saved = false
        },
        'newShowcase.body': function (val, oldVal) {
            this.newShowcase.saved = false
        },
        'newShowcase.tags': function (val, oldVal) {
                this.newShowcase.saved = false
        }
    },
    methods: {
        getIndex() {
            axios.get(`/api/showcases`, {})
            .then(result  => {
                this.showcases = result.data.data
                return this.showcases
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
            this.newShowcase.saveError = false
            this.newShowcase.saveBusy = true
            this.validator.validateAll({
                title: this.newShowcase.title,
                body: this.newShowcase.body,
                slug: this.newShowcase.slug
                }).then((result) => {
                    axios.post(`/api/showcases`, {
                                title: this.newShowcase.title,
                                slug:  this.newShowcase.slug,
                                body:  this.newShowcase.body,
                                tagline: this.newShowcase.tagline ,
                                sidebar_bottom: this.newShowcase.sidebar_bottom ,
                                sidebar_top: this.newShowcase.sidebar_top ,
                                fishery_type: this.newShowcase.fishery_type,
                                region: this.newShowcase.region,
                                header_photo:this.newShowcase.header_photo,
                                thumbnail: this.newShowcase.thumbnail ,
                                tags: this.newShowcase.tags
                            })
                            .then(result  => {
                                this.newShowcase.saveBusy = false
                                this.newShowcase.saved= true
                                this.newShowcase.showcaseId = result.data.id
                                console.log(result)
                             return result
                            })
                            .catch(error => {
                                this.newShowcase.saveError = true
                                this.newShowcase.saveBusy = false
                                this.newShowcase.serverErrors = error.response.data.errors.slug[0]
                                return Promise.reject(error)
                            })
                        })
            .catch(error => {
                this.newShowcase.saveBusy = false
                this.newShowcase.saveError = true
                this.errors = Promise.reject(error)
                return Promise.reject(error)
            })
        },

        publish() {
            this.newShowcase.publishBusy = true
            if (this.newShowcase.showcaseId === null) {
                this.newShowcase.publishBusy = false
                this.save()
                return
            }
             axios.post(`/api/publications`, {
                    type:    'showcase',
                    showcase_id: this.newShowcase.showcaseId
                 })
                 .then(result  => {
                     this.newShowcase.publishBusy = false
                     this.newShowcase.publicationId = result.data.id
                     return result
                 })
                 .catch(error => {
                     this.newShowcase.publishBusy = false
                     return Promise.reject(error)
                 });
                this.newShowcase.publishBusy = false
                this.newShowcase.published = true

            },

        unpublish() {
            const showcaseId = this.newShowcase.showcaseId
            axios.delete(`/api/publications/`
                + this.newShowcase.publicationId, {})
            .then(result  => {
                this.newShowcase.publicationId = null
                this.newShowcase.publishBusy = false
                this.newShowcase.published = null
                this.checkPublication(showcaseId)
                return result
            })
            .catch(error => {
                this.newShowcase.publishBusy = false
                return Promise.reject(error)
            });
        },

        checkPublication(id){
            axios.get(`/api/showcases/publications/` + id, {})
                .then(result  => {
                    this.newShowcase.publicationId = result.data.id
                    if (this.newShowcase.publicationId === undefined) {
                        this.newShowcase.publicationId = null
                        this.newShowcase.published = null
                    } else {
                        this.newShowcase.published = true
                        this.newShowcase.publishBusy = false
                    }
                    return result.data
                })
                .catch(error => {
                    return Promise.reject(error)
                })
        },

        update() {
            this.newShowcase.saveError = false
            this.newShowcase.saveBusy = true
            this.validator.validateAll({
                title: this.newShowcase.title,
                body: this.newShowcase.body
                }).then((result) => {
                    axios.put(`/api/showcases/` + this.newShowcase.showcaseId, {
                        title: this.newShowcase.title,
                        slug:  this.newShowcase.slug,
                        body:  this.newShowcase.body,
                        tagline: this.newShowcase.tagline ,
                        sidebar_bottom: this.newShowcase.sidebar_bottom ,
                        sidebar_top: this.newShowcase.sidebar_top ,
                        fishery_type: this.newShowcase.fishery_type,
                        region: this.newShowcase.region,
                        header_photo:this.newShowcase.header_photo,
                        thumbnail: this.newShowcase.thumbnail ,
                        tags: this.newShowcase.tags
                    })
                    .then(result  => {
                        this.newShowcase.saveBusy = false
                        this.newShowcase.saved = true
                        return result
                    })
                    .catch(error => {
                        this.newShowcase.saveError = true
                        this.newShowcase.saveBusy = false
                        this.newShowcase.serverErrors = error.response.data.errors.slug[0]
                        return Promise.reject(error)
                    })
            })
            .catch(error => {
                this.newShowcase.saveBusy = false
                this.newShowcase.saveError = true
                return Promise.reject(error)
            })
        },

        leeroyjenkins() {
            if(confirm("Permanently destroy this showcase?")) {
                axios.delete(`/api/showcases/` + this.newShowcase.showcaseId, {})
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

            this.newShowcase.startProcessing();

            // We need to gather a fresh FormData instance with the profile photo appended to
            // the data so we can POST it up to the server. This will allow us to do async
            // uploads of the profile photos. We will update the user after this action.
            axios.post(this.urlForUpdate, this.gatherFormData())
                    .then(result  => {
                this.newShowcase.header_photo = result.data.header_photo
            this.newShowcase.thumbnail = result.data.thumbnail
            self.newShowcase.finishProcessing();
        },
            (error) => {
                self.newShowcase.setErrors(error.response.data.errors);
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
        createnewShowcase() {
            if (confirm('Abandon this showcase and start over?')) {
                this.clear()
            } else {
                return
            }
        },
        clear() {
            this.newShowcase.saved = false
            this.newShowcase.saveBusy = false
            this.newShowcase.publishBusy = false
            this.newShowcase.published = null
            this.newShowcase.publicationId = null
            this.newShowcase.showcaseId = null
            this.newShowcase.title = ''
            this.newShowcase.body = ''
            this.newShowcase.slug = ''
            this.newShowcase.header_photo = ''
            this.newShowcase.thumbnail =''
            this.newShowcase.sidebar_bottom = ''
            this.newShowcase.sidebar_top = ''
            this.newShowcase.region =''
            this.newShowcase.fishery_type = ''
            this.newShowcase.tagline = ''
            this.newShowcase.tags = []
        },
        edit(id){
            this.saveBusy = true
            this.index = false
            this.newShowcase.showcaseId = id
            this.getTags(this.newShowcase.showcaseId)
            axios.get(`/api/showcases/`+ id , {})
            .then(result => {
                this.newShowcase.title = result.data.title;
                this.newShowcase.slug = result.data.slug;
                this.newShowcase.body = result.data.body;
                this.newShowcase.showcaseId = result.data.id;
                this.newShowcase.thumbnail = result.data.thumbnail
                this.newShowcase.header_photo = result.data.header_photo
                this.newShowcase.tagline = result.data.tagline
                this.newShowcase.sidebar_top = result.data.sidebar_top
                this.newShowcase.sidebar_bottom = result.data.sidebar_bottom
                this.newShowcase.fishery_type = result.data.fishery_type
                this.newShowcase.region = result.data.region
                this.checkPublication(id)
                this.saveBusy = false
                this.newShowcase.saved = true

                return result.data
                })
            .catch(error => {
                return Promise.reject(error)
            })
        },
        getTags(id) {
            axios.get(`/showcases/`+ id + '/tags', {})
                .then(result => {
                    this.newShowcase.tags = result.data;
                    return result.data.tags
                })
                .catch(error => {
                    return Promise.reject(error)
                })
        }
    },
    computed: {
        /**
         * Get the URL for updating the team photo.
         */
        urlForUpdate() {
            return `/api/showcases/photo`;
        },


        /**
         * Calculate the style attribute for the photo preview.
         */
        previewStyle() {
            return `background-image: url(${this.newShowcase.header_photo})`;
        }
    },
    created() {
        this.validator = new VeeValidate.Validator({
            title: 'required|min:2',
            body: 'required|min:40',
            slug: 'required',
            header_photo: 'required',
            region: 'required',
            fishery_type: 'required',
            sidebar_top: 'required',
            sidebar_bottom: 'required'
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
