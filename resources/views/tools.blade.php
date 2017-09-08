@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Hatchmaster!
    @parent
@stop
{{-- content --}}
@section('content')
    <div class="container">
        {{--<div class="row">--}}
            {{--<div class="col-md-12 col-md-offset-0" style="padding-top:25px;">--}}
                    {{--<ul class="nav nav-tabs" style="border-bottom:none;">--}}
                        {{--<li class="active"><a href="#latest" data-toggle="tab">Latest</a></li>--}}
                        {{--<li><a href="#fish" data-toggle="tab">Fish</a>--}}
                        {{--</li>--}}
                        {{--<li><a href="#fisheries" data-toggle="tab">Fisheries</a>--}}
                        {{--</li>--}}
                        {{--<li><a href="#hatches" data-toggle="tab">Hatches</a>--}}
                        {{--</li>--}}
                        {{--<li><a href="#flies" data-toggle="tab">Flies</a>--}}
                        {{--</li>--}}
                        {{--<li><a href="#flyboxes" data-toggle="tab">Fly Boxes</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--<div class="panel with-nav-tabs panel-default panel-body">--}}
                    {{--<div class="tab-content">--}}
                        {{--<div class="tab-pane fade in out active" id="latest">--}}
                            {{--<article class="article">--}}
                                {{--<h2>Latest Posts:</h2>--}}

                                {{--<p>The most recent content additions</p>--}}
                            {{--</article>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane fade in out" id="fish">--}}
                            {{--<article class="article">--}}
                                {{--<h2>New Fish Species:</h2>--}}

                                {{--<p>Add a fish!</p>--}}
                            {{--</article>--}}
                            {{--<article class="article">--}}
                                {{--<h2>Edit Fish Species:</h2>--}}

                                {{--<p>--}}
                                    {{--<em><strong>from the list below</strong></em>--}}
                                {{--</p>--}}
                            {{--</article>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane fade in out" id="fisheries">--}}
                            {{--<article class="article">--}}
                                {{--<h2>New Fishery:</h2>--}}

                                {{--<p>Add a fishery!</p>--}}
                            {{--</article>--}}
                            {{--<article class="article">--}}
                                {{--<h2>Edit Fisheries:</h2>--}}

                                {{--<p>--}}
                                    {{--<em><strong>from the list below</strong></em>--}}
                                {{--</p>--}}
                            {{--</article>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane fade in out" id="hatches">--}}
                            {{--<article class="article">--}}
                                {{--<h2>New Hatch:</h2>--}}

                                {{--<p>Add a hatch!</p>--}}
                            {{--</article>--}}
                            {{--<article class="article">--}}
                                {{--<h2>Edit Hatches:</h2>--}}

                                {{--<p>--}}
                                    {{--<em><strong>from the list below</strong></em>--}}
                                {{--</p>--}}
                            {{--</article>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane fade in out" id="flies">--}}
                            {{--<article class="article">--}}
                                {{--<h2>New Fly Pattern:</h2>--}}

                                {{--<p>Add a fly pattern.</p>--}}
                            {{--</article>--}}
                            {{--<article class="article">--}}
                                {{--<h2>Edit Fly Patterns:</h2>--}}

                                {{--<p>--}}
                                    {{--<em><strong>from the list below</strong></em>--}}
                                {{--</p>--}}
                            {{--</article>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane fade in out" id="flyboxes">--}}
                            {{--<article class="article">--}}
                                {{--<h2>Build a New Fly Box:</h2>--}}

                                {{--<p>Add a fly box.</p>--}}
                            {{--</article>--}}
                            {{--<article class="article">--}}
                                {{--<h2>Edit Fly Boxes:</h2>--}}

                                {{--<p>--}}
                                    {{--<em><strong>from the list below</strong></em>--}}
                                {{--</p>--}}
                            {{--</article>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            &nbsp;
            </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Announcement</div>
                    <div class="panel-body">
                        <article class="article">

                            <h2>Hobo Fly Fishing App: official release in Q4 2017</h2>

                            <h3><em>The</em> premium app for hardcore fly anglers</h3>

                            <h3>Cultivate knowledge.</h3>

                            <p>There is a lot of mythology in the sport of fly fishing. A lot of it is considered
                                <em>accepted wisdom</em>, but there is very little
                                crunch-able data available. We are building a data collection and reporting service for
                                fly fishers who want facts, not fables. Take
                                control of your fly fishing and catch more fish!</p>

                        </article>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Our App Does Stuff Like...</div>
                    <div class="panel-body">
                        <article class="article">
                            <h2>Fly Fishing Tools </h2>
                            <h4>For your mobile devices</h4>
                            <p>Use real data, not unreliable memories, to improve your success on the water.</p>
                            <p>Track your success on-stream with offline fisheries maps and
                                automatically correlate GPS information with weather, hydrology, hatch activity, and
                                other custom data that you and others collect <em>without interrupting your cast.</em>
                                Keep it a secret, share with a few buddies, or share it with the world. It is up to you.</p>

                            <p>Shoot some video of your buddy catching a mean fish deep in the backcountry
                                and we can have it posted to your private fly fishing journal
                                before you get home. Stuff like that, we're working on it now.</p>
                        </article>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Get Real</div>
                    <div class="panel-body">
                        <article class="article">
                            <h2>We will never...</h2>
                            <p>...have a hundred names on our <strong>"Pro Staff."</strong>
                            </p>
                            <h3>We don't want them.
                            </h3>
                            <p>
                                90% are meaningless headshots next to the name of some random clown they met at the bar.

                            </p>
                            <p>This is not how we roll, dude.
                            </p>
                                <img src="{{asset('assets/images/the-dude-1.jpg') }}"
                                     alt="Yeah, well, that's just, like, your opinion, man."
                                     title="Yeah, well, that's just, like, your opinion, man."
                                >
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <section class="jumbotron">
                    <h2>Here's the deal</h2>
                    <article class="article">
                        <h3>This should be fun</h3>

                        <p>Don't be fooled by the goofy 'free advice' some other places claim to give away.
                            You know there's no free lunch and, like us, you are probably tired of sporty slick
                            salesman lying to you. We make a couple bucks when we book a trip,
                            and we earn it by providing you better tools and sharp intelligence for all
                            the destinations we list.
                        </p>
                        <div class="container">
                            <img src="{{ asset('assets/images/gourley/20150712_082521.png') }}"
                             alt="This guy knows what he is doing."
                             title="This guy knows what he is doing." >
                        </div>
                        <h4>Learn the terrain.</h4>
                        <p>We can give you a little help getting started on new water, no guide required.
                            If you are the type who likes to cut trail and learn the quirks of a fishery by
                            exploring with your buddies, give us a jingle and we'll get you on the right track.
                        </p>
                    </article>
                </section>
            </div>
        </div>
    </div>
@stop
