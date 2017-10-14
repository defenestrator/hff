@extends('spark::layouts.app')

@section('title')
Have Rod Will Travel
@parent
@stop

@section('page_styles')
@stop

@section('top')
    <carousel :autoplay="true" :per-page="1" :pagination-enabled="false" :autoplayHoverPause="true">
        <slide><img style="width:100%" src="{{ asset('/storage/assets/images/gourley/DSC_0336.JPG') }}" alt="Saltwater Flats">
        </slide>
        <slide><img src="{{ asset('/storage/assets/images/gourley/bonefish.jpg') }}" alt="Bonefish landed next to Fly Rod on Sea Grass">
        </slide>
        <slide><img src="{{ asset('/storage/assets/images/bully.jpg') }}" alt="Bull Trout must be kept in the water.">
        </slide>
        <slide><img src="{{ asset('/storage/assets/images/os/tarpon.jpg') }}" alt="Hungry Tarpon">
        </slide>
        <slide><img src="{{ asset('/storage/assets/images/gourley/grouper-websize.jpg') }}" alt="Big Grouper">
        </slide>
    </carousel>
<h1 style="background-color:#1a1a1a; padding:3em 0;" class="tagline text-center bg-border wow pulse" data-wow-duration="2.5s">
    Elite Destinations, Local Flavor
</h1>
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
                <p>Find some quiet places, and some uneducated fish.
                </p>
                <p>If you love to challenge yourself, and expand your understanding of what this great sport has to offer, these trips are for you.
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
    <div class="col-md-7 col-md-offset-0">
        <section>
            <article class="article">
                <header style="background-color:#0b3e6f; color:white; padding:1em; border-radius:1em; margin-top:2em;">
                <h2 class="text-center">Don't be fooled by <span class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s">'<strong>free advice</strong>'</span></h2>
                <h3 class="text-center">We don't send <span class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s"><strong>The 5th Dude</strong></span> along for the trip</h3>
                <p class="text-center"><span class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="1.5s">(on your dime)</span></p>
                <h4><span class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="2.0s">It's that simple.</span></h4>
                </header>
                <br>
                <p>We make a couple bucks when we book a trip,
                    and we earn it by providing personalized support for all
                    the destinations we list.
                    <ul style="list-style-type:circle">
                    <li>Custom offline maps. Find your way around with no network connection.</li>
                    <li>Specialized fly patterns designed by local wizards. </li>
                    <li>Logistical support; so you don't get stuck in a bad spot.</li>
                    <li>
                        <a href="https://hoboflyfishing.com/publications/posts/we-learned-the-hard-way-so-you-don-t-have-to"
                           title="We learned the hard way so you don't have to">
                            Learn from Our Mistakes</a>.&trade;
                         We've made a few, maybe.
                    </li>
                    <li>Surprises, merchandise, and promo items as available.</li>
                    </ul>
                </p>
            </article>
        </section>

    </div>
    <div class="col-md-5 col-md-offset-0">
        <section style="margin-top:2em;">
            <article class="article">
                <p>We will never have a hundred names on our "Pro Staff." We don't want them.
                </p>
                <p>
                    90% are meaningless headshots next to the name of some random clown they met at the bar.
                </p>
                <img src="{{ config('app.cdn') }}/assets/images/the-dude-1.jpg" style="border-radius:1em;"
                     alt="Yeah, well, that's just, like, your opinion, man."
                     title="Yeah, well, that's just, like, your opinion, man."
                >
            </article>
        </section>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-md-offset-0">
        &nbsp;
    </div>
</div>
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
    {{--The Big Lebowski is a trademark and copyright of Universal Studios, used here in accordance under the Fair Use clause, title 17 section 107 USC,
    source: http://static6.businessinsider.com/image/56b36fc72e5265b6008b4cd0-1190-625/jeff-bridges-says-hes-all-in-for-starring-in-a-big-lebowski-sequel-its-a-great-idea.jpg --}}
@stop
