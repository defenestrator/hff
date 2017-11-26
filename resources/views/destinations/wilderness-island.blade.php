@extends('layouts.master')

@section('title')
    Wilderness Island - Western Australia
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="/images/wilderness-island/underwater-trevally.jpg"
         alt="Get away from the mainland, see some real outback!" title="Get away from the mainland, see some real outback!">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Wilderness Island - Western Australia
    </h1>
@stop

@section('content')
    <h2 class="text-center">Lost. Survivor. Castaway. Gilligan’s Island. </h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>If you said "deserted islands," you win the prize.</p>
                    <p>So what does that have to do with Wilderness Island? You won’t be a castaway, and you won’t be stranded,
                        but you will have an entire island to yourself 24 miles from Exmouth, Australia.</p>
                    <img src="/images/wilderness-island/sunset.jpg"
                         alt="Crikey!" title="Crikey!">
                    <p>Spoiler Alert! There are also a lot of freakin’ fish in the waters surrounding Wilderness Island,
                        probably more than you than even the most optimistic angler would estimate.</p>

                    <p>Golden trevally, giant trevally, giant herring, mangrove jack, permit, barramundi, spanish mackerel,
                        queenfish, longtail tuna, snapper, cod, bluebone and coral trout are some of the 100 odd species
                        of fish will be waiting for your fly. And since fishing is strictly catch and release, they
                        will remain plentiful.</p>
                    <img style="width:100%;"  src="/images/wilderness-island/brassy-trevally.jpg"
                         alt="Australia is ready, when you are ready to level-up your fly fishing game."
                         title="Australia is ready, when you are ready to level-up your fly fishing game.">
                    <p>The camp is barely above the high-tide line and what you’d expect from a remote fishing outpost.
                        No TV, no crowds and no busy schedules, and seriously, if you bring your pals and you can
                        literally have an island to yourself. You won’t be stranded, but after a few days of fishing there,
                        you might wish you could be.</p>
                </article>
            </section>
        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <p class="text-center">Australia left <em>'amazing'</em> behind in a wake of blue water,</p>
                    <p class="text-center">after all, it's Oz.</p>
                    <p class="text-center"> <sales-inquiry></sales-inquiry></p>
                    <p class="text-center">All one need do is ask...</p>
                    <img style="width:100%;"  src="/images/wilderness-island/mangrovejack.jpg"
                         alt="Australia rules, mate!" title="Australia rules, mate!">
                    <p>Wilderness Island is an expedition to beat the band.</p>
                    <img style="width:100%;"  src="/images/wilderness-island/giant-herring.jpg"
                         alt="Giant herring!" title="Giant herring!">
                    <img style="width:100%;"  src="/images/wilderness-island/golden-trevally.jpg"
                         alt="Golden trevally!" title="Golden trevally!">
                    <p>Arguably the best flats fishing on the planet.</p>
                    <img style="width:100%;"  src="/images/wilderness-island/queenie.jpg"
                         alt="Australia rules, mate!" title="Australia rules, mate!">
                    <img src="/images/wilderness-island/barramundi.jpg"
                         alt="barramundi-o!" title="barramundi-o!">
                </article>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <p class="text-center">Vive l'Australia!</p>
        </div>
    </div>
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
@stop