@extends('layouts.app')

@section('title')

    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <div style="padding:2em 0;
                background: #1a1a1a url('../images/') left center no-repeat;
                background-size:cover; height:80vh;" >
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Title
    </h1>
    </div>
@stop

@section('content')
    <h2>Tagline</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <h1><a id="Blackfish_Lodge_0"></a>Blackfish Lodge</h1>
                    <p>Looking for fishing trip that’s a little posh and a little different? Think of Blackfish Lodge as a floating B&amp;B (all meals included) in British Columbia backcountry with spectacular wilderness scenery, abundant wildlife and, naturally, great fishing. You will fly in by seaplane to catch the salmon and sea-run cutthroats, and your group can have the whole thing to yourselves if there’s at least six of you and a maximum of eight. Fishing includes salmon or trout fishing in a secluded Canadian river, lake or stream, and fishing for trophy salmon in the protected waters of the surrounding islands. And this is not the place to be flyfishing snob. Put aside the feathers, grab a spinning rig, bait up and hoist a halibut, because we have one bit of bad news: they won’t take dry flies.</p>

                    <p>blurb</p>
                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <p class="text-center"><strong>5 days (6 nights) of guided fishing</strong></p>
                    <h3 class="text-center"><strong>$2,200 per angler</strong></h3>
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