@extends('layouts.master')

@section('title')
    Rio Manso Lodge - Patagonia, Argentina
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="/images/rio-manso-lodge/waterfall.jpg" alt="Pristine Patagonian water." title="Pristine Patagonian water.">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Rio Manso Lodge - Patagonia, Argentina
    </h1>
@stop

@section('content')
    <h2 class="text-center">We admit it. We can be snobby when it comes to trout fishing</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p> Because we live in Idaho where world-class streams are a short drive away. But Rio Manso Lodge
                        made us go “whoa, check that out.”</p>
                    <p>It wasn’t just the trophy rainbows, browns and brook trout, nor the spring creeks with snow-capped
                        Patagonian peaks in the background. It was also the fishing season, which in Argentina runs from
                        the beginning of November until the end of April, opposite of North American trout destinations.</p>
                    <img src="/images/rio-manso-lodge/brownie.jpg"
                         alt="Brown trout love meat." title="Brown trout love meat.">
                    <p>In fact, if you want summer fishing, it’s January through March in Argentina.
                        (Yeah, it hurts wrapping our heads around that, too)</p>
                    <p>This is a full-blown, trout-fishing lodge experience with the big meals and fine spirits for which
                        Argentina is famous, which you will need after a day of fishing with this crew.</p>
                    <img src="/images/rio-manso-lodge/lodge.jpg"
                         alt="Rio Manso? More like Rio Mansion, right?" title="Rio Manso? More like Rio Mansion, right?">
                    <p>They boast nine to 10-hour days on the water pursuing fish, so there’s no confusion where
                        their priorities lie. Whether you’re casting a speck-sized dry fly or a bird-sized streamer,
                        there’s a slab-sided trout lurking and waiting to do battle with you.</p>
                    <p>And about now you should be saying “yeah, bring it on.”</p>

                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <img src="/images/rio-manso-lodge/patagonian-brookie.jpg" alt="Patagonia has big Brookies!" title="Patagonia has big Brookies!">                                    <h3 class="text-center">Winter is coming</h3>
                    <h4 class="text-center">Book this trip and keep on fishing.</h4>
                    <sales-inquiry></sales-inquiry>
                    <img src="/images/rio-manso-lodge/release.jpg"
                         alt="Happy rainbow getting released" title="Happy rainbow getting released">
                    <img src="/images/rio-manso-lodge/emerald-water.jpg"
                         alt="Emerald waters" title="Emerald waters">
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