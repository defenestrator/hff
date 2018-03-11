<template>
        <li class="navbar-link" style="margin:6px auto;width:auto; padding: 0 8px;">
                <form>
                <input v-model="query" style="font-size:18px;"class="form-control" placeholder="search..." @keyup="search">
            </form>
            <div style="border:1px solid #c5c7ca; max-height:650px; border-top:none; overflow-y:scroll; overflow-x:hidden; z-index:1000; background:white; width:800px; position:absolute; top:46px;"
                 v-if="results && results.length != 0" class="scrollable-menu" id="results">
                <button v-if="query.length !== 0" class="btn btn-default"
                        @click.prevent="clear"
                        type="submit"
                        style="font-size:18px; border:none;"
                        role="button">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
                <ul>
                    <a v-for="result in results" :href="result.link">
                        <li style="margin: 6px 0; border-bottom:1px solid #c5c7ca; overflow-x:hidden;">
                            <img style="width:80px;padding:6px;" :src="result.header_photo"/>
                            {{result.title}}
                            <span style="color:#535965;"> - {{result.type}}</span>
                    </li>
                    </a>
                </ul>
            </div>
        </li>
</template>

<script  type="text/babel">
export default {
    name: 'site-search',
    data() {
        return {
            query: '',
            results: []
        }
    },
    mounted() {
    },
    methods: {
        search() {
            axios.get('/api/search?query=' + this.query, {})
            .then(result => {
                this.results = result.data
                console.log(result)
                return result
            })
            .catch(error => {
                return Promise.reject(error)
            })
        },
        clear() {
            this.query = ''
            this.results = []
            return 'results cleared'
        }

    },
    created() {
    },
    watch: {
    }
}
</script>