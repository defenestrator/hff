@extends('layouts.master')

@section('title')
    The Blue Bonefish
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="/images/the-blue-bonefish/dry-bone.jpg"
         alt="Just chillin'" title="Just chillin'">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        The Blue Bonefish
    </h1>
@stop

@section('content')
    <h2>Belize. Ahhhh, Belize.</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p> Some of us cut our saltwater flyfishing teeth in your clear, fertile waters.
                    We took a once-in-a-lifetime flyfishing trip to this beautiful, tropical paradise, hooked a bonefish,
                    tarpon or permit in one of its many flats and said “once in a lifetime my ass, I’m coming back.”</p>
                    <p>Blue Bonefish heard our vow. It offers some of the most affordable trips in Belize for not just
                    the Grand Slam of flats fish (bonefish, permit and tarpon), but much more. There’s also snook,
                    barracuda, jacks, ladyfish, snapper, cobia, triggerfish and mahi.</p>
                    <img style="width:100%;"  src="/images/the-blue-bonefish/flc-bone.jpg"
                         alt="happiness is a bone in your hand" title="happiness is a bone in your hand">
                    <p>Accommodations include six private staterooms, each with a private bathroom, tile shower and
                        personally controlled air conditioning along with a private deck and a 270-degree view of the water and 100 feet of ocean frontage.</p>
                    <p>This is the place for your as-many-times-as-you-like in a lifetime fishing trip.</p>
                    <img style="width:100%;"  src="/images/the-blue-bonefish/cropped-lodge.jpg"
                         alt="A typical scene in Belize" title="A typical scene in Belize">
                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <p class="text-center">
                        <iframe src="https://player.vimeo.com/video/139644865"
                                width="320"
                                height="180"
                                frameborder="0"
                                webkitallowfullscreen
                                mozallowfullscreen
                                allowfullscreen>
                        </iframe>
                    </p>
                    <h3 class="text-center">Ask us how to fish the holy waters of Belize in style, without a second mortgage.</h3>
                    <sales-inquiry></sales-inquiry>

                    <img style="width:100%;"  src="/images/the-blue-bonefish/bone.jpg"
                         alt="nice bones, lots of them" title="nice bones, lots of them">
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