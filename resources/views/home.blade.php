@extends('layouts.master')

@section('title')
    Hobo Fly Fishing | Elite Destinations, Local Flavor
    @parent
@stop

@section('page_styles')
@stop

@section('top')
    <div class="tagline text-center" style="padding:8em 0; background-image:url('https://hobo-assets.s3-us-west-2.amazonaws.com/images/closeup-bone.jpg'); background-position:right center; background-size:cover;">
        <h1 style="text-shadow:#000 1px 1px 3px; font-weight:600;">
            Fly Fish Planet Earth
        </h1>
        <h2 style="text-shadow:#000 1px 1px 3px;  font-weight:600;">
            Elite Destinations, Local Flavor
        </h2>
    </div>
    <div class="text-center">
        <h3 style="margin:10px; font-weight: 600;">Once in a lifetime trip, or a lifetime of trips?</h3>
        <h3 style="margin:10px; font-weight: 600;">We have the answer.</h3>
    </div>
@stop

@section('content')
    <div class="col-md-6 col-md-offset-3">
        @include('sales-inquiry')
    </div>
    @foreach(array_chunk(array_slice($showcases->all(), 0, 6), 2) as $showcaseRow)
        <div class="row">
            @foreach($showcaseRow as $showcase)
                <div style="margin:20px 0; padding-left:30px; padding-right:30px;" class="col-md-6 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 info">
                    <a href="/showcases/{{ $showcase->slug}}" title="{{$showcase->title}}">
                        <div class="thumbnail"
                             style="background: linear-gradient(rgba(0,0,0, 0.25),rgba(0,0,0, 0.25)), url('{{$showcase->thumbnail}}') no-repeat; background-size:cover;">
                            <div class="caption">
                                <h3 style="font-weight:600;">{{$showcase->homepage_top}}</h3>
                                <h3 class="hidden-sm hidden-md hidden-lg" style="font-weight:600;">{{$showcase->homepage_bottom}}</h3>
                            </div>
                            @if($showcase->special)
                                <button role="button" style="box-shadow: 2px 2px 2px #000; margin:0 15%; width:70%;" class="btn btn-warning">
                                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
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
        <div style="margin:9px 0; padding-bottom:24px; border-bottom:2px solid #c5c7ca;" class="text-center col-md-12">
            <div class="col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                <newsletter-signup />
                <br>
            </div>
            <a style="width:100%;" href="/showcases"><button class="btn btn-danger" style="width:100%; font-size:24px;">See All Destinations</button></a>
            <br>
        </div>
    </div>

    <div class="row">
        <h2 class="text-center" style="font-size:40px; font-weight:bold;"><a href="/publications/posts">HOBO BLOG</a></h2>
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
        <div class="col-sm-6 col-md-4">
            <div class="box">
                <div class="box-icon">
                    <img src="{{Storage::disk('s3')->url('images')}}/go.png" title="go"/>
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
        <div class="col-sm-6 col-md-4">
            <div class="box">
                <div class="box-icon">
                    <img src="{{Storage::disk('s3')->url('images')}}/very-good.png" title="very good"/>
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
        <div class="col-sm-12 col-md-4">
            <div class="box">
                <div class="box-icon">
                    <img src="{{Storage::disk('s3')->url('images')}}/safe-camp.png" title="safe camp"/>
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
                                Learn from Our Mistakes</a>.
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

                    <img src="{{Storage::disk('s3')->url('images')}}/bullymd.jpg" style="border-radius:6px; margin-top:10px;;"
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

@section('page_scripts')
@stop
