// Import this component
import trumbowyg from 'vue-trumbowyg';

// Import editor css
import 'trumbowyg/dist/ui/trumbowyg.css';

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);
Vue.component('edit-post', {
    props:['post_id'],
    validator: null,
    mounted() {
        this.edit(this.post_id)
    },
    components: {
        trumbowyg
    },
    data() {
        return {
            editPost: {
                title: '',
                slug: '',
                body: '',
                tags: [],
                link: '',
                post: Number(this.post_id),
                saveDisabled: false,
                saveBusy: false,
                saveError: false,
                saved: false,
                serverErrors: null,
                publishBusy: false,
                published: null,
                publicationId: null,
                errors: null
            },
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
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
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
        /**
         * Watch the title and create slug.
         */
        'editPost.title': function (val, oldVal) {
            this.editPost.serverErrors = null
            if (this.editPost.slug == '' ||
                this.editPost.slug == oldVal.toLowerCase().replace(/[\s\W-]+/g, '-')
            ) {
                this.editPost.slug = val.toLowerCase().replace(/[\s\W-]+/g, '-');
            }
            this.editPost.saved = false
            this.editPost.saveDisabled = false
        },
        'editPost.body': function (val, oldVal) {
            this.editPost.saved = false
            this.editPost.saveDisabled = false
        },
        'editPost.tags': function (val, oldVal) {
            this.editPost.saved = false
            this.editPost.saveDisabled = false
        }
    },
    methods: {

        publish() {
            this.editPost.publishBusy = true
            if (this.editPost.post === null) {
                this.editPost.publishBusy = false
                this.save()
                return
            }
            axios.post(`/publications`, {
                    type:    'post',
                    post_id: this.editPost.post
                })
                .then(result  => {
                    this.editPost.publishBusy = false
                    this.editPost.publicationId = result.data.id
                    return result
                })
                .catch(error => {
                    this.editPost.publishBusy = false
                    return Promise.reject(error)
                });
            this.editPost.publishBusy = false
            this.editPost.published = true

        },

        unpublish() {
            axios.delete(`/publications/`
                    + this.editPost.publicationId, {})
                .then(result  => {
                    this.editPost.publicationId = null
                    this.editPost.publishBusy = false
                    this.editPost.published = null
                    this.checkPublication(post)
                    return result
                })
                .catch(error => {
                    this.editPost.publishBusy = false
                    return Promise.reject(error)
                });
        },

        checkPublication(id){
            axios.get(`/posts/publications/` + id, {})
                .then(result  => {
                    this.editPost.publicationId = result.data.id
                    if (this.editPost.publicationId === undefined) {
                        this.editPost.publicationId = null
                        this.editPost.published = null
                    } else {
                        this.editPost.published = true
                        this.editPost.publishBusy = false
                    }
                    return result.data
                })
                .catch(error => {
                    return Promise.reject(error)
                })
        },

        update() {
            this.editPost.saveError = false
            this.editPost.saveBusy = true
            this.editPost.saveDisabled = true
            this.validator.validateAll({
                title: this.editPost.title,
                body: this.editPost.body
            }).then((result) => {
                    axios.put(`/posts/` + this.editPost.post, {
                            title: this.editPost.title,
                            user_id: Spark.state.user.id,
                            author: Spark.state.user.name,
                            body:  this.editPost.body,
                            tags: this.editPost.tags
                        })
                        .then(result  => {
                            this.editPost.saveBusy = false
                            this.editPost.saved = true
                            return result
                        })
                        .catch(error => {
                            this.editPost.saveError = true
                            this.editPost.saveBusy = false
                            this.editPost.serverErrors = error.response.data.errors.slug[0]
                            return Promise.reject(error)
                        })
                })
                .catch(error => {
                    this.editPost.saveBusy = false
                    this.editPost.saveError = true
                    return Promise.reject(error)
                })
        },

        leeroyjenkins() {
            if(confirm("Permanently destroy this post?")) {
                axios.delete(`/posts/` + this.editPost.post, {})
                    .then(result  => {
                        this.clear()
                    })
                    .catch(error => {
                        return Promise.reject(error)
                    });
            }
        },

        edit(id){
            axios.get(`/posts/`+ id + '/edit', {})
                .then(result => {
                    this.editPost.title = result.data.title;
                    this.editPost.slug = result.data.slug;
                    this.editPost.body = result.data.body;
                    this.editPost.post = result.data.id;
                    this.checkPublication(id)
                    this.saveBusy = false
                    this.editPost.saved = true
                    this.editPost.saveDisabled = true
                    this.getTags(this.editPost.post)
                    return result.data
                })
                .catch(error => {
                    return Promise.reject(error)
                })
        },
        getTags(id) {
            axios.get(`/posts/`+ id + '/tags', {})
                .then(result => {
                    this.editPost.tags = result.data;
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
})