@extends('spark::layouts.app')

@section('title')
Have Rod Will Travel
@parent
@stop

@section('page_styles')
@stop

@section('top')
<home-carousel></home-carousel>
@stop

@section('content')
<section>
    <div class="container bg-border wow pulse" data-wow-duration="2.5s">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="tagline text-center">Elite Destinations, Local Flavor</h1>
            </div>
        </div>
    </div>
</section>
<!-- Service Section Start-->

<div class="row">
    <div class="col-md-5 col-md-offset-0">
        <section>
                <div>
                    <img src="{{ asset('assets/images/gourley/20150712_082521.png') }}"
                         alt="This guy knows what he is doing."
                         title="This guy knows what he is doing." >
                </div>
                <h4>Learn the terrain.</h4>
                <p>If you are the type who likes to cut trail and learn the quirks of a fishery by
                    exploring with your buddies, give us a jingle and we'll get you on the right track.
                </p>
            </article>
        </section>
    </div>
    <div class="col-md-7 col-md-offset-0">
        <section>
            <h2>Here's the deal</h2>
            <article class="article">
                <h3>This should be fun</h3>

                <p>Don't be fooled by the goofy 'free advice' some other places claim to give away.
                    You know there's no free lunch. We make a couple bucks when we book a trip,
                    and we earn it by providing you better tools and sharp intelligence for all
                    the destinations we list. We don't send <em>The 6th Dude</em> along for a trip on your dime.
                </p>
            </article>
        </section>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-0">
        <section>
                <article class="article">
                    <h2>Hobo Fly Fishing Soft Launch, October 2017</h2>

                    <h3>Cultivate knowledge.</h3>

                    <p>There is a lot of mythology in the sport of fly fishing. A lot of it is considered
                        <em>accepted wisdom</em>, but there is very little
                        usable data available. We are building a service for
                        fly fishers who want facts, not fables. Take
                        control of your angling data and catch more fish!</p>
                    <p>Use real facts, not unreliable memories, to improve your success on the water.</p>
                    <p>Track your success on-stream with offline fisheries maps and
                        automatically correlate GPS information with weather, hydrology, hatch activity, and
                        other custom data that you and others collect <em>without interrupting your cast.</em>
                        Keep it a secret, share with a few buddies, or share it with the world. It is up to you.</p>
                    <p>We will provide our customer with custom tools, gear checklists, and local knowledge to help take the uncertainty out of planning an expedition</p>
                    <p>If you ever have any questions, don't wait, <a href="/contact">drop us a line. </a> We love to talk fishing.</p>
                </article>
            </section>
        </div>

<div class="col-md-5 col-md-offset-1">
        <section class="jumbotron">
                <article class="article">
                    <p>We will never have a hundred names on our "Pro Staff." We don't want them.
                    </p>
                    <p>
                        90% are meaningless headshots next to the name of some random clown they met at the bar.
                    </p>
                    <img src="{{asset('assets/images/the-dude-1.jpg') }}"
                         alt="Yeah, well, that's just, like, your opinion, man."
                         title="Yeah, well, that's just, like, your opinion, man."
                    >
                </article>
        </section>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-3 wow bounceInLeft" data-wow-duration="1s">
        <div class="box">
            <div class="box-icon">
                <i class="livicon diy-icon" data-name="anchor" data-size="55" data-c="#3f844e" data-hc="#464b17"></i>
            </div>
            <div class="info">
                <h3 class="success text-center">DIY Destinations</h3>
                <p>Get down and dirty, let us help you find some quiet out-of-the-way places.
                </p>
                <p>Do-it-yourself fly fishing has a significant learning curve, we can help you shorten it.
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 wow bounceInDown" data-wow-duration="1s" data-wow-delay="0.1s">
        <!-- Box Start -->
        <div class="box">
            <div class="box-icon box-icon1">
                <i class="livicon icon1" data-name="paper-plane" data-size="55" data-c="#128BC6" data-hc="#128BC6"></i>
            </div>
            <div class="info">
                <h3 class="primary text-center">Hybrid Trips</h3>
                <p>
                    All the freedom of DIY plus a day or two of guided fishing with local experts to get your feet wet.
                </p>
                <p>
                    Holler at us and we can help you find your next adventure.
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 wow bounceInUp" data-wow-duration="1.6s" data-wow-delay="0.1s">
        <div class="box">
            <div class="box-icon box-icon2">
                <i class="livicon icon1" data-name="rocket" data-size="55" data-c="#f89a14" data-hc="#f89a14"></i>
            </div>
            <div class="info">
                <h3 class="warning text-center">Full Service Expeditions</h3>
                <p>Full Service trips, for when you want all the comforts of home
                    and the absolute best fully-outfitted fishing experience.
                    Check out our carefully curated angling lodges.</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 wow bounceInRight" data-wow-duration="2s" data-wow-delay="0.2s">
        <div class="box">
            <div class="box-icon box-icon3">
                <i class="livicon icon1" data-name="share" data-size="55" data-c="#FFD43C" data-hc="#FFD43C"></i>
            </div>
            <div class="info">
                <h3 class="yellow text-center">Independent Guides</h3>
                <p>Connect directly with local guides via our independent outfitter listings.
                    Book trips with them using our platform and get special perks found nowhere else.</p>
            </div>
        </div>
    </div>
</div>

@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script type="text/javascript" src="{{ asset('js/wow.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/raphael-min.js') }}" ></script>
    <script src="{{asset('/js/livicons-1.4.min.js')}}"></script>
    <script>
        new WOW().init();
    </script>
    {{--The Big Lebowski is a trademark and copyright of Universal Studios, used here in accordance under the Fair Use clause, title 17 section 107 USC,
    source: http://static6.businessinsider.com/image/56b36fc72e5265b6008b4cd0-1190-625/jeff-bridges-says-hes-all-in-for-starring-in-a-big-lebowski-sequel-its-a-great-idea.jpg --}}
@stop
