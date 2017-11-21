@extends('layouts.master')

@section('title')
    El Pescador - Belize
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="" alt="" title="">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        El Pescador - Belize
    </h1>
@stop

@section('content')
    <h2>After more than 40 years in business,</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>El Pescador Lodge in Belize is a destination that sets a standard for a traveling angler. It boasts
                        some of the best flats fishing in the world and arguably has provided more grand slams than any
                        place.</p>
                    <p>In fact, one of the biggest challenges you’ll face is what rods to bring each day. Better bring
                        them all, because you never know if you will be casting to a school of bonefish the size of your
                        forearm or tarpon the size of your fat mother-in-law. Add permit, snook, and other game fish and
                        you will see   the waters around Ambergris Caye are a target-rich environment.</p>
                    <p>Then there’s the lodge, and you really couldn’t ask for more. It’s comfortable, classy and loaded,
                        including a restaurant and bar, private beach, three swimming pools, WiFi, and even a fly fishing
                        shop.</p>
                    <p>And if you’re concerned about the hassles of foreign travel, Belize is among the most user-friendly
                        countries. Everyone speaks English, and the Belizean dollar is tied directly to the U.S. dollar,
                        and used interchangeably. Belizean people are friendly, the vibe is casual and the fishing is
                        excellent.</p>
                    <p>All fishing trips are a bit of gamble, but with great fishing and hassle-free travel, El Pescador
                        stacks the odds in your favor.</p>

                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>The good life, come and get it!</p>
                    <sales-inquiry></sales-inquiry>

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