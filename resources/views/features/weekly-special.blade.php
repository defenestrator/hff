@extends('layouts.app')

@section('title')
    Flats Fishing Special - 6 days - $1000
    @parent
@stop

@section('page_styles')
@stop

@section('top')
    <div style="padding:2em 0;
                background: #1a1a1a url('/images/costa-de-cocos/costa-de-cocos-permit.jpg') center center no-repeat;
                background-size:cover;" >
        <h2 class="feature-tagline text-center wow pulse" data-wow-duration="1.5s">
            Flats Fishing Special
        </h2>
        <h2 class="feature-tagline text-center">Bonefish, Tarpon, Permit, Barracuda and Jacks</h2>
        <h2 style="font-size:xx-large"class="feature-tagline text-center  wow pulse" data-wow-duration="2.5s">6 days for $1000</h2>
        <div style="margin: 0 auto;width:300px; max-width:70%"><sales-inquiry></sales-inquiry></div>

        <h2 class="feature-tagline text-center">Make it happen, at Hobo Fly Fishing</h2>
    </div>

@stop

@section('content')
    <div style="padding-top:2em;"  class="row">
        <div class="col-sm-6 col-md-8">
            <p>Every fly caster has fished waters that infiltrated their inner-being.
                For the guys at Hobo Fly Fishing, the waters of the southern Yucatan are among them.
                The inhabitants of this expanse of saltwater paradise consume our thoughts,
                and sometimes lead to a lack of focus during the slog of everyday life.
            </p>
            <p>As we tie flies in anticipation of our return, Permit, Bonefish and giant Barracuda race through
                our minds with each wrap we make. In an attempt to stay connected with these waters
                we have have accumulated several hundred dozen area-specific flies over the years.
            </p>
            <p>The Caribbean takes us back in time. Away from the hustle and bustle of
                more inhabited areas, it can bring back glimmers of what those early pioneers might have felt,
                when they first stepped ashore on the New World.
            </p>
            <p>
                This unforgettable trip offers the chance to wrestle with a multitude of marine species that will gladly eat a fly.
            </p>

        </div>
        <div class="col-sm-6 col-md-4">
            <p>For saltwater ”DiY” anglers in search of new flats to stalk, this area
                has few rivals. The thing about doing it yourself is; No matter how great you think
                you are, a new area takes time. Success for a self-guided angler is based largely on time spent
                working the water. And yes, at least a little luck. When you finally land a monstrous Permit,
                or a lightning bolt Bonefish on some flat devoid of other anglers, the victory will taste sweeter for it.
            </p>
            <p>This is a year-round opportunity for flats fishing. In some destinations anglers have been conditioned
                to plan trips only during the "peak" months. In these waters, amazing angling can be had on almost
                every day of the year.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <h2 class="text-center">We are preferred booking agents for more than 25 lodges worldwide</h2>
            <h4 class="text-center">There will be updates several times a day as we continue to add them.</h4>
            <h3 class="text-center">&nbsp;</h3>
        </div>
    </div>
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
@stop
