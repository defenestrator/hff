@extends('layouts.master')

@section('title')
    Ikari House, Christmas Island
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="" alt="" title="">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Ikari House, Christmas Island
    </h1>
@stop

@section('content')
    <h2>We could crack a weak joke (which is kind of our specialty)</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p> about a fly fishing package to Christmas Island being one you won’t have to wait to unwrap, but
                        it’s too easy.</p>
                    <p>What’s also too easy is deciding to travel to this tiny Pacific island that’s practically a
                        household name for fly anglers even though it’s three time zones from Hawaii and a tiny speck on
                        the map. Most anglers know Christmas Island for its nearly infinite flats and massive schools of
                        bonefish.</p>
                    <p>Ikari House will be your home away from home on Christmas Island. It’s a cozy and comfortable place
                        to stay with roomy, air conditioned accommodations alongside some of the best fly fishing action
                        on the planet.</p>
                    <p>The lodge is limited to eight anglers or four couples at a time so you can feel far from crowds
                        and have loads of fishing to yourself. The lodge offers two anglers per guide, so you will have
                        expert eyes and advice at your elbow.</p>
                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>You'll be stuck there all week...aww, shuckie-darn!</p>
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