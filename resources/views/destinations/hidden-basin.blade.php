@extends('layouts.master')

@section('title')
    Hidden Basin - Kodiak, AK
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="" alt="" title="">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Hidden Basin - Kodiak, AK
    </h1>
@stop

@section('content')
    <h2>How’s your bragging game? How’s your swagger?</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p> Better brush up on them when you book a trip to
                        Hidden Basin Lodge. Let’s be blunt, when you drop into your local brewpub and start name dropping
                        Kodiak, Alaska, you should do it with some attitude.</p>
                    <p>Catching salmon, steelhead and trophy-sized trout will put the swagger in your stride, and Kodiak
                        is famous for them. This is big, epic country, and you will arrive at the lodge in classic style
                        in a float plane. Don’t worry about combat fishing here because the lodge only holds six people.
                        But you will be combating those fish, and the spectators are more likely to be eagles and brown
                        bears than other anglers.</p>
                    <p>Which is why you want to work on your swagger game because you don’t want to tell fish stories
                        like “after the float plane trip we hooked salmon and shared our favorite fishing hole with a
                        couple bears” and sound like you’re ordering a latte at the library.</p>
                    <p>OK, we’re kidding (a little), but not about Hidden Basin Lodge because the fish, eagles and bears
                        are for real, and you’re not going to come back bragging about the Chardonnay. But feel free to
                        brag about the food, because the local seafood can’t be beat, and the large dining room, living
                        room and deck have panoramic views of Hidden Basin.</p>
                    <p>So don’t be bashful about a little boasting because as the saying goes, it’s not bragging if you
                        can back it up, and after fishing Hidden Basin, you can definitely back it up.</p>
                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>Get wild on the south side of the island</p>
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