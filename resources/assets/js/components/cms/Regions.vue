<template>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <button @click.prevent="toggleIndex" id="create" class="btn btn-create">
                <span v-if="index">Create</span>
                <span v-if="! index">Index</span>
            </button>
            <div v-show="! index">
                <button @click.prevent="createNewDestination" class="btn btn-primary" :disabled="! newRegion.name">
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
                <tr v-for="region in regions" class="table-hover">
                    <td><strong>{{ region.name }}</strong></td>
                    <td><button @click.prevent="(edit(region.id))"role="button" class="btn btn-warning">Edit</button></td>
                </tr>
                </tbody>
            </table>

            <form class="form-horizontal new-region" v-if="! index" role="form">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="name">Name:</label>
                        <input v-validate="'required|min:3'" id="name" name="name" v-model="newRegion.name"
                               :class="{'form-control': true, 'input': true, 'is-danger': errors.has('name') }" type="text" placeholder="Destination Name" style="width:100%">
                        <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="lat">Latitude:</label>
                        <input v-validate="'min:5|max:11|between:-90.0000000,90.0000000'" id="lat" name="lat" v-model="newRegion.lat"
                               :class="{'form-control': true, 'input': true, 'is-danger': errors.has('lat') }"
                               type="text" placeholder="Latitude" style="width:100%">
                        <span v-show="errors.has('lat')" class="help is-danger">{{ errors.first('lat') }}</span>
                    </div>
                    <div class="col-md-6">
                        <label for="lng">Longitude:</label>
                        <input v-validate="'min:5|max:12|between:-180.0000000,180.0000000'" id="lng" name="lng" v-model="newRegion.lng"
                               :class="{'form-control': true, 'input': true, 'is-danger': errors.has('lng') }"
                               type="text" placeholder="Longitude" style="width:100%">
                        <span v-show="errors.has('lng')" class="help is-danger">{{ errors.first('lng') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <p for="geojson">Paste geojson here:</p>
                        <textarea rows="5" columns="30" id="geojson" name="geojson" v-model="newRegion.geojson"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div v-show="newRegion.regionId" class="col-md-3 col-sm-12">
                        <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newRegion.saveError }" @click.prevent="update" :disabled="newRegion.saved">
                                    <span v-if="newRegion.saveBusy">
                                        <i class="fa fa-btn fa-spinner fa-spin"></i>Updating
                                     </span>
                                    <span v-else-if="newRegion.saved">
                                        <i class="fa fa-btn fa-check-circle"></i>Saved!
                                     </span>
                                <span v-else-if="newRegion.saved == false">
                                        <i class="fa fa-btn fa-check-circle"></i>Update
                                     </span>
                                    <span v-else>
                                        <i class="fa fa-btn fa-check-circle"></i>Updated
                                    </span>

                        </button>
                    </div>
                    <div v-show="! newRegion.regionId" class="col-md-3 col-sm-12">
                        <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newRegion.saveError }" @click.prevent="save" :disabled="newRegion.saved">
                                    <span v-if="newRegion.saveBusy">
                                        <i class="fa fa-btn fa-spinner fa-spin"></i>Saving
                                     </span>
                                    <span v-else-if="newRegion.regionId !== null">
                                        <i class="fa fa-btn fa-check-circle"></i>Saved!
                                     </span>
                                    <span v-else>
                                        <i class="fa fa-btn fa-check-circle"></i>Save
                                    </span>
                        </button>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <button @click.prevent="leeroyjenkins" :class="{'btn': true, 'btn-danger': true, 'hidden': ! newRegion.saved }" :disabled="! newRegion.regionId">
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
Vue.use(VeeValidate);
export default {
    validator: null,
    mounted() {
        this.getIndex()
    },
    components: {
    },
    data() {
        return {
            index: true,
            regions: [],
            newRegion: new SparkForm ({
                name: '',
                geojson: '',
                slug: '',
                lat: null,
                lng: null,
                regionId: null,
                saveBusy: false,
                saveError: false,
                saved: false
            })
        }
    },
    watch: {
        name(value) {
            this.validator.validate('name', value);
            if (this.newRegion.slug == '' ||
                    this.newRegion.slug == oldVal.toLowerCase().replace(/[\s\W-]+/g, '-')
            ) {
                this.newRegion.slug = val.toLowerCase().replace(/[\s\W-]+/g, '-');
            }
        },
        lat(value) {
            this.validator.validate('lat', value);
        },
        lng(value) {
            this.validator.validate('lng', value);
        },
        'newRegion.name': function (val, oldVal) {
            this.newRegion.saved = false
        },
        'newRegion.lat': function (val, oldVal) {
            this.newRegion.saved = false
        },
        'newRegion.lng': function (val, oldVal) {
                this.newRegion.saved = false
        },
        'newRegion.geojson': function (val, oldVal) {
            this.newRegion.saved = false
        }
    },
    methods: {

        getIndex() {
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

        save() {
            this.newRegion.saveError = false
            this.newRegion.saveBusy = true
            this.validator.validateAll({
                name: this.newRegion.name,
                lat: this.newRegion.lat,
                lng: this.newRegion.lng
                }).then((result) => {
                    axios.post(`/api/regions`, {
                                name: this.newRegion.name,
                                lat:  this.newRegion.lat,
                                lng:  this.newRegion.lng,
                                geojson: this.newRegion.geojson,
                                slug: this.newRegion.slug,
                            })
                            .then(result  => {
                                this.newRegion.saveBusy = false
                                this.newRegion.saved= true
                                this.newRegion.regionId = result.data.id
                             return result
                            })
                            .catch(error => {
                                this.newRegion.saveError = true
                                this.newRegion.saveBusy = false
                                this.newRegion.serverErrors = error.response.data.errors.slug[0]
                                return Promise.reject(error)
                            })
                        })
            .catch(error => {
                this.newRegion.saveBusy = false
                this.newRegion.saveError = true
                this.errors = Promise.reject(error)
                return Promise.reject(error)
            })
        },
        update() {
            this.newRegion.saveError = false
            this.newRegion.saveBusy = true
            this.validator.validateAll({
                name: this.newRegion.name,
                lat: this.newRegion.lat,
                lng: this.newRegion.lng
                }).then((result) => {
                    axios.put(`/api/regions/` + this.newRegion.regionId, {
                        name: this.newRegion.name,
                        geojson: this.newRegion.geojson,
                        lat: this.newRegion.lat,
                        lng: this.newRegion.lng
                    })
                    .then(result  => {
                        this.newRegion.saveBusy = false
                        this.newRegion.saved = true
                        return result
                    })
                    .catch(error => {
                        this.newRegion.saveError = true
                        this.newRegion.saveBusy = false
                        return Promise.reject(error)
                    })
            })
            .catch(error => {
                this.newRegion.saveBusy = false
                this.newRegion.saveError = true
                return Promise.reject(error)
            })
        },
        leeroyjenkins() {
            if(confirm("Permanently destroy this region?")) {
                axios.delete(`/api/regions/` + this.newRegion.regionId, {})
                .then(result  => {
                    this.clear()
                })
                .catch(error => {
                    return Promise.reject(error)
                });
            }
        },
        createNewDestination() {
            if (!this.newRegion.regionId) {
                if (confirm('Abandon this region and start over?')) {
                    this.clear()
                }
            } else {
                this.clear()
            }
        },
        clear() {
            this.newRegion.saved = false
            this.newRegion.saveBusy = false
            this.newRegion.regionId = null
            this.newRegion.name = ''
            this.newRegion.geojson = ''
            this.newRegion.lat = null
            this.newRegion.lng = null
        },
        edit(id){
            this.saveBusy = true
            this.index = false
            this.newRegion.regionId = id
            axios.get(`/api/regions/`+ id , {})
            .then(result => {
                this.newRegion.name = result.data.name;
                this.newRegion.geojson = result.data.geojson
                this.newRegion.lat = result.data.lat;
                this.newRegion.lng = result.data.lng;
                this.saveBusy = false
                this.newRegion.saved = true
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
            lat: 'required|numeric|min:4',
            lng: 'required|numeric|min:4',
        });
    },
    computed: {
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
        .new-region .btn
        {
            width:100%;
            padding:1.34em;
            margin: 0.66em 0;
        }
    }

    .region-index {
        position:relative;
        display:block
    }

</style>
