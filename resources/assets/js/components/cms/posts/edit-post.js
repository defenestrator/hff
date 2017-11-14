// Import this component
import trumbowyg from 'vue-trumbowyg';

// Import editor css
import 'trumbowyg/dist/ui/trumbowyg.css';

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);
Vue.component('edit-post', {
    validator: null,
    mounted() {

    },
    components: {
        trumbowyg
    },
    data() {
        return {
            index: true,
            posts: [],
            editPost: {
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
            this.index = this.index ? false : true
        },

        save() {
            this.editPost.saveError = false
            this.editPost.saveBusy = true
            this.validator.validateAll({
                title: this.editPost.title,
                body: this.editPost.body,
                slug: this.editPost.slug
            }).then((result) => {
                    axios.post(`/api/posts`, {
                            title: this.editPost.title,
                            user_id: Spark.state.user.id,
                            author: Spark.state.user.name,
                            slug:  this.editPost.slug,
                            body:  this.editPost.body,
                            tags: this.editPost.tags
                        })
                        .then(result  => {
                            this.editPost.saveDisabled = true
                            this.editPost.saveBusy = false
                            this.editPost.saved= true
                            this.editPost.postId = result.data.id
                            console.log(result)
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
                    this.errors = Promise.reject(error)
                    return Promise.reject(error)
                })
        },

        publish() {
            this.editPost.publishBusy = true
            if (this.editPost.postId === null) {
                this.editPost.publishBusy = false
                this.save()
                return
            }
            axios.post(`/api/publications`, {
                    type:    'post',
                    post_id: this.editPost.postId
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
            const postId = this.editPost.postId
            axios.delete(`/api/publications/`
                    + this.editPost.publicationId, {})
                .then(result  => {
                    this.editPost.publicationId = null
                    this.editPost.publishBusy = false
                    this.editPost.published = null
                    this.checkPublication(postId)
                    return result
                })
                .catch(error => {
                    this.editPost.publishBusy = false
                    return Promise.reject(error)
                });
        },

        checkPublication(id){
            axios.get(`/api/posts/publications/` + id, {})
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
                    axios.put(`/api/posts/` + this.editPost.postId, {
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
                axios.delete(`/api/posts/` + this.editPost.postId, {})
                    .then(result  => {
                        this.clear()
                    })
                    .catch(error => {
                        return Promise.reject(error)
                    });
            }
        },

        createeditPost() {
            if (!this.editPost.postId) {
                if (confirm('Abandon this post and start over?')) {
                    this.clear()
                }
            } else {
                this.clear()
            }
        },
        clear() {
            this.editPost.saved = false
            this.editPost.saveBusy = false
            this.editPost.saveDisabled = false
            this.editPost.publishBusy = false
            this.editPost.published = null
            this.editPost.publicationId = null
            this.editPost.postId = null
            this.editPost.title = ''
            this.editPost.body = ''
            this.editPost.slug = ''
            this.editPost.tags = []
        },
        edit(id){
            this.editPost.saveDisabled = true
            this.saveBusy = true
            this.index = false
            this.editPost.postId = id
            this.getTags(this.editPost.postId)
            axios.get(`/posts/`+ id + '/edit', {})
                .then(result => {
                    this.editPost.title = result.data.title;
                    this.editPost.slug = result.data.slug;
                    this.editPost.body = result.data.body;
                    this.editPost.postId = result.data.id;
                    this.checkPublication(id)
                    this.saveBusy = false
                    this.editPost.saved = true
                    this.editPost.saveDisabled = true

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