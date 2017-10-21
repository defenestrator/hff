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
                <a href="/destinations/naknek-river-camp" title="Naknek River Camp">
                    <div class="thumbnail">
                        <img class="img-responsive" src="/images/naknek-river-camp/steelie.jpg">
                        <div class="caption">
                            <p>Naknek River Camp</p>
                            <p>Bristol Bay, AK</p>
                        </div>
                    </div>
                </a>
                <a href="/destinations/deep-creek-lodge" title="Deep Creek Lodge">
                    <div class="thumbnail">
                        <img class="img-responsive" src="/images/deep-creek-lodge/stacks-image-14435c9-1200x594.jpg">
                        <div class="caption">
                            <p>Deep Creek Lodge</p>
                            <p>North Coast, BC</p>
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
                <a href="/destinations/costa-de-cocos" title="Costa de Cocos">
                <div class="thumbnail">
                    <img class="img-responsive" src="/images/costa-de-cocos/OttoMannandAlberto_640x419.jpg">
                    <div class="caption">
                        <p>Costa de Cocos</p>
                        <p>Xcalac, MX</p>
                    </div>
                </div>
                </a>
                <a href="/destinations/two-boys-inn-andros" title="Two Boys Inn, Andros Island, Bahamas">
                    <div class="thumbnail">
                        <img class="img-responsive" src="/images/two-boys-inn-andros/andros-bones.jpg">
                        <div class="caption">
                            <p>Two Boys Inn</p>
                            <p>Andros Island, Bahamas</p>
                        </div>
                    </div>
                </a>
                <p>
                    After fishing with local guides to get your feet wet, spend a few days exploring the local fisheries with your buddies, and our help.
                </p>
                <p>
                    Hybrid trips are a signature service of Hobo Fly Fishing, don't wait, ask us for more details.
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
                <a href="/destinations/backcountry-river-guides" title="Backcountry River Guides">

                    <div class="thumbnail">
                    <img class="img-responsive" src="/images/backcountry-river-guides/slide1-178.jpg">
                    <div class="caption">
                    <p>Backcountry River Guides</p>
                    <p>Idaho's Salmon River</p>
                    </div>
                    </div>
                </a>
                <a href="/destinations/balckfish-lodge" title="Blackfish Lodge">

                    <div class="thumbnail">
                        <img class="img-responsive" src="/images/blackfish-lodge/763.c.jpg">
                        <div class="caption">
                            <p>Blackfish Lodge</p>
                            <p>British Columbia, Canada</p>
                        </div>
                    </div>
                </a>
                <p>When you want the finest angling vacation experience check out our carefully curated full-service
                    lodges and resorts.</p>
                <p>For those who love top-tier living.</p>
                <p> These are often fun family getaways, as they typically offer activities for the non-angling
                    members of the group, in addition to the great fishing!</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-md-offset-0">
        <h2 class="text-center">We continue to add new destinations.</h2>
        <h3 class="text-center">More than 30 great fly fishing adventures are on the way!</h3>
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
<br>
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
@stop
