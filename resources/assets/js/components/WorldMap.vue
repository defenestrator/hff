<template>
    <gmap-map
            :center="center"
            :zoom="2"
            class="world-map-component"
            map-type-id="hybrid"
            ref="vueMap">
        <gmap-info-window
                :zIndex="500"
                :maxWidth="280"
                :options="infoOptions"
                :position="infoWindowPos"
                :opened="infoWinOpen"
                @closeclick="infoWinOpen=false">
            <h5>{{infoWindowTitle}}</h5>
            <div class="map-info-window" style="max-width:280px;">
                <img style="max-width:140px; float:left; padding-right:1em;" :src="infoWindowImage" />
                <span v-html="infoContent">{{infoContent }}</span>
            </div>
        </gmap-info-window>

        <google-cluster style="z-index:499">
            <gmap-marker
                        @click="toggleInfoWindow(d,index)"
                        :key="index"
                        v-for="(d, index) in destinations"
                        :position="d.position"
                        :clickable="true"
                        :draggable="false"
                        :title="d.name"
                        :infoWindow="d.description"
                        :enabled="true"
                        :icon="icon"

            ></gmap-marker>
        </google-cluster>
    </gmap-map>
</template>

<script>
    import * as VueGoogleMaps from 'vue2-google-maps';
    import Vue from 'vue';

    Vue.component('google-cluster', VueGoogleMaps.Cluster);
    Vue.use(VueGoogleMaps, {
        load: {
            key: 'AIzaSyA7cOmgsewiTB9MjES7Ho8auSVcxqf34cY',
            libraries: 'places',
        }
    });

    export default {
        data () {
            return {
                center: {lat:19.3907336, lng:-99.1436127},
                destinations: [],
                markers:[],
                icon: '/images/marker.png',
                infoContent: '',
                infoWindowContent: '',
                infoWindowTitle: '',
                infoWindowImage:'',
                infoWindowPos: {
                    lat: 0,
                    lng: 0
                },
                infoWinOpen: false,
                currentMidx: null,
                infoOptions: {
                    pixelOffset: {
                        width: -0,
                        height: -15
                    }
                }
            }
        },
        methods: {
            getDestinations() {
                axios.get(`/api/maps/destinations`, {})
                        .then(result  => {
                    this.destinations = result.data
                    return this.destinations
                })
            },
            getMarkers() {
                for(const d in this.destinations) {
                    const marker = {
                        position: d.position,
                        title: d.title
                    }
                    return this.markers.push(marker)
                }
            },
            toggleInfoWindow(destination, index) {
                this.center = destination.position
                this.infoWindowPos = destination.position;
                this.infoWindowTitle = destination.name
                this.infoContent = destination.infoText;
                this.infoWindowImage = destination.header_photo
                if (this.currentMidx == index) {
                    this.infoWinOpen = !this.infoWinOpen;
                }
                else {
                    this.infoWinOpen = true;
                    this.currentMidx = index;
                }
            }
        },
        created(){
            this.getDestinations()
        }
    }
</script>
<style>
    .gm-style .gm-style-iw {
        font-size:12px;
    }
    .map-info-window span img {
        display:none;
    }

</style>