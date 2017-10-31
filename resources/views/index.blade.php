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
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <a role="button" href="/features/weekly-special">
            <div class="weekly-special text-center text-capitalize">
                    <h3>
                        &ldquo;Trip of a lifetime&rdquo; <br> or &ldquo;A lifetime of trips&rdquo; <br>which sounds better?
                    </h3>
            </div>
            </a>
        </div>
    </div>
@stop

@section('content')

<hr>
<div class="row">
    <div class="col-md-12 col-md-offset-0">
        <h2 class="text-center">Lodges and Destinations</h2>
    </div>
</div>
<!-- Listings Section Start -->
<div class="row">
    <div class="col-sm-4">
        <div class="info">
            <a href="/destinations/alaska/naknek-river-camp" title="Naknek River Camp">
                <div class="thumbnail">
                    <img class="img-responsive" src="/images/naknek-river-camp/steelie.jpg">
                    <div class="caption">
                        <p>Naknek River Camp</p>
                        <p>Bristol Bay, AK</p>
                    </div>
                </div>
            </a>
            <a href="/destinations/british-columbia/blackfish-lodge" title="Blackfish Lodge">

                <div class="thumbnail">
                    <img class="img-responsive" src="/images/blackfish-lodge/763.c.jpg">
                    <div class="caption">
                        <p>Blackfish Lodge</p>
                        <p>British Columbia, Canada</p>
                    </div>
                </div>
            </a>
            <a href="/destinations/idaho/backcountry-river-guides" title="Backcountry River Guides">

                <div class="thumbnail">
                    <img class="img-responsive" src="/images/backcountry-river-guides/slide1-178.jpg">
                    <div class="caption">
                        <p>Backcountry River Guides</p>
                        <p>Idaho's Salmon River</p>
                    </div>
                </div>
            </a>
            <a href="/destinations/argentina/rio-manso-lodge" title="Rio Manso Lodge - Patagonia, Argentina">
                <div class="thumbnail">
                    <img class="img-responsive" src="/images/rio-manso-lodge/brookie-thumb.png">
                    <div class="caption">
                        <p>Rio Manso Lodge</p>
                        <p>Patagonia, Argentina</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="info">
            <a href="/destinations/yucatan/costa-de-cocos" title="Costa de Cocos">
                <div class="thumbnail">
                    <img class="img-responsive" src="/images/costa-de-cocos/OttoMannandAlberto_640x419.jpg">
                    <div class="caption">
                        <p>Costa de Cocos</p>
                        <p>Xcalac, MX</p>
                    </div>
                </div>
            </a>
            <a href="/destinations/british-columbia/deep-creek-lodge" title="Deep Creek Lodge">
                <div class="thumbnail">
                    <img class="img-responsive" src="/images/deep-creek-lodge/stacks-image-14435c9-1200x594.jpg">
                    <div class="caption">
                        <p>Deep Creek Lodge</p>
                        <p>North Coast, BC</p>
                    </div>
                </div>
            </a>
            <a href="/destinations/labrador/salmon-hole-lodge" title="Salmon Hole Lodge">
                <div class="thumbnail">
                    <img class="img-responsive" src="/images/salmon-hole-lodge/canada-tattoo.jpg">
                    <div class="caption">
                        <p>Salmon Hole Lodge</p>
                        <p>Newfoundland, Canada</p>
                    </div>
                </div>
            </a>
            <a href="/destinations/australia/true-blue-bonefish" title="True Blue Bonefish">
                <div class="thumbnail">
                    <img class="img-responsive" src="/images/true-blue-bonefish/gt.jpg">
                    <div class="caption">
                        <p>True Blue Bonefish</p>
                        <p>Exmouth, Australia</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="info">
            <a href="/destinations/belize/mango-creek-lodge" title="Mango Creek Lodge">
                <div class="thumbnail">
                    <img class="img-responsive" src="/images/mango-creek-lodge/baby-tarpon.jpg">
                    <div class="caption">
                        <p>Mango Creek Lodge</p>
                        <p>Honduras</p>
                    </div>
                </div>
            </a>
            <a href="/destinations/bahamas/two-boys-inn-andros" title="Two Boys Inn, Andros Island, Bahamas">
                <div class="thumbnail">
                    <img class="img-responsive" src="/images/two-boys-inn-andros/andros-bones.jpg">
                    <div class="caption">
                        <p>Two Boys Inn</p>
                        <p>Andros Island, Bahamas</p>
                    </div>
                </div>
            </a>
            <a href="/destinations/new-zealand/stonefly-lodge" title="Stonefly Lodge - South Island, New Zealand">
                <div class="thumbnail">
                    <img class="img-responsive" src="/images/stonefly-lodge/pool-cast-stonefly.jpg">
                    <div class="caption">
                        <p>Stonefly Lodge</p>
                        <p>South Island, New Zealand</p>
                    </div>
                </div>
            </a>
            <a href="/destinations/belize/the-blue-bonefish" title="The Blue Bonefish - Belize">
                <div class="thumbnail">
                    <img class="img-responsive" src="/images/the-blue-bonefish/permit.jpg" alt="Head on Permit" title="Head on Permit">
                    <div class="caption">
                        <p>The Blue Bonefish</p>
                        <p>Belize</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<hr>
<!-- Service Section Start-->
<div class="row">
    <div class="col-sm-6 col-md-4 wow bounceInLeft" data-wow-duration="1s">
        <div class="box">
            <div class="box-icon">
                <i class="livicon diy-icon" data-name="anchor" data-size="55" data-c="#3f844e" data-hc="#3f844e"></i>
            </div>
            <div class="info">
                <h3 class="success text-center">Self-Guided Adventures</h3>
                <p>Find some quiet places, and some uneducated fish. If you love to challenge yourself, and expand your understanding of what this great sport has to offer,
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
                <p>
                    After fishing with local guides to get your feet wet, spend a few days exploring the local fisheries with your buddies, and our help.
                </p>
                <p>
                    Hybrid trips are a signature service of Hobo Fly Fishing, we expect them to sell fast, ask for more details.
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
                <p> These are often fun family getaways, as they typically offer activities for the non-angling
                    members of the group, in addition to the great fishing!</p>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6 col-md-offset-0 col-sm-8 col-sm-offset-0">
        <article>
            <section>
                <h4>We provide personalized value for all destinations we list.</h4>
                <p>
                <ul style="list-style-type:circle">
                    <li>Solid support after the sale</li>
                    <li>Timely angling intelligence </li>
                    <li>Logistical strategies for the real world, so you don't get stuck in a bad spot.</li>
                    <li>Custom offline maps. Find your way around with no network connection.</li>
                    <li>Specialized fly patterns designed by local wizards. </li>

                    <li>Comprehensive packing checklists.
                        <ul style="list-style-type:square">
                            <li class="small">Not just angling gear, everything you will need to make your trip comfortable, predictable and awesome.</li>
                        </ul>
                    </li>
                    <li>
                        <a href="https://hoboflyfishing.com/publications/posts/we-learned-the-hard-way-so-you-don-t-have-to"
                           title="We learned the hard way so you don't have to">
                            Learn from Our Mistakes</a>.&trade;
                        We've made a few, maybe.
                    </li>
                    <li>Surprises, merchandise and promo items.</li>
                    <li>Slightly less bullshit than you may be used to.</li>
                </ul>
                </p>

            </section>
        </article>
    </div>
    <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-0">
        <article class="article">

            <section>
                <p>We will never have a hundred names on our "Pro Staff." We don't want them.
                </p>
                <p>
                    90% are meaningless headshots next to the name of some random clown they met at the bar.
                </p>
                <img src="{{ asset('images/the-dude-1.jpg') }}" style="border-radius:1em;"
                     alt="Yeah, well, that's just, like, your opinion, man."
                     title="Yeah, well, that's just, like, your opinion, man."
                >
            </section>

        </article>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-md-offset-0">
        &nbsp;
    </div>
</div>
@stop
@section('bottom')
    <footer style="background-color:#20303f; color:white; padding:1em; margin-top:2em;">
        <h2 class="text-center">Don't be fooled by <span class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s">'<strong>free advice</strong>'</span></h2>
        <h3 class="text-center">We don't send <span class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s"><strong>The 5th Dude</strong></span> along for the trip</h3>
        <p class="text-center"><span class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="1.5s">(on your dime)</span></p>
        <h4 class="text-center"><span class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="2.0s">It's that simple.</span></h4>
    </footer>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            &nbsp;
        </div>
    </div>
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
