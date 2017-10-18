@extends('layouts.app')

@section('title')
    Costa De Cocos
    @parent
@stop

@section('page_styles')
    <style>
        .article img {
            margin-bottom:1em;
        }
    </style>
@stop
@section('content')
    <h1>Costa de Cocos</h1>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <h2>Top-tier flats fishing at amazingly affordable rates</h2>
                    <p>Every fly caster has fished waters that infiltrated their inner-being. The Caribbean out the
                        front door of Costa de Cocos is among them, for the guys at Hobo Fly Fishing.
                        The inhabitants of this unspoiled expanse of saltwater paradise consume our thoughts,
                        and sometimes lead to a lack of sleep or focus during the slog of everyday life.
                    </p>
                    <p>
                        As we tie flies in anticipation of our return, Permit, Bonefish and giant Barracuda race through
                        our minds with each wrap we make. In an attempt to stay connected with the waters near Xcalak
                        we have have accumulated several hundred dozen area-specific flies over the years.
                    </p><p>
                        This region of Mexico takes one back in time. Away from the hustle and bustle of
                        more inhabited areas, it can bring back glimmers of what those early pioneers might have felt,
                        when they first stepped ashore on the New World.
                    </p><p>
                        Abundant opportunity exists for Bonefish, Permit, Jacks, Barracuda, Tarpon, Trigger, Snapper,
                        and numerous other species that will gladly eat a fly.
                    </p>

                    <p>
                        This is a year-round opportunity for flats fishing. In some destinations anglers have been conditioned
                        to plan trips only during the "peak" months. In these waters, amazing angling can be had on almost
                        every day of the year.
                    </p>
                        <img src="http://www.costadecocos.com/images/costa%20de%20cocos%20fishing%20lg.jpg">
                    <p>
                        For saltwater ”DiY” anglers in search of new flats to stalk, this area
                        has few rivals. The thing about doing it yourself is; No matter how great you think
                        you are, a new area takes time. Success for a self-guided angler is based largely on time spent
                        working the water. And yes, at least a little luck. When you finally land a monstrous Permit,
                        or a lightning bolt of a Bonefish on some nameless flat devoid of other anglers, the victory will taste sweeter for it.
                    </p>
                    <p class="text-center">
                        <iframe width="560"
                                height="315"
                                src="https://www.youtube-nocookie.com/embed/YCEpp1A04KY?rel=0"
                                frameborder="0" allowfullscreen>
                        </iframe>
                    </p>
                </article>
            </section>
        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <img src="/images/costa-de-cocos/OttoMannandAlberto_640x419.jpg"
                         alt="Otto and Alberto with a nice Permit"
                         title="Otto and Alberto with a nice Permit">
                    <p> Is an egg-white omelet and a caffè latte at some extravagant lodge across the border worth three grand?
                    </p>
                    <hr>
                    <p>Heck, you could use that money toward a second trip to Costa de Cocos!</p>
                    <p class="text-center"><strong>The price is too low to print!</strong></p>
                    <h3 class="text-center"><strong> $???? </strong> Drop us a line!</h3>
                    <sales-inquiry></sales-inquiry>
                    <p>The fish don't know if they are in Belize or Mexico, it's all the same water.</p>

                    <p>
                        Our hybrid trip includes both guided and self-guided days in this amazing location. Our exclusive angler
                        support package will save you time and reduce the learning curve while it saves you money.
                    </p>
                    <p>These packages are only available from Hobo Fly Fishing. </p>
                    <p>If you have particular needs or desires, let us know, and we'll build a trip just for you.</p>
                </article>
            </section>
        </div>
    </div>
@stop
