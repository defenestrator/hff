@extends('layouts.master')

@section('title')
Bahia Honda Sporting Club
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;" src="/images/bahia-honda/composite.jpg"
         alt="The serious Keys fishing destination." title="The serious Keys fishing destination.">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Bahia Honda Sporting Club
    </h1>
@stop

@section('content')
    <h2 class="text-center">So you want to bow to the great Silver King in the Florida Keys?</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>Do you know a fly fishing-savvy captain who lives and fishes the tarpon-rich waters of the Florida
                        Keys year round who is not booked years in advance?</p>
                    <p>We do.</p>
                    <p>Or you could travel to the Keys during prime tarpon season, hire a trout fishing guide from Rockies
                        who drops in for a few months, then spend your off-the-water time searching for a place to stay
                        and places to eat.</p>
                    <img src="/images/bahia-honda/davesunset.jpg"
                         alt="Sunset doesn't get any better than this." title="Sunset doesn't get any better than this.">                    <p>Tarpon fly fishing can be taxing to the mind and body. If you are brand new to the tarpon game
                    <p>We’re betting you’d rather book a trip to the Keys at Bahia Honda Sporting Club, the Keys’ only
                        full-service tarpon fishing lodge. Bahia Honda’s captains take care of the fishing, and the lodge
                        takes care of everything else.</p>
                    <p>Tarpon fly fishing can be taxing, and if you are new to the game, you will be fired up and ready
                        tangle with the silver king. But regardless of your amped-up tarpon lust, handling all the logistics
                        yourself can make a 24-hour day seem like a 72-hour struggle. So you can pound the docks for a guide,
                        take your chances on lodging and wait for a table, or you can stay and fish with Bahia Honda and
                        let local legend Chef Bill feed you his specialties.</p>
                    <p>It’s your call, but we’re still betting Bahia Honda will be the call you make.</p>


                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <p class="text-center">Bahia Honda Sporting Club has a reputation second to none in providing outstanding opportunities
                        for tarpon and other flats fish like permit, bonefish and barracuda. </p>
                    <sales-inquiry></sales-inquiry>
                    <p class="text-center">Book with us early as this
                        fishery has a short window of only 11 weeks each year.</p>
                    <img src="/images/bahia-honda/lodge-04.jpg"
                         alt="The lodge itself is really nice, the fishing is even better" title="The lodge itself is really nice, the fishing is even better">
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