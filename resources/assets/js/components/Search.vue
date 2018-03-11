<template>
        <li class="navbar-link" style="margin:6px auto;width:auto; padding: 0 8px;">
                <form @submit.prevent="search">
                <input v-model="query" @click.prevent="search" style="font-size:18px;"class="form-control" placeholder="search..." @keyup="search">
            </form>
            <div style="box-shadow:0px 2px 2px #c5c7ca ;border:1px solid #c5c7ca; max-height:650px; width:100%; border-top:none; z-index:1000; background:white; position:absolute; top:46px;"
                 v-if="results && results.length != 0" class="col-md-8 scrollable-menu" id="results">
                <button v-if="query.length !== 0" class="btn btn-default"
                        @click.prevent="clear"
                        style="font-size:18px; border:none;"
                        role="button">
                    <i class="fa fa-close" aria-hidden="true"></i> close
                </button>
                <ul style="padding-left:0;">
                    <a v-for="result in results" :href="result.link">
                        <li style="margin: 10px 0; border-bottom:1px solid #c5c7ca;">
                            <img style="border-radius:1em; width:100%;padding:6px;" :src="result.header_photo"/><br>
                            {{result.title}}<br>
                            <span style="color:#535965;">{{result.type}}</span>
                    </li>
                    </a>
                </ul>
                <button v-if="results.length !== 1" class="btn btn-default"
                        @click.prevent="clear"
                        style="font-size:18px; border:none;"
                        role="button">
                    <i class="fa fa-close" aria-hidden="true"></i> close
                </button>
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