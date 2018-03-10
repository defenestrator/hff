<template>
    <gmap-map
            :center="center"
            :zoom="2"
            style="width: 100%; height: 80vh;"
    >
<gmap-info-window  :zIndex="300" :maxWidth="240" :options="infoOptions" :position="infoWindowPos" :opened="infoWinOpen" @closeclick="infoWinOpen=false">
        <h2>{{infoWindowTitle}}</h2>
        <div class="map-info-window" style="max-width:240px;" v-html="infoContent">{{infoContent }}</div>
        </gmap-info-window>
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
    </gmap-map>
</template>

<script>
    /////////////////////////////////////////
    // New in 0.4.0
    import * as VueGoogleMaps from 'vue2-google-maps';
    import Vue from 'vue';

    Vue.use(VueGoogleMaps, {
        load: {
            key: 'AIzaSyA7cOmgsewiTB9MjES7Ho8auSVcxqf34cY',
             libraries: 'places', //// If you need to use place input
        }
    });

    export default {
        data () {
            return {
                center: {lat: 21.3279758, lng: -157.939159117},
                destinations: [],
                markers:[],
                infoContent: '',
                infoWindowContent: '',
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
            .catch(error => {
                    return Promise.reject(error)
                })
            },
            getMarkers() {
                for(d in this.destinations) {
                    const marker = {
                        position: d.position,
                        title: d.title
                    }
                    return this.markers.push(marker)
                }
            },
            toggleInfoWindow(destination, index) {
                this.infoWindowPos = destination.position;
                this.infoWindowTitle = destination.name
                this.infoContent = destination.infoText;
                console.log(destination.infoText)
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