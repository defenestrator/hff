@extends('layouts.master')

@section('title')
    Tranquility Hill Lodge, Andros, Bahamas
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="{{config('filesystems.disks.DO.endpoint')}}/images/tranquility/stalking.jpg"
         alt="Stalking the saltwater flats is half the fun!" title="Stalking the saltwater flats is half the fun!">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Tranquility Hill Lodge - Andros, Bahamas
    </h1>
@stop

@section('content')
    <h2 class="text-align">ANDROS… BAHAMAS</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>Those two words evoke great bonefishing, and Tranquility Hill Lodge is one of those great spots
                        you’ve heard about it, but there’s more.</p>
                    <p>Maybe you want to test your mettle by sight casting to adult migratory tarpon. Tranquility Hill Lodge
                        will give you a shot, and they are now offering tarpon-specific packages for the first time.</p>
                    <img style="width:100%;"  src="{{config('filesystems.disks.DO.endpoint')}}/images/tranquility/boat.jpg"
                         alt="Poling the saltwater flats is the other!" title="Poling the saltwater flats is the other!">
                    <p>In fact, we’re betting that Tranquility Hill will blow your mind with its great sight-fishing for
                        the king of the flats, whether you’re poling in a panga or wading and stalking across the expansive
                        flats and crystal-clear waters. Andros provides some smashing chances to sight-fish to hungry poons,
                        and the digs match the quality of the fishing.</p>
                    <p>Chef Kora ensures guests always have great food, including dessert. The lodge’s friendly atmosphere,
                        free Wi-Fi, laundry service, and other amenities make your down time convenient and comfortable. Let
                        someone else take care of the day-to-day chores so you can focus on the flats.</p>
                    <p>Hobo Fly Fishing is proud to offer Tranquility Hill Lodge’s new Tarpon program. These trips will
                        sell out well in advance, so book now to get your foot in the door!</p>
                    <img style="width:100%;"  src="{{config('filesystems.disks.DO.endpoint')}}/images/tranquility/freedom.jpg"
                         alt="Taste the freedom of the sea" title="Taste the freedom of the sea">
                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <h3 class="text-center">We can’t get enough of this spot, we love talking about it.</h3>
                    <p class="text-center">Don’t hesitate to get in contact with us, we get just as excited as you do.</p>
                    <sales-inquiry></sales-inquiry>
                    <p class="text-center">Book now for 2018 and 2019!</p>
                    <img src="{{config('filesystems.disks.DO.endpoint')}}/images/tranquility/tarpon.jpg"
                         alt="It's all about the poons, baby!" title="It's all about the poons, baby!">
                    <img src="{{config('filesystems.disks.DO.endpoint')}}/images/tranquility/sporty.jpg"
                         alt="Don't forget your shades, bro." title="Don't forget your shades, bro">
                    <img src="{{config('filesystems.disks.DO.endpoint')}}/images/tranquility/island.jpg"
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