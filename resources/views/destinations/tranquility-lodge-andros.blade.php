@extends('layouts.app')

@section('title')
    Tranquility Hill Lodge, Andros, Bahamas
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="/images/tranquility/stalking.jpg"
         alt="Stalking the saltwater flats is half the fun!" title="Stalking the saltwater flats is half the fun!">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Tranquility Hill Lodge - Andros, Bahamas
    </h1>
@stop

@section('content')
    <h2 class="text-align">Tranquility Hill Lodge is one of those great bonefish spots you’ve surely read about.</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p> The area is well-known for good numbers of massive bonefish. But maybe bonefish aren’t your thing
                        right now, maybe you want to test your mettle by sight casting to adult migratory Tarpon? At
                        Tranquility Hill Lodge you will have a lot of opportunity for that, too. We recommend it highly,
                        as a tarpon fishery, as they are now offering tarpon-specific packages for the first time.</p>
                    <img style="width:100%;"  src="/images/tranquility/boat.jpg"
                         alt="Poling the saltwater flats is the other!" title="Poling the saltwater flats is the other!">
                    <p>In fact, we’re betting that Tranquility Hill will blow your mind with it’s great sight-fishing for
                        the king of the flats. Whether you’re poling around in a panga or wading and stalking fish across
                        the expansive flats, the crystal clear waters around Andros provide some smashing chances to
                        sight-fish to hungry poons, and the digs are nice to boot. Chef Kora makes sure guests always have
                        great food, including dessert. The lodge’s friendly atmosphere, free Wi-Fi, laundry service, and
                        other amenities make staying at Tranquility Hill downright comfy. It sure is nice to let someone
                        else take care of the day-to-day chores like cooking and laundry when there’s so much fishing to do!</p>
                    <p>Hobo Fly Fishing is proud to offer Tranquility Hill Lodge’s new Tarpon program. These trips will
                        sell out well in advance, so book now to get your foot in the door!</p>
                    <img style="width:100%;"  src="/images/tranquility/freedom.jpg"
                         alt="Taste the freedom of the sea" title="Taste the freedom of the sea">
                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <h3 class="text-center">We can’t get enough of this spot, we love talking about it.</h3>
                    <p class="text-center">Don’t hesitate to get in contact with us, we get as excited as you do about
                        spots like Tranquility Hill Lodge.</p>
                    <sales-inquiry></sales-inquiry>
                    <p class="text-center">Book now for 2018 and 2019!</p>
                    <img src="/images/tranquility/tarpon.jpg"
                         alt="It's all about the poons, baby!" title="It's all about the poons, baby!">
                    <img src="/images/tranquility/sporty.jpg"
                         alt="Don't forget your shades, bro." title="Don't forget your shades, bro">
                    <img src="/images/tranquility/island.jpg"
                         alt="The future is bright!" title="The future is bright!">
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