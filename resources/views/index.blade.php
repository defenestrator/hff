@extends('layouts.app')

@section('title')
Have Rod Will Travel
@parent
@stop

@section('page_styles')
@stop

@section('top')

    <div class="tagline text-center">
        <h1 class="bg-border wow pulse" data-wow-duration="1.5s">
            Elite Destinations, Local Flavor
        </h1>
    </div>

@stop

@section('content')
<!-- Service Section Start-->
<div class="row">
    <div class="col-sm-6 col-md-4 wow bounceInLeft" data-wow-duration="1s">
        <div class="box">
            <div class="box-icon">
                <i class="livicon diy-icon" data-name="anchor" data-size="55" data-c="#3f844e" data-hc="#464b17"></i>
            </div>
            <div class="info">
                <h3 class="success text-center">Self-Guided Adventures</h3>
                <a href="/trips/naknek-river-camp">

                    <div class="thumbnail">
                        <img class="img-responsive" src="/images/naknek-river-camp/steelie.jpg">
                        <div class="caption">
                            <p>Naknek River Camp</p>
                            <p>Bristol Bay, AK</p>
                        </div>
                    </div>
                </a>
                <p>Find some quiet places, and some uneducated fish.
                </p>
                <p>If you love to challenge yourself, and expand your understanding of what this great sport has to offer,
                    these trips are for you.
                </p>
                <p>Self-guided fly fishing has a significant learning curve, we can help you shorten it.
                </p>

            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 wow bounceInDown" data-wow-duration="1s" data-wow-delay="0.1s">
        <!-- Box Start -->
        <div class="box">
            <div class="box-icon box-icon1">
                <i class="livicon icon1" data-name="paper-plane" data-size="55" data-c="#128BC6" data-hc="#128BC6"></i>
            </div>
            <div class="info">
                <h3 class="primary text-center">Hybrid Trips</h3>
                <a href="/trips/costa-de-cocos">
                <div class="thumbnail">
                    <img class="img-responsive" src="/images/costa-de-cocos/OttoMannandAlberto_640x419.jpg">
                    <div class="caption">
                        <p>Costa de Cocos</p>
                        <p>Xcalac, MX</p>
                    </div>
                </div>
                </a>
                <a href="/trips/deep-creek-lodge">
                <div class="thumbnail">
                    <img class="img-responsive" src="/images/deep-creek-lodge/stacks-image-14435c9-1200x594.jpg">
                    <div class="caption">
                        <p>Deep Creek Lodge</p>
                        <p>North Coast, BC</p>
                    </div>
                </div>
                </a>
                <p>
                    After fishing with local guides to get your feet wet, spend a few days exploring the local fisheries with your buddies, and our help.
                </p>
                <p>
                    We do deep research on the local scene, fishing and otherwise, to help you mix it up.
                </p>
                <p>
                    Holler at us and we can help you find your next adventure.
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 wow bounceInRight" data-wow-duration="1.6s" data-wow-delay="0.1s">
        <div class="box">
            <div class="box-icon box-icon2">
                <i class="livicon icon1" data-name="rocket" data-size="55" data-c="#f89a14" data-hc="#f89a14"></i>
            </div>
            <div class="info">
                <h3 class="warning text-center">Full Service Expeditions</h3>
                <a href="/trips/backcountry-river-guides">

                    <div class="thumbnail">
                    <img class="img-responsive" src="/images/backcountry-river-guides/slide1-178.jpg">
                    <div class="caption">
                    <p>Backcountry River Guides</p>
                    <p>Idaho's Salmon River</p>
                    </div>
                    </div>
                </a>
                <p>When you want the finest angling vacation experience check out our carefully curated full-service
                    lodges and resorts.</p>
                <p>For those who love top-tier living.</p>
                <p> These are great family getaways, as they typically offer activities for the non-angling
                    members of the group, in addition to the great fishing!</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-md-offset-0">
        <h4 class="text-center">There will be updates several times a day as we continue to add them.</h4>
        <h3 class="text-center">Hold on to your hat, tons of good stuff is on the way!</h3>
    </div>
</div>
@stop
@section('bottom')
    <carousel :autoplay="true"
              :autoplay-timeout="2000"
              :per-page="2"
              :pagination-enabled="false"
              :loop="true"
              style="cursor: pointer;">
        <slide><img src="{{ asset('images/carousels/home/grouper-websize.jpg') }}" alt="Big Grouper" title="Big Grouper">
        </slide>
        <slide><img src="{{ asset('images/carousels/home/bully.jpg') }}" alt="Bull Trout, keep 'em wet." title="Bull Trout must be kept in the water.">
        </slide>
        <slide><img src="{{ asset('images/carousels/home/bonefish.jpg') }}" alt="Bonefish landed next to Fly Rod on Eel Grass" title="Bonefish landed next to Fly Rod on Eel Grass">
        </slide>
        <slide><img src="{{ asset('images/carousels/home/flats.jpg') }}" alt="Remote Saltwater Flats"
                    title="Remote Saltwater Flats">
        </slide>
        <slide><img src="{{ asset('images/carousels/home/tarpon.jpg') }}" alt="Hungry Islamorada Tarpon"
                    title="Hungry Ismadorada Tarpon"></slide>
    </carousel>
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
    {{--The Big Lebowski is a trademark and copyright of Universal Studios, used here in accordance under the Fair Use clause, title 17 section 107 USC,
    source: http://static6.businessinsider.com/image/56b36fc72e5265b6008b4cd0-1190-625/jeff-bridges-says-hes-all-in-for-starring-in-a-big-lebowski-sequel-its-a-great-idea.jpg --}}
@stop
