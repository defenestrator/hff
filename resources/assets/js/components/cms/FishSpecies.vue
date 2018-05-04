<template>
<div class="row">
    <div class="container">
        <button @click.prevent="toggleIndex" id="create" class="btn btn-create">
            <span v-if="index">Create</span>
            <span v-if="! index">Index</span>
        </button>
        <div v-show="! index">
            <button @click.prevent="createNewContentItem" class="btn btn-primary" :disabled="! newContentItem.common_name">
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
            <tr v-for="content in contents" v-if="user.id == content.user_id || dev" class="table-hover">
                <td><strong>{{ content.common_name }}</strong></td>
                <td><button @click.prevent="(edit(content.id))"role="button" class="btn btn-warning">Edit</button></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <hr>
        <form class="form-horizontal new-content" v-if="! index" role="form">
            <div class="form-group">
                <div v-show="newContentItem.contentItemId" class="col-md-2 hidden-sm hidden-xs">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newContentItem.saveError }" @click.prevent="update" :disabled="newContentItem.saved">
                            <span v-if="newContentItem.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Updating
                             </span>
                            <span v-else-if="newContentItem.saved">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                        <span v-else-if="newContentItem.saved == false">
                                <i class="fa fa-btn fa-check-circle"></i>Update
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Updated
                            </span>

                    </button>
                </div>
                <div v-show="! newContentItem.contentItemId" class="col-md-2 hidden-sm hidden-xs">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newContentItem.saveError }" @click.prevent="save" :disabled="newContentItem.saved || newContentItem.saveBusy">
                            <span v-if="newContentItem.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Saving
                             </span>
                            <span v-else-if="newContentItem.contentItemId !== null">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Save
                            </span>
                    </button>
                </div>
                <div v-if="dev" class="col-md-2 hidden-sm hidden-xs">
                    <button :class="{'btn': true, 'btn-warning': true, 'is-success': newContentItem.published }"  @click.prevent="publish" :disabled="newContentItem.published || ! newContentItem.saved">
                        <span v-if="newContentItem.publishBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Publishing
                             </span>
                             <span class="is-success" v-else-if="newContentItem.published !== null">
                                <i class="fa fa-btn btn-success fa-newspaper-o"></i>Published!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-newspaper-o"></i>Publish
                            </span>
                    </button>
                </div>
                <div class="col-md-2 hidden-sm hidden-xs">
                    <button v-if="dev" @click.prevent="unpublish" :class="{'btn': true, 'btn-warning': true, 'hidden': ! newContentItem.published }">
                        Unpublish
                    </button>
                </div>
                <div class="col-md-2 hidden-sm hidden-xs">
                    <button @click.prevent="leeroyjenkins" :class="{'btn': true, 'btn-danger': true, 'hidden': newContentItem.published }" :disabled="! newContentItem.contentItemId">
                        Delete
                    </button>
                </div>
            </div>
            <!-- Header Photo Button -->
            <div class="form-group">
                <div class="container">
                    <label type="button" class="btn btn-primary btn-upload" :disabled="newContentItem.busy">
                        <span>Select Header Photo</span>
                        <input v-validate="'required|mimes:jpg,jpeg,png,gif'" ref="header_photo" type="file" class="form-control" name="header_photo" @change="update_header">
                    </label>
                    <span v-show="! newContentItem.header_photo" class="help is-danger">This is required</span><br>
                    <span v-show="errors.has('header_photo')" class="help is-danger">{{ errors.first('header_photo') }}</span>
                    <div role="img" class="header-photo-preview"
                         :style="previewStyle">

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12"><p>Common Name:</p>
                    <input v-validate="'required|min:2|max:140'" id="common_name" name="common_name" v-model="newContentItem.common_name"
                           :class="{'form-control': true, 'input': true, 'is-danger': errors.has('common_name') }" type="text" placeholder="common name"
                           style="width:100%">
                    <span v-show="errors.has('common_name')" class="help is-danger">{{ errors.first('common_name') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                   <p>Genus:</p>
                    <input v-validate="'required|min:2|max:140'" id="genus" name="genus" v-model="newContentItem.genus"
                           :class="{'form-control': true, 'input': true, 'is-danger': errors.has('genus') }" type="text" placeholder="Genus"
                           style="width:100%">
                    <span v-show="errors.has('genus')" class="help is-danger">{{ errors.first('genus') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <p>species:</p>
                    <input v-validate="'required|min:2|max:140'" id="species" name="species" v-model="newContentItem.species"
                           :class="{'form-control': true, 'input': true, 'is-danger': errors.has('species') }" type="text" placeholder="species"
                           style="width:100%">
                    <span v-show="errors.has('species')" class="help is-danger">{{ errors.first('species') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <p>Description:</p>
                    <trumbowyg id="trumbowyg" :config="trumbowygConfig" name="description" v-validate="'required|min:16'" v-model="newContentItem.description"></trumbowyg>
                    <span v-show="errors.has('description')" class="help is-danger">{{ errors.first('description') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div v-show="newContentItem.contentItemId" class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newContentItem.saveError }" @click.prevent="update" :disabled="newContentItem.saved">
                            <span v-if="newContentItem.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Updating
                             </span>
                            <span v-else-if="newContentItem.saved">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                        <span v-else-if="newContentItem.saved == false">
                                <i class="fa fa-btn fa-check-circle"></i>Update
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Updated
                            </span>

                    </button>
                </div>
                <div v-show="! newContentItem.contentItemId" class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newContentItem.saveError }" @click.prevent="save" :disabled="newContentItem.saved || newContentItem.saveBusy ">
                            <span v-if="newContentItem.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Saving
                             </span>
                            <span v-else-if="newContentItem.contentItemId !== null">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Save
                            </span>
                    </button>
                </div>
                <div v-if="dev" class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-warning': true, 'is-success': newContentItem.published }"  @click.prevent="publish" :disabled="newContentItem.published || ! newContentItem.saved">
                        <span v-if="newContentItem.publishBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Publishing
                             </span>
                             <span class="is-success" v-else-if="newContentItem.published !== null">
                                <i class="fa fa-btn btn-success fa-newspaper-o"></i>Published!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-newspaper-o"></i>Publish
                            </span>
                    </button>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button v-if="dev" @click.prevent="unpublish" :class="{'btn': true, 'btn-warning': true, 'hidden': ! newContentItem.published }">
                        Unpublish
                    </button>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button @click.prevent="leeroyjenkins" :class="{'btn': true, 'btn-danger': true, 'hidden': newContentItem.published }" :disabled="! newContentItem.contentItemId">
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
    props: ['user', 'dev', 'content-type'],
    validator: null,
    created() {

    },
    mounted() {
        this.getIndex()
        this.confirmNavAway()
    },
    components: {
        trumbowyg
    },
    data() {
        return {
            index: true,
            contents: [],
            newContentItem: new SparkForm ({
                header_photo:'',
                common_name: '',
                genus: '',
                species: '',
                slug: '',
                description: '',
                link: '',
                contentItemId: null,
                saveBusy: false,
                saveError: false,
                saved: true,
                serverErrors: null,
                publishBusy: false,
                published: null,
                publicationId: null,
                errors: null
            }),
            trumbowygConfig: {
                id: 'trumbowyg',
                autogrow: true,
                svgPath: '/images/icons.svg',
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
        'newContentItem.header_photo': function (val, oldVal) {
            this.newContentItem.saved = false
        },
        common_name(value) {
            this.validator.validate('common_name', value);
        },
        description(value) {
            this.validator.validate('description', value);
        },
        genus(value) {
            this.validator.validate('genus', value);
        },
        species(value) {
            this.validator.validate('species', value);
        },

        /**
            * Watch the common_name and create slug.
        */
        'newContentItem.common_name': function (val, oldVal) {
            this.newContentItem.serverErrors = null
            if (this.newContentItem.slug == '' ||
                    this.newContentItem.slug == this.makeSlug(oldVal)
            ) {
                this.newContentItem.slug = this.makeSlug(val)
            }
            this.newContentItem.saved = false
        },
        'newContentItem.description': function (val, oldVal) {
            this.newContentItem.saved = false
        },
        'newContentItem.genus': function (val, oldVal) {
            this.newContentItem.saved = false
        },
        'newContentItem.apwxiwa': function (val, oldVal) {
            this.newContentItem.saved = false
        }
    },
    methods: {
        makeSlug(inputString) {
            return inputString.toLowerCase().trim().replace(/[\s\W-]+/g, '-')
        },

        getIndex() {
            axios.get('/api/fish-species', {})
            .then(result  => {
                this.contents = result.data.data
                return this.contents
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
        confirmNavAway() {
            window.onbeforeunload = function() {
                return 'You may lose unsaved changes!'
            }
        },
        save() {
            this.newContentItem.saveError = false
            this.newContentItem.saveBusy = true
            this.validator.validateAll({
                common_name: this.newContentItem.common_name,
                description: this.newContentItem.description,
                slug: this.newContentItem.slug
                }).then((result) => {
                    axios.post('/api/' + this.contentType + '/', {
                                common_name: this.newContentItem.common_name,
                                genus: this.newContentItem.genus,
                                species: this.newContentItem.species,
                                header_photo: this.newContentItem.header_photo,
                                slug:  this.newContentItem.slug,
                                description:  this.newContentItem.description
                            })
                            .then(result  => {
                                this.newContentItem.saveBusy = false
                                this.newContentItem.saved= true
                                this.newContentItem.contentItemId = result.data.id
                                swal({
                                    title: 'SUCCESS!',
                                    text: 'The content was saved.',
                                    type: 'success',
                                    timer: 2000
                                });
                                return result
                            })
                            .catch(error => {
                                this.newContentItem.saveError = true
                                this.newContentItem.saveBusy = false
                                var saveErrors = error.response.data.errors
                                var thisError = error.response.data.errors[Object.keys(saveErrors) [0]]
                                swal({
                                    title: 'SAVE FAILED!',
                                    text: thisError,
                                    type: 'error',
                                    timer: 3000,
                                });
                                return Promise.reject(error)
                            })
                        })
            .catch(error => {
                this.newContentItem.saveBusy = false
                this.newContentItem.saveError = true
                var saveErrors = error.response.data.errors
                var thisError = error.response.data.errors[Object.keys(saveErrors) [0]]
                this.errors = Promise.reject(error)
                swal({
                    title: 'SAVE FAILED!',
                    text: thisError,
                    type: 'error',
                    timer: 3000,
                });
                return Promise.reject(error)
            })
        },

        publish() {
            this.newContentItem.publishBusy = true
            if (this.newContentItem.contentItemId === null) {
                this.newContentItem.publishBusy = false
                this.save()
                return
            }
             axios.post('/api/publications', {
                    type:    this.contentType,
                    content_id: this.newContentItem.contentItemId
                 })
                 .then(result  => {
                     this.newContentItem.publishBusy = false
                     this.newContentItem.publicationId = result.data.id
                     return result
                 })
                 .catch(error => {
                     this.newContentItem.publishBusy = false
                     return Promise.reject(error)
                 });
                this.newContentItem.publishBusy = false
                this.newContentItem.published = true

            },

        unpublish() {
            const contentItemId = this.newContentItem.contentItemId
            axios.delete('/api/publications/'
                + this.newContentItem.publicationId, {})
            .then(result  => {
                this.newContentItem.publicationId = null
                this.newContentItem.publishBusy = false
                this.newContentItem.published = null
                this.checkPublication(contentItemId)
                return result
            })
            .catch(error => {
                this.newContentItem.publishBusy = false
                return Promise.reject(error)
            });
        },

        checkPublication(id){
            axios.get('/api/' + this.contentType + '/publications/' + id, {})
                .then(result  => {
                    this.newContentItem.publicationId = result.data.id
                    if (this.newContentItem.publicationId === undefined) {
                        this.newContentItem.publicationId = null
                        this.newContentItem.published = null
                    } else {
                        this.newContentItem.published = true
                        this.newContentItem.publishBusy = false
                    }
                    return result.data
                })
                .catch(error => {
                    return Promise.reject(error)
                })
        },

        update() {
            axios.put('/api/' + this.contentType  + '/'+ this.newContentItem.contentItemId, {
                common_name: this.newContentItem.common_name,
                header_photo: this.newContentItem.header_photo,
                genus: this.newContentItem.genus,
                species: this.newContentItem.species,
                slug:  this.newContentItem.slug,
                description:  this.newContentItem.description
            })
            .then(result  => {
                this.newContentItem.saveBusy = false
                this.newContentItem.saved = true
                swal({
                    title: 'SUCCESS!',
                    text: 'The content was updated.',
                    type: 'success',
                    timer: 2000
                });
                return result
            })
            .catch(error => {
                this.newContentItem.saveError = true
                this.newContentItem.saveBusy = false
                var saveErrors = error.response.data.errors
                var thisError = error.response.data.errors[Object.keys(saveErrors) [0]]
                swal({
                    title: 'UPDATE FAILED!',
                    text: thisError,
                    type: 'error',
                    timer: 3000,
                });
                return Promise.reject(error)
            })
        },

        leeroyjenkins() {
            if(confirm("Permanently destroy this content?")) {
                axios.delete('/api' + this.contentType + '/' + this.newContentItem.contentItemId, {})
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

            this.newContentItem.startProcessing();

            // We need to gather a fresh FormData instance with the profile photo appended to
            // the data so we can POST it up to the server. This will allow us to do async
            // uploads of the profile photos. We will update the user after this action.
            axios.post(this.urlForUpdate, this.gatherFormData())
                .then(result  => {
                    this.newContentItem.header_photo = result.data.large
                    this.newContentItem.thumbnail = result.data.thumbnail
                    this.newContentItem.image_id = result.data.image_id
                    self.newContentItem.finishProcessing();
                },
                (error) => {
                    self.newContentItem.setErrors(error.response.data.errors);
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
        createNewContentItem() {
            if (!this.newContentItem.contentItemId) {
                if (confirm('Abandon this content and start over?')) {
                    this.clear()
                }
            } else {
                this.clear()
            }
        },
        clear() {
            this.newContentItem = new SparkForm ({
                header_photo:'',
                common_name: '',
                genus: '',
                species: '',
                slug: '',
                description: '',
                link: '',
                contentItemId: null,
                saveBusy: false,
                saveError: false,
                saved: true,
                serverErrors: null,
                publishBusy: false,
                published: null,
                publicationId: null,
                errors: null
            })
        },
        edit(id){
            this.saveBusy = true
            this.index = false
            this.newContentItem.contentItemId = id
            axios.get('/api/' + this.contentType + '/' + id , {})
            .then(result => {
                this.newContentItem.common_name = result.data.common_name;
                this.newContentItem.header_photo = result.data.header_photo
                this.newContentItem.genus = result.data.genus
                this.newContentItem.species = result.data.species
                this.newContentItem.slug = result.data.slug;
                this.newContentItem.description = result.data.description;
                this.newContentItem.contentItemId = result.data.id;
                this.checkPublication(id)
                this.saveBusy = false
                this.newContentItem.saved = true

                return result.data
                })
            .catch(error => {
                return Promise.reject(error)
            })
        }
    },

    created() {
        this.validator = new VeeValidate.Validator({
            common_name: 'required|min:2',
            description: 'required|min:40',
            slug: 'required'
        });
    },
    computed: {

        /**
         * Get the URL for updating the team photo.
         */
        urlForUpdate() {
            return '/api/photo';
        },
        /**
         * Calculate the style attribute for the photo preview.
         */
        previewStyle() {
            if (this.newContentItem.header_photo == '' ) {
                return `background-image: url(${this.newContentItem.header_photo}); display:none; `;
            }
            return `background-image: url(${this.newContentItem.header_photo}); `;
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
        .new-content .btn
        {
            width:100%;
            padding:1.34em;
            margin: 0.66em 0;
        }
    }
    .content-index {
        position:relative;
        display:block
    }
    .btn-warning.disabled:hover,
    .btn-warning[disabled]:hover,
    fieldset[disabled] .btn:hover,
    .btn.disabled:focus,
    .btn[disabled]:focus,
    fieldset[disabled] .btn:focus {
        background-color:transparent !important;
    }
</style>
