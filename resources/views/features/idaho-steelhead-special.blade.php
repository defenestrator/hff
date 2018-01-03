@extends('layouts.master')

@section('title')
    Idaho Steelhead Special
    @parent
@stop

@section('page_styles')
@stop

@section('top')
    <div style="padding:2em 0;
                background: #1a1a1a url('/images/backcountry-river-guides/slide1-178.jpg') center center no-repeat;
                background-size:cover;" >
        <h2 class="feature-tagline text-center">
           Idaho's Wild Salmon River
        </h2>
        <h2 class="feature-tagline text-center">4 anglers, 4 days, fully outfitted</h2>
        <h2 class="feature-tagline text-center">Swinging for Hot Steel</h2>
        <h2 style="font-size:xx-large"class="feature-tagline text-center">$1000 per Angler</h2>
        <div style="margin: 0 auto;width:300px; max-width:70%"><sales-inquiry></sales-inquiry></div>
    </div>
@stop

@section('content')
    <h2></h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <section>
                <article class="article">
                    <p>
                    Backcountry River Guides works two-hundred miles of Idaho's Salmon River,
                    over a hundred miles of it is inside the Frank Church River of No Return Wilderness;
                    A massive roadless primitive area, lovingly referred to as "The Frank."
                    Some of this water has never seen a spey rod, a fact that should excite anyone in
                    search of untouched steelies!
                    </p>
                    <img src="{{ asset('images/backcountry-river-guides/slide2-2767.jpg') }}" alt="More Steelhead." title="More Steelhead.">
                    <p>
                        If you want to hook into some fierce ocean-run redbands without literally rubbing elbows with
                        people you've never met, this is the most exciting opportunity in the lower 48!
                    </p>

                    <p>This fishery has a short peak each year. The water temps and flows are historically best from
                        October 15th through about November 15th and those dates are often booked more than a year in advance.
                        Get a shot at the most remote steelhead water in the continental USA, with Brent Sawyer and
                        Backcountry River Guides!
                    </p>
                    <img src="{{ asset('images/backcountry-river-guides/steelie-hell.jpg') }}" alt="Even More Steelhead" title="Even More Steelhead">
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

@stop