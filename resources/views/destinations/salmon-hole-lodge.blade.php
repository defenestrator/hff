@extends('layouts.app')

@section('title')
    Salmon Hole Lodge
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="" alt="" title="">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Salmon Hole Lodge
    </h1>
@stop

@section('content')
    <h2>Conquer <em>The Leaper</em></h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>At some point in your flyfishing career, you have, or will, wonder what it’s like to catch an Atlantic
                        salmon. They’re mysterious, elusive and wrapped in legendary legend. They’re also usually really
                        freaking expensive to fish for because many of the rivers with them have been tied up for generations
                        by a few lodges that could drain a Harvard-sized college fund.</p>
                    <p>We’ve found a chink in their armor. The Salmon Hole Lodge offers affordable Atlantic salmon fishing,
                        which are words rarely seen together. The lodge sets 3 miles upstream from the Atlantic on the
                        Lapoile River in Newfoundland. The river offers fishing for Atlantic salmon and sea-run brook trout. All fishing is guided, as required by law.</p>
                    <p>The Salmon Hole Lodge is a rustic fishing camp with clean and comfortable accommodations. Located three miles upstream from the Atlantic, it’s centrally situated among the La Poile’s finest salmon pools. The lodge is spacious and caters to no more than six anglers per week to ensure an uncrowded conditions with low angling pressure and optimal catch rates.</p>

                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
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