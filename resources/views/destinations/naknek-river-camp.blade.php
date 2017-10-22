@extends('layouts.app')

@section('title')
    Naknek River Camp
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"
         src="/images/naknek-river-camp/decent-bow.jpg"
         alt="Decent Rainbow, eh?"
         title="Decent Rainbow, eh?">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Naknek River Camp
    </h1>
@stop

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <h3>Which would you prefer to pay for on an Alaskan fishing trip; Great fishing or an overpriced bottle of wine?</h3>
                    <p>
                    </p>
                    <p>If you said great fishing, we have a camp in the heart of Alaska’s finest fishing waters.
                        Naknek River Camp offers world-class salmon and trout fishing for affordable prices.
                    </p>
                    <p>Don’t worry, you won’t be camped in a Walmart tent with a bear-proof
                        fence wrapped around it like Christmas garland. You will be in one of eight weather-proof cabins
                        within Katmai National Park on the outlet of world-famous Naknek Lake in the headwaters of Bristol Bay.
                    </p>
                    <p>
                        This is self-guided trip that includes transportation from the airport, food, lodging and use of a jetboat for a week (fuel included) for $2,495. Bring your own bottle of wine, or better yet, don’t.
                        We prefer Jim Beam or tequila, but that’s just us.
                    </p>
                    <img src="/images/naknek-river-camp/grinnin.jpg" />
                </article>
            </section>
        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <p class="text-center">
                        <img src="/images/naknek-river-camp/steelie.jpg" /></p>
                    <p class="text-center"><strong>Less costly than you imagine.</strong></p>
                    <h3 class="text-center">We know you're curious.</h3>
                    <sales-inquiry></sales-inquiry>
                    <img class="logo" src="/images/naknek-river-camp/naknek-rivercamp-logo.png" />
                </article>
            </section>
        </div>
    </div>
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
@stop