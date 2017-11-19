@extends('layouts.master')

@section('title')
    Blackfish Lodge - British Columbia backcountry salmon and trout
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <div style="padding:2em 0;
                background: #1a1a1a url('/images/blackfish-lodge/763.c.jpg') left center no-repeat;
                background-size:cover; height:80vh;" >
    <h1 style="padding:0 0.5em;" class="showcase-header feature-tagline text-center wow pulse" data-wow-duration="0.5s">
        <a id="Blackfish_Lodge"></a>
        Blackfish Lodge
    </h1>
        <h2 class="feature-tagline text-center">Looking for fishing trip that’s a little posh and a little different? </h2>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <h2>&nbsp;</h2>
            <section>
                <article class="article">
                    <p>Think of Blackfish Lodge as a
                        floating B&amp;B (all meals included) in British Columbia backcountry with spectacular wilderness
                        scenery, abundant wildlife and, naturally, great fishing. </p>
                    {{--<img src="/images/blackfish-lodge/Blackfish-Lodge-Underwater-077-2-w800_h533-600x400.jpg">--}}
                    <p>You will fly in by seaplane to catch the salmon and sea-run cutthroats, and your group can have
                        the whole thing to yourselves if there’s at least six of you and a maximum of eight.
                        Fishing includes salmon or trout fishing in a secluded Canadian river, lake or stream, and fishing
                        for trophy salmon in the protected waters of the surrounding islands. </p>
                    <p>And this is not the place to be a flyfishing snob. Put aside the feathers,
                        grab a spinning rig, bait up and hoist a halibut, because we have one bit of bad news: they won’t take dry flies.</p>
                    <img src="/images/blackfish-lodge/slide_1.jpg">
                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <h2>&nbsp;</h2>
                    <p>When you are ready for a truly diverse North Pacific coastal fishing adventure, give us a
                            shout. We offer a compelling package for this unique lodge.</p>
                    <h3><strong>Paradise, PNW style.</strong></h3>
                    <sales-inquiry></sales-inquiry>
                    <p> <img src="/images/blackfish-lodge/088-1.jpg"></p>

                </article>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <section>
            <article>
                <img class="logo" src="/images/blackfish-lodge/slid1bkgrnd.jpg">
            </article>
</section>
        </div>
    </div>
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
@stop