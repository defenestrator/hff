@extends('layouts.master')

@section('title')
    Eagle River Lodge - Labrador
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;" src=""
         alt=""
         title="">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Eagle River Lodge - Labrador
    </h1>
@stop

@section('content')
    <h2 class="text-center">We get it,</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                     <p>because we were a little skeptical too about traveling to Labrador to catch brook trout.
                    Brook trout? Those little buggers that haunt mountain streams and lakes? Those?</p>
                    <p>Then we saw the photos. Holy shit! Look at those freakin’ (not our exact words) brook trout?
                        Those things are pigs. And they take dry flies!</p>
                    <p>You get the message. Take everything you think you know about brook trout fishing and toss it,
                        into the eddy line and watch it disappear downstream. The brook trout average three to six pounds,
                        some are larger. So yeah, we’re talking brook trout the size of salmon.</p>
                    <p>This remote, fly-in lodge on the Eagle River will put you smack dab into some of the world’s finest
                        brook trout waters. Accommodations include all meals prepared homestyle, experienced guides with a
                        two anger per guide ratio, all at very reasonable prices.</p>
                    <p>So next time you think of a cute, little brook trout, think of one big enough to eat those, and
                        you’re in the neighborhood of Eagle River Trout Lodge.</p>
                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">

                    <h3 class="text-center">This is gonna be fun!</h3>
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