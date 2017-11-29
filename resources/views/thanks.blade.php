@extends('layouts.master')

@section('title')
    Hobo Fly Fishing | Have Rod, Will Travel
    @parent
@stop

@section('page_styles')
@stop

@section('top')
    <div class="tagline text-center" style="background-image: none;">
        <h1 class="bg-border wow pulse" data-wow-duration="0.7s">
            {{$message}}
        </h1>
    </div>
    <a href="/">
        <div class="text-center">
            <h4 style="margin:5px 10px;">Which sounds better to you?</h4>
            <h3 style="margin:5px 10px;">The trip of a lifetime,</h3>
            <h3 style="margin:5px 10px;">or a lifetime of trips?</h3>
        </div>
    </a>
    <hr>
@stop
@section('content')
    <div class="row">
        <div class="text-center container">
            <h2>
                <a href="/">Let's Go!</a>
            </h2>
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
                        <li>Travel strategies for the real world, so you don't get stuck in a bad spot.</li>
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
                    <img src="/images/the-dude-1.jpg" style="border-radius:1em;"
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
    <div class="col-md-12 col-md-offset-0">
        &nbsp;
    </div>
    <br>
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
@stop
