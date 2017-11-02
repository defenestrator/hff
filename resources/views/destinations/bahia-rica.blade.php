@extends('layouts.app')

@section('title')
    Bahia Rica - Costa Rica, Pacific side.
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;" src="/images/bahia-rica/boat-rooster.jpg"
         alt="Letting go of your rooster is almost as much fun as getting a hold of it"
         title="Letting go of your rooster is almost as much fun as getting a hold of it">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Bahia Rica - Costa Rica
    </h1>
@stop

@section('content')
    <h2 class="text-center">&ldquo;Roostah!&rdquo;</h2>
    <h3 class="text-center">Drop the &ldquo;r&rdquo; and say it loud.</h3>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p> You know you want to stand on a beach with a fly rod in your hand and
                        see one of those broad, dark backs patrolling the shoreline.</p>
                    <p>Your reaction is almost primal as you false cast and launch a big fly out toward the cruiser,
                        which suddenly turns into a torpedo bearing down on your fly. You see the splashy collision of
                        fish and fly and feel the line go tight, and that’s when you bellow “Roostah!”</p>
                    <p>You’re standing on a remote shoreline in Costa Rica where there are more monkeys than competing
                        anglers, where you can also get shots at trevally and jacks, and you also  have the option for
                        some offshore fishing for dorado and sailfish.</p>
                    <img src="/images/bahia-rica/bigeye-jack.jpg"
                         alt="'Bigeye Jack' Trevally, they called him." title="'Bigeye Jack' Trevally, they called him.">
                    <p>When you’re not fishing, you’re kicking back in a lodge on a hilltop in a lush jungle
                        (is there any other kind?), but you’re less than 300 yards from the water. Accommodations are
                        casual and friendly where you have the option of cooking for yourself or sharing family style
                        meals with your hosts.</p>
                    <p>There’s also a full fleet of kayaks and paddle boards are available to get you where the fish are.</p>
                    <img src="/images/bahia-rica/sunset.jpg"
                         alt="Fishing kayaks on the beach." title="Fishing kayaks on the beach.">
                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <img src="/images/bahia-rica/rooster-breach.jpg"
                         alt="Rooster crashing the surface." title="Rooster crashing the surface.">
                    <h3 class="text-center">Get on top of this one.</h3>
                    <sales-inquiry></sales-inquiry>
                    <p class="text-center">We at Hobo Fly Fishing are mega-stoked about this trip.</p>
                    <img src="/images/bahia-rica/mahi-mahi.jpg"
                         alt="Mahi mahi, dorado, dolphin, whatever; Awesome." title="Mahi mahi, dorado, dolphin, whatever; Awesome.">
                    <p class="text-center">Let's rap about it!</p>
                    <img src="/images/bahia-rica/rooster-slide.jpg"
                         alt="Rooster in the boat." title="Rooster in the boat.">
                    <img src="/images/bahia-rica/trevally.jpg"
                         alt="Jack in the hand." title="Jack in the hand.">
                    <p>Total radness, if you ask us.</p>
                    <p> And you should.</p>
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