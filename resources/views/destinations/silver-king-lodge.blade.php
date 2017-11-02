@extends('layouts.app')

@section('title')
    Silver King Lodge
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="/images/os/tarpon.jpg" alt="The Silver King stares into you." title="The Silver King stares into you.">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Silver King Lodge - Costa Rica
    </h1>
@stop

@section('content')
    <h2 class="text-center">In this corner we have Megalops atlanticus!</h2>
    <h3 class="text-center">And in this corner we have… you!</h3>
    <h2 class="text-center">Are you ready to rumble?</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>Costa Rica’s Silver King Lodge puts you in the heart of some of the world’s best fishing for
                        ginormous tarpon. You know, the ones that launch out of the water like an ICBM and splash down
                        like a fat, drunk redneck winning a belly flop contest. Fish with five-gallon bucket mouths,
                        silver-dollar scales and scythe-like tails. Fish so big even your mother might accuse you of
                        fish tales when you mention their size.</p>
                    <p>Let’s face it, those are the fish you’ve always dreamed about, and here’s your chance to get in
                        the ring with them. But be forewarned, you may be fighting above your weight class because some
                        weigh north of the double century mark.</p>
                    <img style="width:100%;"  src="/images/silver-king-lodge/jumping.jpg"
                         alt="Do battle with the Silver King" title="Do battle with the Silver King">
                    <p>While tarpon fishing may be the main event, the undercards aren’t slackers. You can also catch
                        mackerel, jacks, snapper, pompano, snook and more, and if that’s still not enough, there’s
                        offshore fishing available, too.</p>
                    <p>And you will be doing it all with a twist of luxury. Silver King Lodge also offers upscale
                        tropical accommodations with spacious rooms, large beds, air conditioning, swimming pool,
                        and fine dining.</p>

                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <h3 class="text-center">Take a shot at the biggest Tarpon on Earth.</h3>
                    <sales-inquiry></sales-inquiry>
                    <img style="width:100%;"  src="/images/silver-king-lodge/thrashing.jpg"
                         alt="Take your shot" title="Take your shot">
                    <p>The have some nice Trevally, too.</p>
                    <img style="width:100%;"  src="/images/silver-king-lodge/trevally.jpg"
                         alt="They have some nice Trevally, too." title="They have some nice Trevally, too.">
                    <p>But we know you prefer these.</p>
                    <img style="width:100%;"  src="/images/silver-king-lodge/megalops.jpg"
                         alt="They have some nice Trevally, too." title="They have some nice Trevally, too.">
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