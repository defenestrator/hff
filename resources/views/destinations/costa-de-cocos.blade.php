@extends('layouts.app')

@section('title')
    Costa De Cocos
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"
         src="{{config('filesystems.disks.DO.endpoint')}}/images/costa-de-cocos/costa-de-cocos-permit.jpg"
         alt="Nice f***in' Permit, dude!"
         title="Nice fu**in' Permit, dude!">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Costa de Cocos
    </h1>
@stop

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <h2>Permit, bonefish, tarpon, barracuda, jacks...</h2>
                    <p> If you’re hearing a cash register dinging in your head when you consider a place that gives you
                        legit shots at all these fish, push the mute button. Costa De Cocos is your gateway to saltwater
                        flyfishing without an arm-or-leg admission price.
                    </p>
                    <p class="text-center">
                        <iframe width="280"
                                height="158"
                                src="https://www.youtube-nocookie.com/embed/YCEpp1A04KY?rel=0"
                                frameborder="0" allowfullscreen>
                        </iframe>
                    </p>
                    <p>This southern Yucatan resort has access to the second-largest barrier reef in the world and the
                        Sian Ka’an Bio Reserve, which means the fisheries are managed for sustainability. The area produces
                        excellent flats fishing and adjacent lagoons for tarpon, all in a place that’s off the beaten
                        path, but still accessible. What’s more, you can fish guided, unguided or mix and match to suit
                        your budget.
                    </p>
                    <p>
                        Our hybrid trip includes both guided and self-guided days in this amazing location. Our angler
                        support package will save you time, prevent logistical headaches, and reduce the pain of learning a new fishery.
                    </p>
                    <img src="{{config('filesystems.disks.DO.endpoint')}}/images/costa-de-cocos/scuba-with-tarpon.jpg" />
                    <p>The fish don't know if they are in Belize or Mexico, it's all the same water.</p>
                    <p>If you have specific needs or desires, let us know, and we'll build a trip just for you.</p>
                </article>
            </section>
        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <p> Is an egg-white omelet and a caffè latte at some extravagant lodge across the border worth three grand?
                    </p>
                    <p>Heck, you could use that money toward a second trip to Costa de Cocos!</p>
                    <img src="http://www.costadecocos.com/images/costa%20de%20cocos%20fishing%20lg.jpg">
                    <h3>Phase one:</h3>
                    <ul>
                        <li>4 nights, 3 days </li>
                        <li>Food and lodging</li>
                        <li>Guided fishing (2 per boat)</li>
                    </ul>
                    <h3>Phase two:</h3>
                    <ul>
                        <li>3 days</li>
                        <li>Lodging only</li>
                        <li>Self-guided adventure time!</li>
                    </ul>
                    <h3 class="text-center">Only $4000!</h3>
                    <p class="text-center">(Four anglers, $1000/each)</p>
                    <sales-inquiry></sales-inquiry>

                    <img src="{{config('filesystems.disks.DO.endpoint')}}/images/costa-de-cocos/OttoMannandAlberto_640x419.jpg"
                         alt="Otto and Alberto with a nice Permit"
                         title="Otto and Alberto with a nice Permit">
                    <p class="small">Additional costs, including travel to and from Xcalac, not included.</p>
                    <p class="small">Inquire for additional details.</p>
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