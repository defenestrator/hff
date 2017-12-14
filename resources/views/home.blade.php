@extends('layouts.master')

@section('title')
    Hobo Fly Fishing | Have Rod, Will Travel
    @parent
@stop

@section('page_styles')
    <style>
        .map-container {
            width: 500px;
            height: 300px;
        }
    </style>
@stop

@section('top')
    <div class="tagline text-center">
        <h1 style="font-weight:600;" class="wow pulse" data-wow-duration="0.7s">
            Fly Fishing Adventure Travel
        </h1>
        <h2 style="font-weight:600;">
            Elite Destinations, Local Flavor
        </h2>
    </div>
    <div style="margin:22px;" class="text-center">
        <h2 style="color:#262626; margin:10px; font-weight: 600;">Once in a lifetime trip, or a lifetime of trips?</h2>
        <h2 style="color:#262626; font-weight: 600; font-size:36px; margin:10px 10px 20px 10px; ">
            <span style="margin-right:-7px;">H</span><img style=" margin:0; padding-bottom:8px;" src="/images/authenticated_hobo.png" title="Hobo fly fishing has the answer"><span style="margin-left:-5px;">bo Fly Fishing has the answer</span></h2>
    </div>

@stop
@section('content')
    @foreach(array_chunk($showcases->all(), 2) as $showcaseRow)
        <div class="row">
            @foreach($showcaseRow as $showcase)
                <div style="margin:9px 0;" class="col-md-6 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 info">
                    <a href="/showcases/{{ $showcase->slug}}" title="{{$showcase->title}}">
                        <div class="thumbnail"
                             style="background: linear-gradient(rgba(0,0,0, 0.2),rgba(0,0,0, 0.2)), url('{{$showcase->thumbnail}}') no-repeat; background-size:cover;">
                            <div class="caption">
                                <h3 style="font-weight:600;">{{$showcase->homepage_top}}</h3>
                                <h3 style="font-weight:600;">{{$showcase->homepage_bottom}}</h3>
                            </div>
                            @if($showcase->special)
                                <button role="button" style="box-shadow: 2px 2px 2px #000; margin:0 15%; width:70%;" class="btn btn-warning">
                                    <i data-name="question" data-size="16" data-loop="true" data-c="#fff"
                                       data-hc="#F0F8FF" class="livicon" style="width: 16px; height: 16px;"></i>
                                    <span>Learn More</span>
                                </button>
                            @endif
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
    <div class="row">
        <div class="container"><h2>Latest Blog Posts</h2></div>
        @foreach($posts as $post)
            <div class="col-sm-4">
            <div class="post">
                <div class="latest-posts">
                    <h2 class="primary"><a href="/publications/posts/{{$post->slug}}">{{$post->title}}</a></h2>
                    <a href="/publications/posts/{{$post->slug}}">
                    <div class="latest-posts-image"
                         style="background:url('{{$post->header_photo}}') no-repeat; background-size:cover;">
                    </div>
                    </a>
                    <br>
                    <article>
                        <a style="color:rgb(83, 89, 101);" href="/publications/posts/{{$post->slug}}">
                            <strong>{!! $post->sentence !!}</strong>
                        </a>
                    </article>
                    <br>
                    <p>
                        <span class="text-right">
                            <a href="/publications/posts/{{ $post->slug }}"> <button class="btn btn-primary">Read More</button></a>
                        </span>&nbsp;&nbsp;
                    </p>
                    <p class="additional-post-wrap">
                            <span class="taglinks">Tags:
                                @forelse($post->tags as $tag)
                                    <a href="{{ URL::to('posts/'. $tag->normalized .'/tag') }}">{{ $tag->name }}</a>,
                                @empty
                                    No Tags
                                @endforelse
                            </span>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Service Section Start-->
    <div class="row">
        <div class="col-sm-6 col-md-4 wow bounceInLeft" data-wow-duration="0.5s">
            <div class="box">
                <div class="box-icon">
                    <img src="/images/go.png" title="go"/>
                </div>
                <div class="info">
                    <h3 class="text-center">Self-Guided Adventures</h3>
                    <p>Find some quiet places, and some uneducated fish. If you love to challenge yourself, and expand
                        your understanding of what this great sport has to offer,
                        these trips are for you.
                    </p>
                    <p>Self-guided fly fishing has a significant learning curve, we can help you shorten it.
                    </p>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 wow bounceInDown" data-wow-duration="0.5s" data-wow-delay="0.1s">
            <div class="box">
                <div class="box-icon">
                    <img src="/images/very-good.png" title="very good"/>
                </div>
                <div class="info">
                    <h3 class="text-center">Full Service Expeditions</h3>
                    <p>When you want the finest angling vacation experience check out our carefully curated full-service
                        lodges and resorts.</p>
                    <p> These are often fun family getaways, as they typically offer activities for the non-angling
                        members of the group, in addition to the great fishing!</p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 wow bounceInRight" data-wow-duration="0.5s" data-wow-delay="0.2s">
            <div class="box">
                <div class="box-icon">
                    <img src="/images/safe-camp.png" title="safe camp"/>
                </div>
                <div class="info">
                    <h3 class="text-center">Hybrid Fly Fishing Trips</h3>
                    <p>
                        After fishing with local guides to get your feet wet, spend a few days exploring local
                        fisheries with your buddies, and our help.
                    </p>
                    <p>
                        Hybrid trips are a signature service of Hobo Fly Fishing, we expect them to sell fast,
                        ask for more details.
                        We also build custom fly fishing travel packages as needed.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-0 col-sm-8 col-sm-offset-0">
            <article>
                <section>
                    <h4>We provide personalized value for all destinations we list.</h4>
                    <p>
                    <ul style="list-style-type:circle">
                        <li>Solid support after the sale</li>
                        <li>Timely angling intelligence </li>
                        <li>Travel strategies for the real world, so you don't get stuck in a bad spot.</li>
                        <li>Custom offline maps. Find your way around with no network connection.</li>
                        <li>Specialized fly patterns designed by local wizards. </li>
                        <li>Comprehensive packing checklists.
                            <ul style="list-style-type:square">
                                <li class="small">Not just angling gear, everything you will need to make your trip comfortable, predictable and awesome.</li>
                            </ul>
                        </li>
                        <li>
                            <a href="https://hoboflyfishing.com/publications/posts/we-learned-the-hard-way-so-you-don-t-have-to"
                               title="We learned the hard way so you don't have to">
                                Learn from Our Mistakes</a>.&trade;
                            We've made a few, maybe.
                        </li>
                        <li>Surprises, merchandise and promo items.</li>
                        <li>Slightly less bullshit than you may be used to.</li>
                    </ul>
                    </p>

                </section>
            </article>
        </div>


        <div class="col-md-5 col-md-offset-1 col-sm-4 col-sm-offset-0">
            <article class="article">
                <section>
                    <h4>We will never have a hundred names on our "Pro Staff." We don't want them.
                    </h4>
                    <p>
                        90% are meaningless headshots next to the name of some random clown they met at the bar.
                    </p>

                    <img src="/images/bully.jpg" style="border-radius:6px; margin-top:10px;;"
                         alt="Yeah, well, that's just, like, your opinion, man."
                         title="Yeah, well, that's just, like, your opinion, man.">
                </section>
            </article>
        </div>
    </div>
@stop
@section('bottom')
    <div class="col-md-12 col-md-offset-0">
        &nbsp;
    </div>
    <br>
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
@stop
