@extends('layouts.master')

@section('title')
    Midnight Sun Trophy Pike Adventures - Yukon, Alaska.
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="/images/midnight-sun/scott-guide-pic-1.jpg"
         alt="Giant effing Northern Pike" title="Giant effing Northern Pike">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Midnight Sun Trophy Pike Adventures
    </h1>
@stop

@section('content')
    <h2 class="text-center">Trust us when we tell you Alaska has more to offer then salmon, steelhead and giant trout.</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>Close your eyes and picture a remote, placid river in the majestic Alaskan backcountry.</p>
                    <p>A bald eagle screeches high overhead, a sow black bear and her cub stroll along a row of willows
                        in a sub-arctic meadow. A mother duck leads a string of 10 ducklings across the river, and the
                        midnight sun bathes the whole scene in a warm, soft glow.</p>
                    <h4>Wham!</h4>
                    <p>An explosion in the water disrupts the placid beauty, and the hen frantically gathers her ducklings,
                        only to find that her brood is now five.</p>
                    <p>For fly anglers looking for the thrill that only a meat-eating trophy fish can provide, Midnight
                        Sun Trophy Pike Adventures is a must-do destination for your bucket list.</p>
                    <p>This unique trip is for those who love casting giant flies to meat eaters, or those who want to
                        try it. Hell, you can probably catch one on a baby duck fly if you want.</p>
                    <p>On this trek, anglers can land pike well over 44 inches. On top of that, you have a shot at the
                        “tarpon of the North,” the Sheefish, which is well-known for their fierce strikes and epic battles.</p>

                    <img src="/images/midnight-sun/sheefish1.jpg"
                         alt="Pissed off Sheefish" title="Pissed off Sheefish">

                    <p>Midnight Sun Trophy Pike Adventures provides a fully guided trip in Western Alaska on one of the
                        Yukon’s largest tributaries.</p>
                    <p>Your expedition is housed aboard the Midnight Sun, a beautiful, 67-foot houseboat that puts a
                        different twist to sport fishing in Alaska. It’s a luxury craft designed with all of the creature
                        comforts and modern amenities for up to six guests per week in three staterooms, each sleeping two guests.</p>
                    <p>Book soon as this is a very popular destination…email or call Hobo Fly Fishing for details.</p>

                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <p class="text-center">Book now for 2018!</p>
                    <sales-inquiry></sales-inquiry>
                    <p>Ferocious takes, giant Northern Pike, angry Sheefish, Alaska. Smashing fun.</p>
                    <img src="/images/midnight-sun/alaska-fishing-boat.jpg"
                         alt="Home sweet houseboat" title="Home sweet houseboat">

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