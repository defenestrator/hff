@extends('layouts.app')

@section('title')
    Costa De Cocos
    @parent
@stop

@section('page_styles')
    <style>
        .article img {
            margin-bottom:1em;
        }
    </style>
@stop

@section('top')
    <img style="width:100%;"
         src="http://www.orvis.com/flyfishingvideos/wp-content/uploads/2016/01/costa-de-cocos-bonefish-and-perm.jpg"
         alt="Nice f***in' Permit, dude!"
         title="Nice fu**in' Permit, dude!">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Costa de Cocos
    </h1>
@stop

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <h2>Permit, bonefish, tarpon, barracuda, jacks...</h2>
                    <p> If you’re hearing a cash register dinging in your head when you consider a place that gives you
                        legit shots at all these fish, push the mute button. Costa De Cocos is your gateway to saltwater
                        flyfishing without an arm-or-leg admission price.
                    </p>
                    <p class="text-center">
                        <iframe width="280"
                                height="158"
                                src="https://www.youtube-nocookie.com/embed/YCEpp1A04KY?rel=0"
                                frameborder="0" allowfullscreen>
                        </iframe>
                    </p>
                    <p>This southern Yucatan resort has access to the second-largest barrier reef in the world and the
                        Sian Ka’an Bio Reserve, which means the fisheries are managed for sustainability. The area produces
                        excellent flats fishing and adjacent lagoons for tarpon, all in a place that’s off the beaten
                        path, but still accessible. What’s more, you can fish guided, unguided or mix and match to suit
                        your budget.
                    </p>

                    {{--<p>Every fly caster has fished waters that infiltrated their inner-being. The Caribbean out the--}}
                        {{--front door of Costa de Cocos is among them, for the guys at Hobo Fly Fishing.--}}
                        {{--The inhabitants of this unspoiled expanse of saltwater paradise consume our thoughts,--}}
                        {{--and sometimes lead to a lack of sleep or focus during the slog of everyday life.--}}
                    {{--</p>--}}
                    {{--<p>--}}
                        {{--As we tie flies in anticipation of our return, Permit, Bonefish and giant Barracuda race through--}}
                        {{--our minds with each wrap we make. In an attempt to stay connected with the waters near Xcalak--}}
                        {{--we have have accumulated several hundred dozen area-specific flies over the years.--}}
                    {{--</p><p>--}}
                        {{--This region of Mexico takes one back in time. Away from the hustle and bustle of--}}
                        {{--more inhabited areas, it can bring back glimmers of what those early pioneers might have felt,--}}
                        {{--when they first stepped ashore on the New World.--}}
                    {{--</p><p>--}}
                        {{--Abundant opportunity exists for Bonefish, Permit, Jacks, Barracuda, Tarpon, Trigger, Snapper,--}}
                        {{--and numerous other species that will gladly eat a fly.--}}
                    {{--</p>--}}

                    {{--<p>--}}
                        {{--This is a year-round opportunity for flats fishing. In some destinations anglers have been conditioned--}}
                        {{--to plan trips only during the "peak" months. In these waters, amazing angling can be had on almost--}}
                        {{--every day of the year.--}}
                    {{--</p>--}}

                    {{--<p>--}}
                        {{--For saltwater ”DiY” anglers in search of new flats to stalk, this area--}}
                        {{--has few rivals. The thing about doing it yourself is; No matter how great you think--}}
                        {{--you are, a new area takes time. Success for a self-guided angler is based largely on time spent--}}
                        {{--working the water. And yes, at least a little luck. When you finally land a monstrous Permit,--}}
                        {{--or a lightning bolt of a Bonefish on some nameless flat devoid of other anglers, the victory will taste sweeter for it.--}}
                    {{--</p>--}}
                    <p>
                        Our hybrid trip includes both guided and self-guided days in this amazing location. Our angler
                        support package will save you time, prevent logistical headaches, and reduce the pain of learning a new fishery.
                    </p>
                    <img src="/images/costa-de-cocos/scuba-with-tarpon.jpg" />
                    <p>The fish don't know if they are in Belize or Mexico, it's all the same water.</p>

                </article>
            </section>
        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <p> Is an egg-white omelet and a caffè latte at some extravagant lodge across the border worth three grand?
                    </p>
                    <p>Heck, you could use that money toward a second trip to Costa de Cocos!</p>
                    <img src="http://www.costadecocos.com/images/costa%20de%20cocos%20fishing%20lg.jpg">
                    <p class="text-center"><strong>The price is too low to publish.</strong></p>
                    <h3 class="text-center">Drop us a line!</h3>
                    <sales-inquiry></sales-inquiry>
                    <img src="/images/costa-de-cocos/OttoMannandAlberto_640x419.jpg"
                         alt="Otto and Alberto with a nice Permit"
                         title="Otto and Alberto with a nice Permit">
                    <p>If you have particular needs or desires, let us know, and we'll build a trip just for you.</p>
                </article>
            </section>
        </div>
    </div>
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
@stop