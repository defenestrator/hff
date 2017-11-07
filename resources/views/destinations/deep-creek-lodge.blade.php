@extends('layouts.master')

@section('title')
    Deep Creek Lodge
    @parent
@stop

@section('page_styles')

@stop
@section('top')
    <div style="padding:2em 0;
                background: #1a1a1a url('/images/deep-creek-lodge/stacks-image-9ecda6c.jpg') left center no-repeat;
                background-size:cover; height:80vh;" >
        <h1 style="padding:0 0.5em; text-shadow:4px 4px 4px #000;" class="showcase-header feature-tagline text-center wow pulse" data-wow-duration="0.5s">
            <a id="deep-creek-lodge" title="Deep Creek Lodge, Terrace B.C."></a>Deep Creek Lodge
        </h1>

        <h3 class="feature-tagline text-center">steelhead, salmon and trout</h3>
        <h3 class="feature-tagline text-center">Skeena River at Terrace, British Columbia</h3>
    </div>
@stop
@section('content')
    <h2 class="feature-tagline text-center">Pop Quiz:</h2>
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <section>
                <article class="article">
                    <p>What do fish from B.C.’s world-renowned Bulkley, Babine and Morice rivers have in
                        common? They have to swim up the Skeena River and past Terrace, B.C. to get there.</p>
                    <img src="{{config('filesystems.disks.DO.endpoint')}}/images/deep-creek-lodge/stacks-image-14435c9-1200x594.jpg">
                    <p>Deep Creek Lodge in Terrace gives you a shot at those steelhead and salmon when they are fresh
                        from saltwater and full of piss and vinegar. While it’s common for lodges upstream
                        to charge $8K to $10K a week to fish those famous rivers, you can go for a fraction of
                        that price and catch the same fish.
                    </p>
                    <img src="{{config('filesystems.disks.DO.endpoint')}}/images/deep-creek-lodge/stacks-image-34f32a5-1200x582.jpg">
                    <p>Deep Creek Lodge offers fishing for steelhead, five species of salmon (Chinook, coho, sockeye,
                        chum and humpback) on the Skeena, Copper, Kalum and the Kitimat rivers, as well as trout fishing
                        for cutthroat and Dolly Varden char.
                    </p>
                    <p>
                        With that much opportunity, Deep Creek Lodge offers a long season for anglers.
                    </p>

                </article>
            </section>

        </div>
        <div class="col-md-4 col-md-offset-0">
            <section>
                <article class="article">
                    <p>
                        Accommodations include four double rooms with twin or king size beds, a drying room for wet
                        gear, and a lounge furnished with satellite TV, comfy couch and a fly tying table. All meals
                        are included, which means local seafood and family recipes with Italian flare.
                    </p>
                    <p class="text-center"><strong>This trip is a great deal, and remember, the fish don’t care how much you paid it.</strong></p>
                    <h3 class="text-center"><strong>Ask us for details</strong></h3>
                    <sales-inquiry></sales-inquiry>
                    <p class="text-center"><iframe width="310" height="240" src="https://www.youtube.com/embed/iHd88IChX6U" frameborder="0" allowfullscreen></iframe></p>
                    <img class="logo" src="{{config('filesystems.disks.DO.endpoint')}}/images/deep-creek-lodge/DCL_logo_Site.png">
                </article>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            &nbsp;
        </div>
    </div>
    <h2>&nbsp;</h2>
@stop
