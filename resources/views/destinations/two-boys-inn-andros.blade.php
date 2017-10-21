@extends('layouts.app')

@section('title')
    Big-Ass Bonefish at Two Boys Inn, Andros Island
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <div style="padding:2em 0;
                background: #1a1a1a url('../images/two-boys-inn-andros/andros-bones.jpg') left center no-repeat;
                background-size:cover; height:80vh;" >
    <h1 style="padding:0 0.5em;" class="showcase-header feature-tagline text-center wow pulse" data-wow-duration="0.5s">
        <a id="Two_Boys_Inn_Andros" title="Giant Bonefish at Two Boys Inn Andros Island Bahamas"></a>Two Boys Inn
    </h1>
        <h2 class="showcase-header feature-tagline text-center">Big-ass Bonefish</h2>
        <h3 class="showcase-header feature-tagline text-center">Fish Andros Island, Affordably</h3>
    </div>
@stop

@section('content')
    <h2 class="feature-tagline text-center">We love bonefish in salt the way we love trout in Idaho.</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p> In fact, we think of bones as kind of like trouts’ salty cousins. Why?  Because they’re plentiful and tend to be a little more angler friendly than other flats fish that can be elusive and finicky.</p>
                    <p>When we think of trophy bonefish, we think of the Bahamas, and when we think of affordable trophy bone fishing, we think about Two Boys Inn in Andros.</p>
                    <p>Boasting “bare bones budget bonefishing at its best,” they clearly know alliteration and Hobo Fly Fishing’s clientele.</p>
                    <p>Make no mistake, “bare bones” doesn’t apply to the quality of fishing at Andros, and trust us, the fish don’t care how much you paid for your trip.</p>
                    <p>Two Boys Inn accommodates up to eight anglers in four air-conditioned rooms featuring two queen beds and a private bath. Meals are served “family style” in the dining room and bar where guests, guides and locals gather over ice-cold Kaliks and conch fritters to trade tales of angling adventures.</p>

                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <p class="text-center"><strong>5 days (6 nights) of guided fishing</strong></p>
                    <h3 class="text-center"><strong>$2,200 per angler</strong></h3>
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