<template>
<div class="row">
    <div class="container">
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
            <thead class="thead-inverse">
            <tr>
                <th>Title</th>
                <th>Special?</th>
                <th>Edit</th>

            </tr>
            </thead>
            <tbody class="resource-list">
            <tr v-for="showcase in showcases" class="table-hover">
                <td><strong>{{ showcase.title }}</strong></td>

                <td>
                    <i v-if="showcase.special" class="fa fa-icon fa-check"></i>
                </td>
                <td><button @click.prevent="(edit(showcase.id))"role="button" class="btn btn-warning">Edit</button></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <form enctype="multipart/form-data" class="form-horizontal new-post" v-if="! index" role="form">
            <div class="form-group">
                <div class="col-md-12">
                    <p role="presentation" name="title"><strong>Title: </strong></p>
                    <input v-validate="'required|min:8|max:140'" name="title" v-model="newShowcase.title" :class="{'form-control': true, 'input': true, 'is-danger': errors.has('title') }"
                           type="text" placeholder="Showcase Title" style="width:100%">
                    <span v-show="errors.has('title')" class="help is-danger">{{ errors.first('title') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <p role="presentation"><strong>Sub-title: </strong></p>
                    <input v-validate="'required|min:4|max:140'" id="tagline" class="form-control input" name="tagline" v-model="newShowcase.tagline" placeholder="Make it a zinger" />
                    <span v-show="errors.has('tagline')" class="help is-danger">{{ errors.first('tagline') }}</span>
                </div>
            </div>
            <!-- Header Photo Button -->
            <div class="form-group">
                <div class="container">
                    <label type="button" class="btn btn-primary btn-upload" :disabled="newShowcase.busy">
                        <span>Select Header Photo</span>
                        <input v-validate="'required|mimes:jpg,jpeg,png,gif'" ref="header_photo" type="file" class="form-control" name="header_photo" @change="update_header">
                    </label>
                    <p role="presentation"><strong>Showcase page header preview:</strong></p>
                    <span v-show="errors.has('header_photo')" class="help is-danger">{{ errors.first('header_photo') }}</span>
                    <div role="img" class="header-photo-preview"
                         :style="previewStyle">
                        <h1 style="padding:0 0.5em;" class="showcase-header feature-tagline text-center wow pulse" data-wow-duration="0.5s">
                            <a :title="newShowcase.title"></a>
                            {{newShowcase.title}}
                        </h1>
                        <h2 class="feature-tagline text-center">{{newShowcase.tagline}} </h2>
                    </div>
                </div>
            </div>

            <input style="display:none;" name="slug" v-validate="'required|min:8'" v-model="newShowcase.slug" :class="{'form-control': true, 'input': true, 'is-danger': errors.has('slug') }" disabled />
            <div class="form-group">
                <div class="col-md-6">
                    <p role="presentation"><strong>Homepage top line: </strong></p>
                    <input v-validate="'required|min:3|max:40'" id="homepage_top" class="form-control input" name="homepage_top" v-model="newShowcase.homepage_top" placeholder="Homepage top line" />
                    <span v-show="errors.has('homepage_top')" class="help is-danger">{{ errors.first('homepage_top') }}</span>
                </div>
                <div class="col-md-6">
                    <p role="presentation"><strong>Homepage bottom line: </strong></p>
                    <input v-validate="'required|min:3|max:40'" class="form-control input" id="homepage_bottom" name="homepage_bottom" v-model="newShowcase.homepage_bottom" placeholder="Homepage bottom line" />
                    <span v-show="errors.has('homepage_bottom')" class="help is-danger">{{ errors.first('homepage_bottom') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <p role="presentation"><strong>Homepage tile preview</strong></p>
                    <div class="col-md-6 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 info">
                        <a href="#" :title="newShowcase.title">
                            <div class="thumbnail"
                                 :style="tileStyle">
                                <div class="caption">
                                    <h3 style="font-weight:600;">{{newShowcase.homepage_top}}</h3>
                                    <h3 style="font-weight:600;">{{newShowcase.homepage_bottom}}</h3>
                                </div>
                                <a v-if="newShowcase.special" href="#">
                                    <button role="button"
                                            style="padding:6px 12px; box-shadow: 2px 2px 2px #000; margin:0 15%;
                                            width:70%;" class="btn btn-warning">
                                        learn more
                                    </button>
                                </a>
                            </div>
                        </a>
                    </div>
                    <p role="presentation"><strong>Make it special:</strong></p>
                    <div class="col-md-6 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
                        <div style="padding:1em; border:1px solid #ccc;" class="checkbox">
                            <label for="special" class="checkbox checkbox-inline">
                                <h3><input id="special" name="special" v-model="newShowcase.special"
                                       type="checkbox">
                                Is this is a special?</h3>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <h4 role="presentation"><strong>Showcase Body:</strong></h4>
                    <trumbowyg id="trumbowyg" :config="trumbowygConfig" name="body" v-validate="'required|min:20'" v-model="newShowcase.body"></trumbowyg>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="selected-region">Select Region:</label>
                        <select v-model="newShowcase.regionId" id="selected-region">
                            <option v-for="region in regions" v-bind:value="region.id">{{region.name}}</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="selected-destination">Select Destination:</label>
                        <select v-model="newShowcase.destinationId" id="selected-destination">
                            <option v-for="destination in destinations" v-bind:value="destination.id">{{destination.name}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <div class="col-md-6">
                        <h4 role="presentation"><strong>Sidebar Top:</strong></h4>
                        <trumbowyg id="sidebarTopTrumbowyg" :config="trumbowygConfig" name="sidebar_top" v-validate="'min:4'" v-model="newShowcase.sidebar_top"></trumbowyg>
                    </div>
                    <div class="col-md-6">
                        <h4 role="presentation"><strong>Sidebar Bottom:</strong></h4>
                        <trumbowyg id="sidebarBottomTrumbowyg" :config="trumbowygConfig" name="sidebar_bottom" v-validate="'min:4'" v-model="newShowcase.sidebar_bottom"></trumbowyg>

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
        this.getRegions()
        this.getDestinations()
    },
    components: {
        trumbowyg
    },
    data() {
        return {
            index: true,
            showcases: [],
            regions: [],
            destinations: [],
            newShowcase: new SparkForm({
                title: '',
                slug: '',
                body: '',
                tagline: "",
                sidebar_top: "",
                sidebar_bottom: "",
                homepage_top: "",
                homepage_bottom: "",
                destinationId:null,
                regionId:null,
                special: false,
                header_photo:"",
                image_id: null,
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
                        serverPath: '/cms/posts/images',
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
        title(value) {
            this.validator.validate('title', value);
        },
        body(value) {
            this.validator.validate('body', value);
        },
        homepage_top(value) {
            this.validator.validate('homepage_top', value);
        },
        homepage_bottom(value) {
            this.validator.validate('homepage_bottom', value);
        },
        sidebar_top(value) {
            this.validator.validate('sidebar_top', value);
        },
        sidebar_bottom(value) {
            this.validator.validate('sidebar_bottom', value);
        },
        tagline(value) {
            this.validator.validate('tagline', value);
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
        'newShowcase.header_photo': function (val, oldVal) {
            this.newShowcase.saved = false
        },
        'newShowcase.homepage_top': function (val, oldVal) {
            this.newShowcase.saved = false
        },
        'newShowcase.homepage_bottom': function (val, oldVal) {
            this.newShowcase.saved = false
        },
        'newShowcase.tagline': function (val, oldVal) {
            this.newShowcase.saved = false
        },
        'newShowcase.body': function (val, oldVal) {
            this.newShowcase.saved = false
        },
        'newShowcase.sidebar_top': function (val, oldVal) {
            this.newShowcase.saved = false
        },
        'newShowcase.sidebar_bottom': function (val, oldVal) {
            this.newShowcase.saved = false
        },
        'newShowcase.tags': function (val, oldVal) {
            this.newShowcase.saved = false
        },
        'newShowcase.regionId': function (val, oldVal) {
            this.newShowcase.saved = false
        },
        'newShowcase.destinationId': function (val, oldVal) {
            this.newShowcase.saved = false
        },

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
        getRegions() {
            axios.get(`/api/regions`, {})
                .then(result  => {
                this.regions = result.data.data
                return this.regions
            })
            .catch(error => {
                return Promise.reject(error)
        })},
        getDestinations() {
            axios.get(`/api/destinations`, {})
                .then(result  => {
                this.destinations = result.data.data
                return this.destinations
            })
            .catch(error => {
                return Promise.reject(error)
        })}
            ,
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
                body: this.newShowcase.body
                }).then((result) => {
                    axios.post(`/api/showcases`, {
                                title: this.newShowcase.title,
                                slug:  this.newShowcase.slug,
                                body:  this.newShowcase.body,
                                tagline: this.newShowcase.tagline ,
                                sidebar_bottom: this.newShowcase.sidebar_bottom ,
                                sidebar_top: this.newShowcase.sidebar_top ,
                                homepage_top: this.newShowcase.homepage_top,
                                homepage_bottom: this.newShowcase.homepage_bottom,
                                destination_id: this.newShowcase.destinationId,
                                region_id: this.newShowcase.regionId,
                                header_photo:this.newShowcase.header_photo,
                                image_id: this.newShowcase.image_id,
                                thumbnail: this.newShowcase.thumbnail,
                                special: this.newShowcase.special,
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
                        body:  this.newShowcase.body,
                        tagline: this.newShowcase.tagline ,
                        sidebar_bottom: this.newShowcase.sidebar_bottom ,
                        sidebar_top: this.newShowcase.sidebar_top ,
                        homepage_top: this.newShowcase.homepage_top,
                        homepage_bottom: this.newShowcase.homepage_bottom,
                        destination_id: this.newShowcase.destinationId,
                        region_id: this.newShowcase.regionId,
                        header_photo:this.newShowcase.header_photo,
                        image_id: this.newShowcase.image_id,
                        thumbnail: this.newShowcase.thumbnail ,
                        special: this.newShowcase.special,
                        tags: this.newShowcase.tags
                    })
                    .then(result  => {
                        this.newShowcase.saveBusy = false
                        this.newShowcase.slug = result.data.slug
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
                this.newShowcase.header_photo = result.data.large
                this.newShowcase.thumbnail = result.data.thumbnail
                this.newShowcase.image_id = result.data.image_id
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
            if (confirm('Clear this form and create a new showcase?')) {
                this.clear()
            } else {
                return
            }
        },
        clear() {
            this.newShowcase.saved = true
            this.newShowcase.saveBusy = false
            this.newShowcase.publishBusy = false
            this.newShowcase.published = null
            this.newShowcase.publicationId = null
            this.newShowcase.showcaseId = null
            this.newShowcase.title = ''
            this.newShowcase.body = ''
            this.newShowcase.slug = ''
            this.newShowcase.header_photo = ''
            this.newShowcase.thumbnail = ''
            this.newShowcase.destinationId = null
            this.newShowcase.regionId = null
            this.newShowcase.sidebar_bottom = ''
            this.newShowcase.sidebar_top = ''
            this.newShowcase.homepage_bottom =''
            this.newShowcase.homepage_top = ''
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
                this.newShowcase.homepage_top = result.data.homepage_top
                this.newShowcase.homepage_bottom = result.data.homepage_bottom
                this.newShowcase.special = result.data.special
            this.newShowcase.destinationId = result.data.destination_id
            this.newShowcase.regionId = result.data.region_id
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
            return `/api/photo`;
        },


        /**
         * Calculate the style attribute for the photo preview.
         */
        previewStyle() {
            return `padding:2em 0; background-image: url(${this.newShowcase.header_photo});`;
        },
        tileStyle() {
            return `background-position: center center;background-image: url(${this.newShowcase.header_photo});`;
        }

    },
    created() {
        this.validator = new VeeValidate.Validator({
            title: 'required|min:2',
            body: 'required|min:40',
            header_photo: 'required',
            homepage_bottom: 'required',
            homepage_top: 'required',
            sidebar_top: 'required',
            sidebar_bottom: 'required'
        });
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
        }
    }
    .post-index {
        position:relative;
        display:block
    }
</style>
