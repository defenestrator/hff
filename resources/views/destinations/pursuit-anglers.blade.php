@extends('layouts.app')

@section('title')
    Pursuit Anglers - Baja
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;" src="/images/pursuit-anglers/surfing-rooster.jpg"
         alt="Surf sight-casting for Roosterfish is just about the most wicked-thrilling thing you can do, bruh"
         title="Surf sight-casting for Roosterfish is just about the most wicked-thrilling thing you can do, bruh">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Pursuit Anglers
    </h1>
@stop

@section('content')
    <h2 class="text-center">Forgive us for bragging on fellow Idahoan Joshua Martz, who runs Pursuit Anglers.</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p> He’s guiding fly anglers in the classic Mexican waters in the Sea of Cortez and giving them shots
                        at a whole menu of of awesome gamefish, including jacks, ladyfish, sierra mackerel, snappers,
                        pompano, yellowtail, and the ultimate prize, roosterfish.</p>
                    <p>They can all be caught from a boat or directly from the beach, and the turquoise-blue waters of
                        Baja provide a unique fly-fishing environment you won’t find anywhere else.</p>
                    <img class="footer logo" src="/images/pursuit-anglers/baja-mahi-mahi.jpg"
                         alt="Rolling Mahi Mahi on a fly rod" title="Rolling Mahi Mahi on a fly rod">
                    <p>Hobo Fly Fishing can arrange a variety of packages to suit all budgets, including combination
                        DIY and guided trips, and don’t overlook offshore opportunities for dorado, billfish and tuna.
                        Whether it’s your first saltwater destination or a return trip, a trip to Baja is a classic.</p>

                    <p class="text-center">
                        <iframe src="https://player.vimeo.com/video/104133376"
                            width="320" height="238" frameborder="0"
                            webkitallowfullscreen mozallowfullscreen allowfullscreen>
                        </iframe>
                    </p>
                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <img src="/images/pursuit-anglers/big-cock.jpg"
                         alt="Big cock, err umm Rooster." title="Big cock, err umm Rooster.">
                    <h3 class="text-center">Gnarly, dude</h3>
                    <sales-inquiry></sales-inquiry>
                    <p>Surf sight-casting for Roosterfish is just about the most wicked-thrilling thing you can do, bruh</p>
                    <img class="footer logo" src="/images/pursuit-anglers/the-beach.jpg"
                         alt="Does life get more beautiful than this?" title="Does life get more beautiful than this?">
                    <p>Does life get more glorious than this?</p>
                    <p>Maybe a little, if you're dedicated, but we doubt it.</p>
                    <img src="/images/pursuit-anglers/the-hunter.jpg"
                         alt="Be the hunter." title="Be the hunter.">
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
