@extends('layouts.app')

@section('title')
    Backcountry River Guides
    @parent
@stop

@section('page_styles')
    <style>
        .article img {
            margin-bottom:1em;
        }
    </style>
@stop

@section('top')
<img style="width:100%;"  src="{{ asset('images/backcountry-river-guides/slide1-178.jpg') }}" alt="Steelhead" title="Steelhead">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Backcountry River Guides
    </h1>
@stop

@section('content')
    <h2>Hot Steel on Idaho's Wild Salmon River.</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>
                    Back Country River Guides works two-hundred miles of Idaho's Salmon River,
                    120 of which travels through the Frank Church River of No Return Wilderness;
                    A massive roadless primitive area, lovingly referred to by locals as "The Frank."
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
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <blockquote class="small"><em>"Fancy, sounds expensive"</em> <br><span class="pull-right">
                                - You, probably.
                            </span> </blockquote>
                    <hr>
                    <h4 class="text-center">Nope.</h4>
                    <p class="text-center"><strong>4 anglers, 4 days. Fully outfitted.</strong></p>
                    <h3 class="text-center"><i class="fa fa-bolt"></i><strong> $4000 </strong><i class="fa fa-bolt"></i></h3>
                    <sales-inquiry></sales-inquiry>
                    <img src="{{ asset('images/backcountry-river-guides/intrudershadow1.png') }}" alt="Intruder Alert!" title="Intruder Alert!">
                    <p>Backcountry River Guides' trips are part of our "Full Service" lineup and we highly
                        recommend them to any steelheaders chasing a world-class trip on a budget.</p>

                    <img src="{{ asset('images/backcountry-river-guides/boat.jpg') }}" alt="BRG - Brent Sawyer - The Boat" title="BRG - Brent Sawyer - The Boat">
                   <p> We are confident this is the best steelhead expedition, at this price, in the lower 48.</p>
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