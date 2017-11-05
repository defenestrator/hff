@extends('layouts.app')

@section('title')
Bahia Honda Sporting Club
    @parent
@stop

@section('page_styles')

@stop

@section('top')
    <img style="width:100%;"  src="" alt="" title="">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        Bahia Honda Sporting Club
    </h1>
@stop

@section('content')
    <h2>Coming soon...</h2>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <p>So you want to bow to the great Silver King in the Florida Keys ?</p>
                    <p>Do you know a fly fishing savvy captain that lives and fishes the tarpon-rich waters surrounding
                        the Florida Keys that is not booked out years in advance?</p>
                    <p>Do you want to pay for one of the dozens and dozens of trout fishing guides from Montana,
                        Idaho and Utah that show up in the keys each year with a captain’s licence and a skiff, for just
                        a few short months, to become famous and take advantage of the tarpon and angler population
                        boom? Wouldn't you rather have a guide who lives and breathes the salt air of the Keys?</p>
                    <p>Tarpon fly fishing can be taxing to the mind and body. If you are brand new to the tarpon game
                        you will show up full of piss and vinegar, after everything you have read and seen on the internet
                        prior to your trip. Regardless of your amped-up tarpon lust, finding a quality Keys captain,
                        a place to stay, and a place to eat can take a lot of energy away from your fishing. It will make a 24 hour day
                        seem like a 72 hour struggle, when all is said and done.</p>
                    <p>The only Keys lodge offering this full service package is Bahia Honda Sporting Club. They have a
                        great reputation in fulfilling that tarpon dream and everything else besides the fishing. Their
                        captains take care of the tarpon, and local legend Chef Bill takes care of the rest</p>
                </article>
            </section>

        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <p class="text-center">Bahia Honda Sporting Club has a reputation second to none in providing outstanding opportunities
                        for tarpon and other flats fish like permit, bonefish and barracuda. </p>
                    <sales-inquiry></sales-inquiry>
                    <p class="text-center">Book with us early as this
                        fishery has a short window of only 11 weeks each year.</p>
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