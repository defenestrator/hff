<template>
<div class="row">
    <div class="container">
        <button @click.prevent="toggleIndex" id="create" class="btn btn-create">
            <span v-if="index">Create</span>
            <span v-if="! index">Index</span>
        </button>
        <div v-show="! index">
            <button @click.prevent="createNewDestination" class="btn btn-primary" :disabled="! newDestination.name">
                New
            </button>
        </div>
        <table v-show="index" class="table table-striped table-inverse">
            <thead class="thead-inverse">
            <tr>
                <th>Name</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody class="resource-list">
            <tr v-for="destination in destinations" v-bind:key="destination.id" class="table-hover">
                <td><strong>{{ destination.name }}</strong></td>
                <td><button @click.prevent="(edit(destination.id))"role="button" class="btn btn-warning">Edit</button></td>
            </tr>
            </tbody>
        </table>
<hr>
            <form class="form-horizontal new-destination" v-if="! index" role="form">
                <!-- Header Photo Button -->
                <div class="form-group">
                    <div class="container">
                        <label type="button" class="btn btn-primary btn-upload" :disabled="newDestination.busy">
                            <span>Select Header Photo</span>
                            <input v-validate="'required|mimes:jpg,jpeg,png,gif'" ref="header_photo" type="file" class="form-control" name="header_photo" @change="update_header">
                        </label>
                        <span v-show="! newDestination.header_photo" class="help is-danger">This is required</span><br>
                        <span v-show="errors.has('header_photo')" class="help is-danger">{{ errors.first('header_photo') }}</span>
                        <div role="img" class="header-photo-preview"
                             :style="previewStyle">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="name">Name:</label>
                        <input v-validate="'required|min:8'" id="name" name="name" v-model="newDestination.name"
                               :class="{'form-control': true, 'input': true, 'is-danger': errors.has('name') }"
                               type="text" placeholder="Destination Name" style="width:100%" autofocus>
                        <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="lat">Latitude:</label>
                        <input v-validate="'required|min:5|max:11|between:-90.0000000,90.0000000'" id="lat" name="lat" v-model="newDestination.lat"
                               :class="{'form-control': true, 'input': true, 'is-danger': errors.has('lat') }"
                               type="text" placeholder="Latitude" style="width:100%">
                        <span v-show="errors.has('lat')" class="help is-danger">{{ errors.first('lat') }}</span>
                    </div>
                    <div class="col-md-6">
                        <label for="lng">Longitude:</label>
                        <input v-validate="'required|min:5|max:13|between:-180.00000000,180.00000000'" id="lng" name="lng" v-model="newDestination.lng"
                               :class="{'form-control': true, 'input': true, 'is-danger': errors.has('lng') }"
                               type="text" placeholder="Longitude" style="width:100%">
                        <span v-show="errors.has('lng')" class="help is-danger">{{ errors.first('lng') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="selected-region">Select Region:</label>
                        <select v-model="newDestination.regionId" id="selected-region">
                            <option v-for="region in regions" v-bind:value="region.id">{{region.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <trumbowyg id="trumbowyg" :config="trumbowygConfig" name="description" v-model="newDestination.description"></trumbowyg>
                    </div>
                </div>
                <div class="form-group">
                    <div v-show="newDestination.destinationId" class="col-md-3 col-sm-12">
                        <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newDestination.saveError }" @click.prevent="update" :disabled="newDestination.saved">
                                <span v-if="newDestination.saveBusy">
                                    <i class="fa fa-btn fa-spinner fa-spin"></i>Updating
                                 </span>
                                <span v-else-if="newDestination.saved">
                                    <i class="fa fa-btn fa-check-circle"></i>Saved!
                                 </span>
                            <span v-else-if="newDestination.saved == false">
                                    <i class="fa fa-btn fa-check-circle"></i>Update
                                 </span>
                                <span v-else>
                                    <i class="fa fa-btn fa-check-circle"></i>Updated
                                </span>

                        </button>
                    </div>
                    <div v-show="! newDestination.destinationId" class="col-md-3 col-sm-12">
                        <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newDestination.saveError }" @click.prevent="save" :disabled="newDestination.saved">
                                <span v-if="newDestination.saveBusy">
                                    <i class="fa fa-btn fa-spinner fa-spin"></i>Saving
                                 </span>
                                <span v-else-if="newDestination.destinationId !== null">
                                    <i class="fa fa-btn fa-check-circle"></i>Saved!
                                 </span>
                                <span v-else>
                                    <i class="fa fa-btn fa-check-circle"></i>Save
                                </span>
                        </button>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <button @click.prevent="leeroyjenkins" :class="{'btn': true, 'btn-danger': true, 'hidden': ! newDestination.saved  }" :disabled="! newDestination.destinationId">
                            Delete
                        </button>
                    </div>
                </div>
            </form>
        </div>
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
    },
    components: {
        trumbowyg
    },
    data() {
        return {
            index: true,
            destinations: [],
            regions: [],
            newDestination: new SparkForm ({
                header_photo:'',
                name: '',
                slug: '',
                description: '',
                lat: null,
                lng: null,
                regionId: null,
                destinationId: null,
                saveBusy: false,
                saveError: false,
                saved: false
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
        name(value) {
            this.validator.validate('name', value);
        },
        lat(value) {
            this.validator.validate('lat', value);
        },
        lng(value) {
            this.validator.validate('lng', value);
        },
        'newDestination.header_photo': function (val, oldVal) {
            this.newDestination.saved = false
        },
        'newDestination.name': function (val, oldVal) {
            this.newDestination.saved = false
        },
        'newDestination.lat': function (val, oldVal) {
            this.newDestination.saved = false
        },
        'newDestination.lng': function (val, oldVal) {
                this.newDestination.saved = false
        },
        'newDestination.description': function (val, oldVal) {
            this.newDestination.saved = false
        },
        'newDestination.regionId': function (val, oldVal) {
            this.newDestination.saved = false
        }
    },
    methods: {

        getIndex() {
            axios.get(`/api/destinations`, {})
            .then(result  => {
                this.destinations = result.data.data
                return this.destinations
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
            })
        },
        toggleIndex() {
            if(this.index == true) {
                return this.index = false
            }
            this.getIndex()
            return this.index = true
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

            this.newDestination.startProcessing();

            // We need to gather a fresh FormData instance with the profile photo appended to
            // the data so we can POST it up to the server. This will allow us to do async
            // uploads of the profile photos. We will update the user after this action.
            axios.post(this.urlForUpdate, this.gatherFormData())
                    .then(result  => {
            this.newDestination.header_photo = result.data.large
            this.newDestination.thumbnail = result.data.thumbnail
            this.newDestination.image_id = result.data.image_id

            self.newDestination.finishProcessing();
        },
            (error) => {
                self.newDestination.setErrors(error.response.data.errors);
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
        save() {
            this.newDestination.saveError = false
            this.newDestination.saveBusy = true
            this.validator.validateAll({
                name: this.newDestination.name,
                lat: this.newDestination.lat,
                lng: this.newDestination.lng
                }).then((result) => {
                    axios.post(`/api/destinations`, {
                                header_photo: this.newDestination.header_photo,
                                name: this.newDestination.name,
                                lat:  this.newDestination.lat,
                                lng:  this.newDestination.lng,
                                region_id:  this.newDestination.regionId,
                                description: this.newDestination.description
                            })
                            .then(result  => {
                                this.newDestination.saveBusy = false
                                this.newDestination.saved= true
                                this.newDestination.destinationId = result.data.id
                             return result
                            })
                            .catch(error => {
                                this.newDestination.saveError = true
                                this.newDestination.saveBusy = false
                                this.newDestination.serverErrors = error.response.data.errors.slug[0]
                                return Promise.reject(error)
                            })
                        })
            .catch(error => {
                this.newDestination.saveBusy = false
                this.newDestination.saveError = true
                this.errors = Promise.reject(error)
                return Promise.reject(error)
            })
        },
        update() {
            this.newDestination.saveError = false
            this.newDestination.saveBusy = true
            this.validator.validateAll({
                header_photo: this.newDestination.header_photo,
                name: this.newDestination.name,
                lat: this.newDestination.lat,
                lng: this.newDestination.lng
                }).then((result) => {
                    axios.put(`/api/destinations/` + this.newDestination.destinationId, {
                        header_photo: this.newDestination.header_photo,
                        name: this.newDestination.name,
                        description: this.newDestination.description,
                        lat: this.newDestination.lat,
                        lng: this.newDestination.lng,
                        region_id:  this.newDestination.regionId,
                    })
                    .then(result  => {
                        this.newDestination.saveBusy = false
                        this.newDestination.saved = true
                        return result
                    })
                    .catch(error => {
                        this.newDestination.saveError = true
                        this.newDestination.saveBusy = false
                        return Promise.reject(error)
                    })
            })
            .catch(error => {
                this.newDestination.saveBusy = false
                this.newDestination.saveError = true
                return Promise.reject(error)
            })
        },
        leeroyjenkins() {
            if(confirm("Permanently destroy this destination?")) {
                axios.delete(`/api/destinations/` + this.newDestination.destinationId, {})
                .then(result  => {
                    this.clear()
                })
                .catch(error => {
                    return Promise.reject(error)
                });
            }
        },
        createNewDestination() {
            if (!this.newDestination.destinationId) {
                if (confirm('Abandon this destination and start over?')) {
                    this.clear()
                }
            } else {
                this.clear()
            }
        },
        clear() {
            this.newDestination.header_photo = ''
            this.newDestination.saved = false
            this.newDestination.saveBusy = false
            this.newDestination.destinationId = null
            this.newDestination.name = ''
            this.newDestination.description = ''
            this.newDestination.regionId = 0
            this.newDestination
            this.newDestination.lat = null
            this.newDestination.lng = null
        },
        edit(id){
            this.saveBusy = true
            this.index = false
            this.newDestination.destinationId = id
            axios.get(`/api/destinations/`+ id , {})
            .then(result => {
                this.newDestination.header_photo = result.data.header_photo
                this.newDestination.name = result.data.name;
                this.newDestination.description = result.data.description
                this.newDestination.regionId = result.data.region_id
                this.newDestination.lat = result.data.lat;
                this.newDestination.lng = result.data.lng;
                this.saveBusy = false
                this.newDestination.saved = true
                return result.data
                })
            .catch(error => {
                return Promise.reject(error)
            })
        }
    },

    created() {
        this.validator = new VeeValidate.Validator({
            name: 'required|min:8',
            lat:  'required|min:5|max:11|between:-90.0000000,90.0000000',
            lng:  'required|min:5|max:13|between:-180.00000000,180.00000000',
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
            if (this.newDestination.header_photo == '' ) {
                return `background-image: url(${this.newDestination.header_photo}); display:none; `;
            }
            return `background-image: url(${this.newDestination.header_photo}); `;
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

    .btn .btn-warning .is-success {
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
        .new-destination .btn
        {
            width:100%;
            padding:1.34em;
            margin: 0.66em 0;
        }
    }

    .destination-index {
        position:relative;
        display:block
    }

</style>
