// Import this component
import trumbowyg from 'vue-trumbowyg';

// Import editor css
import 'trumbowyg/dist/ui/trumbowyg.css';

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);
Vue.component('create-showcase', {
    validator: null,
    components: {
        trumbowyg
    },
    data() {
        return {
            form: new SparkForm({
                title: "",
                slug: "",
                body: "",
                tagline: "",
                sidebar_top: "",
                sidebar_bottom: "",
                fishery_type: "",
                region: "",
                header_photo:"",
                thumbnail: ""
            }),
            trumbowygConfig: {
                id: 'trumbowyg',
                btnsDef: {
                    // Customizables dropdowns
                    image: {
                        dropdown: ['insertImage', 'upload', 'base64', 'noembed'],
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
            },
            trumbowygSidebarTop: {
                id: 'sidebar-top-trumbowyg',
                btnsDef: {
                    // Customizables dropdowns
                    image: {
                        dropdown: ['insertImage', 'upload', 'base64', 'noembed'],
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
            },
            trumbowygSidebarBottom: {
                id: 'sidebar-bottom-trumbowyg',
                btnsDef: {
                    // Customizables dropdowns
                    image: {
                        dropdown: ['insertImage', 'upload', 'base64', 'noembed'],
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
    methods: {
        save(){
            this.form.startProcessing();
            axios.post(`/api/showcases`, {
                    title: this.form.title,
                    slug:  this.form.slug,
                    body:  this.form.body,
                    tagline: this.form.tagline,
                    region: this.form.region,
                    sidebar_top: this.form.sidebar_top,
                    sidebar_bottom: this.form.sidebar_bottom,
                    fishery_type: this.form.fishery_type,
                    header_photo: this.form.header_photo,
                    thumbnail: this.form.thumbnail
                })
                .then(result  => {
                    console.log(result.data)
                    self.form.finishProcessing();
                    return result
                })
                .catch(error => {
                    self.form.setErrors(error.response.data.errors);
                })
                this.form.busy = false
            },
        /**
         * Update the showcase photo.
         */
        update(e) {
            e.preventDefault();

            if ( ! this.$refs.header_photo.files.length) {
                return;
            }

            var self = this;

            this.form.startProcessing();

            // We need to gather a fresh FormData instance with the profile photo appended to
            // the data so we can POST it up to the server. This will allow us to do async
            // uploads of the profile photos. We will update the user after this action.
            axios.post(this.urlForUpdate, this.gatherFormData())
                .then(result  => {
                        this.form.header_photo = result.data.header_photo
                        this.form.thumbnail = result.data.thumbnail
                        self.form.finishProcessing();
                    },
                    (error) => {
                        self.form.setErrors(error.response.data.errors);
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
        }
    },
    watch: {
        'form.title': function (val, oldVal) {
            if (this.form.slug == '' ||
                this.form.slug == oldVal.toLowerCase().replace(/[\s\W-]+/g, '-')
            ) {
                this.form.slug = val.toLowerCase().replace(/[\s\W-]+/g, '-');
            }
        },
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
            return `background-image: url(${this.form.header_photo})`;
        }
    }
})