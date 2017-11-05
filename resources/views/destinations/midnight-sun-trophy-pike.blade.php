@extends('layouts.app')

@section('title')
    Midnight Sun Trophy Pike Adventures
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="" alt="" title="">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Midnight Sun Trophy Pike Adventures
    </h1>
@stop

@section('content')
    <h2 class="text-center">Trust us when we tell you Alaska has more to offer then Salmon, Steelhead and Giant trout.</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>Close your eyes and picture a scene on a remote section of a slow moving river, in the majestic
                        Alaskan backcountry, a bald eagle screeches high overhead. In the river, adjacent
                        to a beautiful subarctic meadow a mother duck paddles along with a string of 10 newly hatched ducklings.
                        A sow black bear and her cub are strolling along the row of willows at the edge of the meadow. The
                        midnight sun of Alaska illuminates it all with a warm soft glow.</p>
                    <h4>Wham!</h4>
                    <p>An explosion in the water disrupts the placid beauty. The hen frantically gathers her ducklings,
                        only to find that her brood of ten is now only five.</p>
                    <p>For those fly casting anglers looking for the thrill that only a meat eating trophy pike can provide
                        Midnight Sun Trophy Pike Adventures is a must-do destination for your bucket list. This unique
                        trip is perfect for those of you that love casting giant flies to meat eating fish. Hell, you can
                        probably catch one on a baby duck fly, if you want.</p>
                    <p>On this trek, anglers have opportunities to land trophy pike well over 44 inches. Not only that,
                        you may have a shot at the "Tarpon of the North," the Sheefish, well-known for their fierce takes
                        and epic battles.</p>
                    <p>Midnight Sun Trophy Pike Adventures provides a fully guided trip in Western Alaska on one of the
                        Yukon’s largest tributaries.
                        <p>Your entire expedition takes place aboard a beautiful 67 x 16 foot houseboat called the ‘Midnight
                        Sun’. Providing a new twist to sport fishing in Alaska; this boat is designed with all of the creature
                        comforts and modern amenities for up to six guests per week. The boat has three staterooms, each
                        sleeping two guests.</p>
                    <p>Book soon as this is a very popular destination…email or call Hobo Fly Fishing for details.</p>
                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <p class="text-center">Book soon as this is a very popular destination…</p>
                    <sales-inquiry></sales-inquiry>
                    <p>Ferocious takes, giant Northern Pike, angry Sheefish, Alaska. Smashing fun.</p>
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