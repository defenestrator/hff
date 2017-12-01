<template>
    <div class="col-md-12 col-md-offset-0" id="publications">
        <div class="row">
            <div class="col-md-6">
                <h3 v-if="unpublishedPosts.length > 0">Unpublished Posts</h3>
                <div class="col-md-12 publication" v-for="unpublishedPost in unpublishedPosts">
                    <div class="col-md-8">
                        {{ unpublishedPost.title }}
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-warning"  @click.prevent="pubPost(unpublishedPost.id, 'post')">
                            Publish
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 v-if="unpublishedShowcases.length > 0">Unpublished Showcases</h3>
                <div class="col-md-12 publication" v-for="unpublishedShowcase in unpublishedShowcases">
                    <div class="col-md-8">
                        {{ unpublishedShowcase.title }}
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-warning"  @click.prevent="pubShowcase(unpublishedShowcase.id, 'showcase')">
                            Publish
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3 v-if="posts.length > 0">Published Posts</h3>
                <div class="col-md-12 publication" v-for="post in posts">
                    <div class="col-md-8">
                    {{ post.title }}
                    </div>
                    <div class="col-md-4">
                        <button @click.prevent="unpubPost(post.id)" class="btn btn-danger">
                            Unpublish
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 v-if="showcases.length > 0">Published Showcases</h3>
                <div class="col-md-12 publication" v-for="showcase in showcases">
                    <div class="col-md-8">
                        {{ showcase.title }}
                    </div>
                    <div class="col-md-4">
                        <button @click.prevent="unpubShowcase(showcase.id)" class="btn btn-danger">
                            Unpublish
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>

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
            posts: [],
            unpublishedPosts: [],
            showcases:[],
            unpublishedShowcases:[]
        }
    },
    methods: {
        getIndex() {
            axios.get(`/api/publications`, {})
            .then(result  => {
                this.posts = result.data.posts
                this.showcases = result.data.showcases
                this.unpublishedPosts = result.data.unpublished_posts
                this.unpublishedShowcases = result.data.unpublished_showcases
                return result.data
            })
            .catch(error => {
                return Promise.reject(error)
            })
        },
        pubShowcase(id, type) {
             axios.post(`/api/publications`, {
                    type:    type,
                    showcase_id: id
                 })
                 .then(result  => {
                    this.getIndex()
                     return result
                 })
                 .catch(error => {
                     this.newPost.publishBusy = false
                     return Promise.reject(error)
                 });

        },
        pubPost(id, type) {
            axios.post(`/api/publications`, {
                        type:    type,
                        post_id: id
                    })
                    .then(result  => {
                this.getIndex()
            return result
        })
        .catch(error => {
                this.newPost.publishBusy = false
            return Promise.reject(error)
        });

        },
        unpubShowcase(id) {
            axios.delete(`/api/publications/showcase/`
                + id, {})
            .then(result  => {
                this.getIndex()
                return result
            })
            .catch(error => {
                return Promise.reject(error)
            });
        },
        unpubPost(id) {
            axios.delete(`/api/publications/post/`
                            + id, {})
                    .then(result  => {
                this.getIndex()
                return result
            })
        .catch(error => {
                return Promise.reject(error)
            });
        }
    },
    created() {
    },
    computed: {
        /**
         * Get the URL for updating the team photo.
         */
        urlForUpdate() {
            return `/api/photo`;
        }
    }
}
</script>

<style>
    .publication{margin:1em; border-bottom:1px solid #666; min-height:60px;}
</style>
