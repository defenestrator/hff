@extends('layouts.app')

@section('title')
    Have Rod Will Travel
    @parent
@stop

@section('page_styles')
@stop

@section('top')

    <div class="tagline text-center">
        <h1 style="padding-left:1em; padding-right:1em;" class="bg-border wow pulse" data-wow-duration="2.5s">
            More than 30 fly fishing lodges worldwide
        </h1>
        <h2 class="text-center">Trust us to represent them.</h2>
    </div>

@stop

@section('content')

    <h3 class="text-center">We hunt down the best fly fishing specific trips on the planet.</h3>
    <p class="text-center">We don't build relationships with lodges and anglers, we make friends.</p>
    <h4 class="text-center">We like the sound of "Win, win, win."</h4>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <section>
                <article class="article">
                    <header style="background-color:#20303f; color:white; padding:1em; border-radius:1em; margin-top:2em;">
                        <h2 class="text-center">Don't be fooled by <span class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s">'<strong>free advice</strong>'</span></h2>
                        <h3 class="text-center">We don't send <span class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s"><strong>The 5th Dude</strong></span> along for the trip</h3>
                        <p class="text-center"><span class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="1.5s">(on your dime)</span></p>
                        <h4><span class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="2.0s">It's that simple.</span></h4>
                    </header>
                    <section style="margin-top:2em;">
                        <article class="article">
                            <p>We will never have a hundred names on our "Pro Staff." We don't want them.
                            </p>
                            <p>
                                90% are meaningless headshots next to the name of some random clown they met at the bar.
                            </p>
                            {{--<img src="{{ asset('images/the-dude-1.jpg') }}" style="border-radius:1em;"--}}
                                 {{--alt="Yeah, well, that's just, like, your opinion, man."--}}
                                 {{--title="Yeah, well, that's just, like, your opinion, man."--}}
                            {{-->--}}
                        </article>
                    </section>
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
@stop

