@extends('layouts.app')

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

        <h3 class="feature-tagline text-center">Steelhead, Salmon and Trout</h3>
        <h3 class="feature-tagline text-center">Skeena River at Terrace, British Columbia</h3>
    </div>
@stop
@section('content')
    <h2 class="feature-tagline text-center">Pacific Northwest Luxury</h2>
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <section>
                <article class="article">
                    <p>You have probably heard of the Skeena before, the North Coast of British Columbia has some of the
                        best pacific salmonid fishing there is. Terrace is a gorgeous town, and the number of fishing
                        opportunities available for day excursions is startling! One tip we will give away; The best fishing is often
                        in the numerous smaller streams that feed into the Skeena system.</p>
                    <img src="../images/deep-creek-lodge/stacks-image-14435c9-1200x594.jpg">
                    <p>Our self-guided package at Deep Creek
                        Lodge is affordable, the fishing is stellar, and the lodge itself is idyllic. Chase the northwestern
                        fishing adventure of a lifetime during the day, then relax with a warm meal in the downright comfy Deep Creek Lodge.
                    </p>
                    <img src="../images/deep-creek-lodge/stacks-image-34f32a5-1200x582.jpg">
                </article>
            </section>

        </div>
        <div class="col-md-4 col-md-offset-0">
            <section>
                <article class="article">
                    <p class="text-center"><strong>The price is too good to publish</strong></p>
                    <h3 class="text-center"><strong>Ask us for details</strong></h3>
                    <sales-inquiry></sales-inquiry>
                    <p class="text-center"><iframe width="310" height="240" src="https://www.youtube.com/embed/iHd88IChX6U" frameborder="0" allowfullscreen></iframe></p>
                    <img src="../images/deep-creek-lodge/DCL_logo_Site.png">
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
