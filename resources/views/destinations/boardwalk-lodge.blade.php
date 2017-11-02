@extends('layouts.app')

@section('title')
    Boardwalk Lodge Alaska
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;" src="/images/boardwalk-lodge/beast.jpg"
         alt="Thick steelhead in hand" title="Thick steelhead in hand">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Boardwalk Lodge Alaska
    </h1>
@stop

@section('content')
    <h2 class="text-center">When many fly anglers think of Alaska, their imaginations tend to flow toward salmon and trophy
        trout fishing,</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p> but what often gets overlooked is the state’s great steelhead fishing.</p>
                    <p>That’s partially because steelhead tend to be found in fewer Alaskan rivers than the ubiquitous
                        salmon runs, fortunately, they’re within striking distance of Boardwalk Lodge on Prince of
                        Wales Island, about 35 minutes from Ketchikan in Southeast Alaska.</p>
                    <img src="/images/boardwalk-lodge/grinnin.jpg"
                         alt="Grinning big, wouldn't you be?" title="Grinning big, wouldn't you be?">
                    <p>And these aren’t just any steelhead. These are big, native fish weighing double digits, and you
                        will be hooking them fresh from saltwater. Along with chrome steel, there’s dolly varden and
                        cutthroat trout. And yeah, there are salmon, too, including silvers, sockeye, chums and pinks,
                        all of which you can catch on the fly.</p>
                    <p>The two guest lodges sit on 26 acres of ocean-front property overlooking a solitary tidal inlet.
                        The rustically elegant lodges comfortably accommodate up to 19 guests. Relax in a hot tub at the
                        end of your fishing day, and dine on fresh, locally caught seafood, or meat-eater faves like
                        prime rib and pork loin.</p>
                    <img style="width:100%;"  src="/images/boardwalk-lodge/gillplate.jpg"
                         alt="Lovely gill plate on a fresh steelie" title="Lovely gill plate on a fresh steelie">
                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <img src="/images/boardwalk-lodge/net.jpg"
                         alt="Completion" title="Completion">
                    <p class="text-center">When you are pumped enough to pull the trigger,</p>
                    <p class="text-center">or just to have a chat about it.</p>
                    <h3 class="text-center">Write, call, or just send us your email address.</h3>
                    <sales-inquiry></sales-inquiry>
                    <p class="text-center">We will respond promptly.</p>
                    <img style="width:100%;"  src="/images/boardwalk-lodge/slab.jpg"
                         alt="Slably" title="Slably">
                    <p class="text-center">Those big smiles tell the story better than we ever could.</p>
                    <img style="width:100%;"  src="/images/boardwalk-lodge/runnin.jpg"
                         alt="Tight line, with some heavy weight behind it" title="Tight line, with some heavy weight behind it">

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