<template>
        <li class="navbar-link searchbar-li">
                <form @submit.prevent="search">
                <input v-model="query" @click.prevent="search" style="font-size:18px;"class="form-control" placeholder="search..." @keyup="search">
            </form>
            <div v-if="results && results.length != 0"
                 class="search-results scrollable-menu" id="results">
                <ul style="padding-left:0;">
                    <li style="top:15px; position:sticky;">
                        <button v-if="query.length !== 0" class="btn btn-default"
                                @click.prevent="clear"
                                style="z-index:102; font-size:18px; border:none;"
                                role="button">
                            <i class="fa fa-close" aria-hidden="true"></i> close
                        </button>
                    </li>
                    <li v-for="result in results" style="margin: 10px 0; border-bottom:1px solid #c5c7ca;">
                        <a :href="result.link" style="display:block;">
                        <img style="border-radius:1em; width:100%;padding:6px;" :src="result.header_photo"/><br>
                        {{result.title}}<br>
                        <span style="color:#535965;">{{result.type}}</span>
                        </a>
                    </li>

                </ul>
                <button v-if="results.length !== 1" class="btn btn-default"
                        @click.prevent="clear"
                        style="z-index:102; font-size:18px; border:none;"
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
<style>
    .search-results {
        box-shadow:0px 2px 2px #c5c7ca;
        border:1px solid #c5c7ca;
        z-index:101;
        width:96.5%;
        padding:1em;
        border-top:none;
        background:white;
        position:absolute;
        height:auto;
        top:46px;
    }
    .searchbar-li {
        margin:6px auto;  width:auto; padding: 0 8px;
    }
    .scrollable-menu .search-results {
        max-height:600px;
    }
    @media (min-width:768px) {
        .search-results {
            width:550px;
            max-height:750px;
        }
        .searchbar-li {
            width:200px;
        }
    }
</style>