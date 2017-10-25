@extends('layouts.app')

@section('title')
    Stonefly Lodge, South Island, NZ
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="" alt="" title="">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Stonefly Lodge, South Island, NZ
    </h1>
@stop

@section('content')
    <h2>We’re trying not stare, trying not to look all slack-jawed and salivating... </h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>...but it’s hard when there are crystal-clear rivers sporting brown trout that average 4 to 5 pounds
                        and top-enders that hit double digits.</p>
                    <p>If that isn’t tempting enough, it’s nestled away in New Zealand in a setting that looks like it
                        came out of a storybook for trout anglers, but it’s real.</p>
                    <p>A trip to Stonefly Lodge borders on the surreal when you take it all in. Not only do you have
                        world-class flyfishing in streams that host up to 500 trout per kilometer (that's .6 miles if you’re
                        in the U.S.), but you can get whisked away to these rivers by helo.</p>
                    <img src="" title="What the hell, helicopter fishing? Hell yes, helicopter fishing!" alt="What the hell, helicopter fishing? Hell yes, helicopter fishing!">
                    <p>It should come as no surprise the accommodations are first-class.
                        The lodge and hospitality alone are with the trip…. Wait, did we say that? Naw, it’s the fish,
                        but damn, the whole package at Stonefly  Lodge is mind boggling, and it’s easy to see why many anglers consider this the trip of a lifetime.</p>

                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <sales-inquiry></sales-inquiry>
                    <p></p>
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
    @stop