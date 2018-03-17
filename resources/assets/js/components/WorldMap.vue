<template>
    <gmap-map
            :center="center"
            :zoom="2"
            class="world-map-component"
            ref="vueMap">
        <gmap-info-window  :zIndex="500" :maxWidth="280" :options="infoOptions" :position="infoWindowPos" :opened="infoWinOpen" @closeclick="infoWinOpen=false">
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
            ></gmap-marker>
        </google-cluster>
    </gmap-map>
</template>

<script>
    /////////////////////////////////////////
    // New in 0.4.0
    import * as VueGoogleMaps from 'vue2-google-maps';
    import Vue from 'vue';

    Vue.component('google-cluster', VueGoogleMaps.Cluster);
    Vue.use(VueGoogleMaps, {
        load: {
            key: 'AIzaSyA7cOmgsewiTB9MjES7Ho8auSVcxqf34cY',
            libraries: 'places', //// If you need to use place input
        }
    });

    export default {
        data () {
            return {
                center: {lat:19.3907336, lng:-99.1436127},
                destinations: [],
                mapTypeId: "satellite",
                markers:[],
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
                //optional: offset infowindow so it visually sits nicely on top of our marker
                infoOptions: {
                    pixelOffset: {
                        width: 0,
                        height: -35
                    }
                },
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
                //check if its the same marker that was selected if yes toggle
                if (this.currentMidx == index) {
                    this.infoWinOpen = !this.infoWinOpen;
                }
                //if different marker set infowindow to open and reset current marker index
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