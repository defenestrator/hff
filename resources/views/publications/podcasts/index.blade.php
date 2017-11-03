@extends('layouts.app')

{{-- Page title --}}
@section('title')
    Podcasts
    @parent
@stop

@section('page_styles')
@stop

@section('top')
@stop

@section('content')
    <div class="row">
        <div class="content">
            <div class="col-md-8 col-md-offset-2">

                <h2><a id="Before_the_internet"></a>Before the internet</h2>
                <p>and its legions of wannabe fly fishing legends, before $1,200 graphite rods, $700 reels,
                    $100 lines and $15 leaders, before $300 polarized fashion sunglasses, before cell phones, before blogs,
                    Go Pros, fly fishing videos, pro staffers and the fly fishing industry's official uniform of technical wear,
                    there was a man in blue jeans and a work shirt with a fiberglass fly rod discovering a new world
                    ...the new world of fly fishing the saltwater flats. </p>
                <iframe width="560" height="80" scrolling="no" frameborder="no" src="https://fireside.fm/s/MKBxL_oF+TsC6Xc3U/iframe"></iframe>
                <p>One of fly fishing's living legends, Winston Moore.</p>
                <p> The Hobo Fly Fishing team was speechless as he shared his experiences of casting a fly in the new world.</p>
                <p>We aren't exaggerating, the title of his official biography is "Winston: The Legend!" </p>
                <p>We were fortunate enough to have a chat with him about his pioneering efforts flyfishing on the
                    saltwater flats, and elsewhere, starting in the late 1950's!
                <h1><a id="Winston_Moore_A_Permits_Tale"></a>Winston Moore - A Permit’s Tale.</h1>
                <hr>
                <img src="/images/podcast/season-1/episode-1/winston-blue-jeans.jpg"
                alt="Blue Jeans Flats Fishing, Winston H. Moore"
                title="Blue Jeans Flats Fishing, Winston H. Moore"
                style="width:70%;"
                >
                <br>
                <hr>
                <p>The audio quality is not where we want it, yet, we promise to bring the good mic next time.</p>
                    <p>
                        Thanks to <a href="https://www.facebook.com/esteban.anastasio">Esteban Anastasio</a>
                        for the instantaneously improvised original music.
                    </p>

                </ul>
                <br>
                @foreach($podcasts as $podcast)
                    <div class="podcast">
                        <div class="featured-text relative-left">
                            <h3 class="primary"><a href="/publications/podcasts/{{$podcast->slug}}">{{$podcast->title}}</a></h3>
                            <article>
                               Episode {!! $podcast->episode !!} Season {!! $podcast->season !!}
                            </article>
                            <p>
                            <span class="taglinks"><strong>Tags: </strong>
                                @forelse($podcast->tags as $tag)
                                    <a href="{{ URL::to('podcasts/'. $tag->normalized .'/tag') }}">{{ $tag->name }}</a>,
                                @empty
                                    No Tags
                                @endforelse
                            </span>
                            </p>
                            <p class="additional-podcast-wrap">
                            <span class="additional-podcast">
                                <i class="livicon" data-name="clock" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i>
                                {{$podcast->created_at->diffForHumans()}}
                            </span>
                            </p>
                            <hr>
                            <p class="text-right">
                                <a href="/publications/podcasts/{{ $podcast->slug }}#disqus_thread" class="btn btn-primary">{{$smartass}}</a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>

@stop

@section('page_scripts')

@stop
