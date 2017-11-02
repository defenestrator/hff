@extends('layouts.app')

@section('title')
    Backcountry River Guides
    @parent
@stop

@section('page_styles')

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

                    <p>Forgive our Idaho bias, but frankly, we think Backcountry River Guides offers one of the coolest
                        steelhead trips in North America. It’s like a wilderness elk hunt, but with steelhead replacing
                        elk as your quarry. You’re fishing on the Salmon River in the heart of the Frank Church/River of
                        No Return Wilderness, which is the largest wilderness in the Lower 48.</p>
                    <img src="{{ asset('images/backcountry-river-guides/slide2-2767.jpg') }}" alt="More Steelhead." title="More Steelhead.">

                    <p>You’ll take a thrilling jet boat ride upstream through Class III and IV whitewater (which means hold
                        onto your ass), fish pristine steelhead runs, camp in heated canvas wall tents on broad, sandy
                        beaches and eat hardy meals prepared by your guides.</p>

                    <p>The steelhead fishing is among the best in the Northwest, and it will amaze you how these
                        sea-run fish can migrate hundreds of miles from the Pacific into Idaho’s mountains and still fight like a welter-weight title contender.</p>
                    <p>If that’s not enough, you’re in spectacular canyon country where bighorn sheep, deer, elk,
                        black bears and wolves roam free and wild.</p>
                    <img src="{{ asset('images/backcountry-river-guides/Slide3-2808.jpg') }}" alt="Even More Steelhead" title="Even More Steelhead">

                    <p>Yeah, we may be biased, but with all that at an affordable price, it’s easy to understand why.</p>
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
                    <h3 class="text-center"><strong> $4000 </strong></h3>
                    <p class="text-center">(only $1000 per angler!)</p>
                    <sales-inquiry></sales-inquiry>
                    <img class="logo" src="{{ asset('images/backcountry-river-guides/intrudershadow1.png') }}" alt="Intruder Alert!" title="Intruder Alert!">
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