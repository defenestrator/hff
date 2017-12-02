@extends('layouts.master')

@section('title')
    Hobo Fly Fishing | Have Rod, Will Travel
    @parent
@stop

@section('page_styles')
@stop

@section('top')
    <div class="tagline text-center">
        <h1 style="font-weight:600;" class="bg-border wow pulse" data-wow-duration="0.7s">
            Fly Fishing Adventure Travel
        </h1>
        <h2 style="font-weight:600;">
            Elite Destinations, Local Flavor
        </h2>
    </div>
    <div class="text-center">
        <h3 style="margin:5px 10px;">Once in a lifetime trip, or a lifetime of trips?</h3>
        <h2 style="margin:5px 10px;">We have the answer; </h2>
        <h3 style="margin:5px 10px;">We will find trips to match your budget​</h3>
    </div>
@stop
@section('content')
    <!-- Listings Section Start -->
    @foreach(array_chunk($showcases->all(), 2) as $showcaseRow)
        <div class="row">
            @foreach($showcaseRow as $showcase)
                <div class="col-md-6 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 info">
                    <a href="/showcases/{{ $showcase->slug}}" title="{{$showcase->title}}">
                        <div class="thumbnail"
                             style="background-image: url('{{$showcase->thumbnail}}');
                                     background-position: center center;">
                            <div class="caption">
                                <h3 style="font-weight:600;">{{$showcase->fishery_type}}</h3>
                                <h3 style="font-weight:600;">{{$showcase->region}}</h3>
                            </div>
                            @if($showcase->special)
                            <a href="tel:2088599133">
                                <button role="button" style=" margin:0 15%; width:70%; z-index:99;" class="btn btn-primary">
                                    <i data-name="phone" data-size="20" data-loop="true" data-c="#fff"
                                       data-hc="#F0F8FF" class="livicon icon4 icon3" style="width: 20px; height: 20px;"></i>
                                    call now!
                                </button>
                            </a>
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
            <div class="col-md-4">
            <div class="post">
                <div style="height:550px;overflow:hidden;">
                    <h2 class="primary"><a href="/publications/posts/{{$post->slug}}">{{$post->title}}</a></h2>
                    <a href="/publications/posts/{{$post->slug}}">
                    <div style="overflow:hidden; height: 150px; background-image:url('{{$post->header_photo}}'); background-size:contain; background-repeat:no-repeat">
                    </div>
                    </a>
                    <br>
                    <article>
                        <a style="color:rgb(83, 89, 101);" href="/publications/posts/{{$post->slug}}">
                            {!! str_limit(strip_tags($post->body), 200, '...') !!}
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
                    <i class="livicon diy-icon" data-name="anchor" data-size="55" data-c="#3f844e" data-hc="#3f844e"></i>
                </div>
                <div class="info">
                    <h3 class="success text-center">Self-Guided Adventures</h3>
                    <p>Find some quiet places, and some uneducated fish. If you love to challenge yourself, and expand your understanding of what this great sport has to offer,
                        these trips are for you.
                    </p>
                    <p>Self-guided fly fishing has a significant learning curve, we can help you shorten it.
                    </p>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 wow bounceInDown" data-wow-duration="0.5s" data-wow-delay="0.1s">
            <!-- Box Start -->
            <div class="box">
                <div class="box-icon box-icon1">
                    <i class="livicon icon1" data-name="paper-plane" data-size="55" data-c="#128BC6" data-hc="#128BC6"></i>
                </div>
                <div class="info">
                    <h3 class="primary text-center">Hybrid Trips</h3>
                    <p>
                        After fishing with local guides to get your feet wet, spend a few days exploring the local fisheries with your buddies, and our help.
                    </p>
                    <p>
                        Hybrid trips are a signature service of Hobo Fly Fishing, we expect them to sell fast, ask for more details.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 wow bounceInRight" data-wow-duration="0.5s" data-wow-delay="0.2s">
            <div class="box">
                <div class="box-icon box-icon2">
                    <i class="livicon icon1" data-name="rocket" data-size="55" data-c="#f89a14" data-hc="#f89a14"></i>
                </div>
                <div class="info">
                    <h3 class="warning text-center">Full Service Expeditions</h3>
                    <p>When you want the finest angling vacation experience check out our carefully curated full-service
                        lodges and resorts.</p>
                    <p> These are often fun family getaways, as they typically offer activities for the non-angling
                        members of the group, in addition to the great fishing!</p>
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
        <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-0">
            <article class="article">

                <section>
                    <p>We will never have a hundred names on our "Pro Staff." We don't want them.
                    </p>
                    <p>
                        90% are meaningless headshots next to the name of some random clown they met at the bar.
                    </p>
                    <img src="/images/the-dude-1.jpg" style="border-radius:1em;"
                         alt="Yeah, well, that's just, like, your opinion, man."
                         title="Yeah, well, that's just, like, your opinion, man."
                    >
                </section>

            </article>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            &nbsp;
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
