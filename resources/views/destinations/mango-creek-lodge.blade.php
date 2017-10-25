@extends('layouts.app')

@section('title')
    Mango Creek Lodge
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;" src="{{asset('images/mango-creek-lodge/mango-creek-lodge-cabanas.jpg')}}"
         alt="Floating Cabanas at Mango Creek Lodge" title="Floating Cabanas at Mango Creek Lodge">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Mango Creek Lodge
    </h1>
@stop

@section('content')
    <h2 class="text-center">What’s better than a cabana with a hammock after a hard day of fishing?</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>How about a <em>floating</em> cabana with a hammock?</p>
                    <p>Yeah, maybe we’re fixated on Mango Creek Lodge for the wrong reasons, but dude, look at those cabanas, with hammocks, floating on the freakin’ water!</p>
                    <img src="{{asset('images/mango-creek-lodge/baby-tarpon.jpg')}}"
                         alt="Tarpon on the fly" title="Tarpon on the fly">
                    <p>Never doubt our real intent is to get you into fish, and fish there are, including the big dogs
                        of the salt flats: bonefish, permit and tarpon. But, because we don’t look down our noses at
                        other cool fish; there’s also fishing for jacks, barracuda, snappers, grouper, and queen triggerfish.</p>
                    <img src="{{asset('images/gourley/trigger.jpg')}}"
                         alt="Trigger fish are super-fun to catch" title="Trigger fish are super-fun to catch!">
                    <p>Much of the fishing at Mango Creek Lodge is done by wading, and you can access the flats by panga or kayak.
                        In fact, you can roll out of your hammock, climb into a kayak and be fishing the flats in minutes.</p>
                    <p>If you’re into that kind of thing, and we know you are.</p>

                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article text-center">
                    <img style="width:50%;" class="logo" src="{{asset('images/mango-creek-lodge/mango-creek-lodge-logo.png')}}"
                         alt="Mango Creek Lodge" title="Mango Creek Lodge">
                    <h3>Find out more</h3>
                    <h4>Drop us a line, we'll hook you up.</h4>
                    <h5>( so to speak )</h5>
                    <sales-inquiry></sales-inquiry>
                    <p>You can even rollcast off the dock.</p>
                    <img src="{{asset('images/mango-creek-lodge/rollcast.jpg')}}"
                        alt="Rollcast off the dock" title="Rollcast off the dock">
                    <p>You might get a shot at a few of these fickle bastards.</p>
                    <img src="{{asset('images/mango-creek-lodge/permit.jpg')}}"
                         alt="Black-finned devils" title="Black-finned devils">
                    <p>And a bunch of these squirrelly kids.</p>
                    <img src="{{asset('images/mango-creek-lodge/tarpon.jpg')}}"
                         alt="Elementary School Tarpon" title="Elementary School Tarpon">
                    <p>This lodge is listed under "Belize Area," because technically it's in Honduras. But the fish don't know that.</p>
                    <p>The reef system they live in is the same one that makes Belize the Hollywood of flats fishing.</p>
                    <img src="{{asset('images/mango-creek-lodge/interior.jpg')}}"
                         alt="The inside is pretty chill, too." title="The inside is pretty chill, too.">
                </article>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <img style="width:100%;" src="{{asset('images/mango-creek-lodge/kayak-getting-ready.jpg')}}"
                 alt="Hop in the kayak and fish!" title="Hop in the kayak and fish!">
        </div>
    </div>
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
    @stop