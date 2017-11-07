@extends('layouts.master')

@section('title')
    True Blue Bonefish - Exmouth, Western Australia
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="{{config('filesystems.disks.DO.endpoint')}}/images/true-blue-bonefish/gt.jpg"
         alt="That is not a bonefish! That's a GT!" title="That is not a bonefish! That's a GT!">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        True Blue Bonefish - Exmouth, Western Australia
    </h1>
@stop

@section('content')
    <h2 class="text-center">“omg can u believe those fish, wtf?! when r we going?”</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>A few places (OK, more than a few) make us sound like teenagers texting when describing them,
                        and Exmouth, Australia is one of them.</p>
                    <p>Not only is it the fish-porn sized bonefish, it’s the too-weird-to-be-true fish like barramundi,
                        spangled emperors and blue bastards (seriously, that’s what they’re called. LOL!)</p>
                    <img style="width:100%;"  src="{{config('filesystems.disks.DO.endpoint')}}/images/true-blue-bonefish/queenfish.jpg"
                         alt="Queenfish or queen fish? Whatever, it looks awesome"
                         title="Queenfish or queen fish? Whatever, it looks awesome">
                    <p>Exmouth has the world-class bones and its own permit species, as well as some fly-tackle busting
                        bruisers like golden trevally, queen fish and heavyweight-champ giant trevally.</p>
                    <img style="width:100%;"  src="{{config('filesystems.disks.DO.endpoint')}}/images/true-blue-bonefish/hello-there.jpg"
                         alt="Golden Trevally, mate!"
                         title="Golden Trevally, mate!">
                    <p>We have no problem saying Exmouth is a bucket-list destination. We don’t call any place a “once in a lifetime” trip
                        because we always want to go back, but this is certainly a trip we don’t want to go a lifetime without fishing.
                        When it’s time to go, book a Hobo Fly trip with True Blue Bones. They’ve established themselves as the
                        authority on flyfishing there, and we have a great partnership with them.</p>
                    <img style="width:100%;"  src="{{config('filesystems.disks.DO.endpoint')}}/images/true-blue-bonefish/beauty-bone.jpg"
                         alt="Crappy photo of an ugly dumb fish; NOT!" title="Crappy photo of an ugly dumb fish; NOT!">

                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <h3 class="text-center">Fish on like Donkey Kong!</h3>
                    <img style="width:100%;"  src="{{config('filesystems.disks.DO.endpoint')}}/images/true-blue-bonefish/fish-on-like-donkey-kong.jpg"
                         alt="Fish on like Donkey Kong" title="Fish on like Donkey Kong!">
                    <h3 class="text-center">Honestly, </h3>
                    <p class="text-center">if you aren't already geeked on this,</p>
                    <p class="text-center">we can't help you.</p>
                    <sales-inquiry></sales-inquiry>
                    <p>Hit us up for details when you are ready for something beyond spectacular.</p>
                    <img style="width:100%;"  src="{{config('filesystems.disks.DO.endpoint')}}/images/true-blue-bonefish/tiny-permit.jpg"
                         alt="Tiny Australian Permit" title="Tiny Australian Permit">
                    <p class="text-center">Permit on fleek</p>
                    <hr>
                    <img style="width:100%;"  src="{{config('filesystems.disks.DO.endpoint')}}/images/true-blue-bonefish/lady-and-a-leap.jpg"
                         alt="Queenfish jumping, u go grrrl!" title="Queenfish jumping, u go grrrl!">
                    <p class="text-center">Airborne Queenfish, u go grrrl!</p>
                    <hr>
                    <img style="width:100%;"  src="{{config('filesystems.disks.DO.endpoint')}}/images/true-blue-bonefish/tiny-cobia.jpg"
                         alt="Tiny Cobia, seriously, they get huge." title="Tiny Cobia, seriously, they get huge.">
                    <p class="text-center">Tiny Cobia, seriously, they get huge.</p>
                    <hr>
                    <img style="width:100%;"  src="{{config('filesystems.disks.DO.endpoint')}}/images/true-blue-bonefish/boner.jpg"
                         alt="Almost forgot about the bonefish." title="Almost forgot about the bonefish.">
                    <hr>
                    <p>We got so excited, we almost forgot about the bonefish.</p>
                </article>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <p class="text-center">Ningaloo reef fly fishing is totes cray.</p>
        </div>
    </div>
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
@stop