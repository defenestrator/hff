@extends('layouts.master')

@section('title')
    Have Rod Will Travel
    @parent
@stop

@section('page_styles')
    <style>
        .world-map{
          height: 100vh;
        }
    </style>
@stop

@section('top')

    <div class="world-map" id="map">

    </div>

@stop

@section('content')

@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        function addScript( url, callback ) {
            var script = document.createElement( 'script' );
            if( callback ) script.onload = callback;
            script.type = 'text/javascript';
            script.src = url;
            document.body.appendChild( script );
        }

        function loadMapsAPI() {
            addScript( 'https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_KEY')}}&callback=mapsApiReady' );
        }

        function mapsApiReady() {
            var uluru = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
            console.log('Map Ready');
        }

        window.onload = loadMapsAPI;
    </script>

@stop

