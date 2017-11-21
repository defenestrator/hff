@extends('layouts.master')

@section('title')
    Swains Cay Lodge, Andros Island, Bahamas
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="" alt="" title="">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Swains Cay Lodge - Andros Island, Bahamas
    </h1>
@stop

@section('content')
    <h2>Imagine sitting in the sand,</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p> a cool drink in hand and a gentle breeze blowing that feels like it’s
                        straight from the wings of angels.</p>
                    <p>Sound soothing?</p>
                    <p>Not to us, not when there are schools of bones tailing the flats, and you’re sitting on your ass
                        sipping fruity drinks.</p>
                    <p>Get up, get going, and land one of those massive bones that will stress test your drag and have you
                        praying you’ve got enough backing, or a strong arbor knot if you don’t.</p>
                    <p>Okay, we will be honest, Swain’s Cay Lodge would be pretty nice even if we didn’t fish, but we do,
                        so it’s a moot point.</p>
                    <p>We love big, stout bonefish, and Swain’s is near South Bight and the fabled Middle Bight of Andros
                        Island. Swain’s has the best local guides who know just the spot for the wind and tide conditions.</p>
                    <p>The lodge also has a bonefish flat right off its beach, so if, and we mean if, you happen to have
                        a fruity drink in your hand,you better have a rod rigged nearby because you won’t want to miss a
                        shot at one of those crafty bruisers.</p>
                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <sales-inquiry></sales-inquiry>
                    <p></p>
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