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
            <div class="col-md-12">

                <h2><a id="Before_the_internet_0"></a>Before the internet…</h2>
                <iframe width="560" height="80" scrolling="no" frameborder="no" src="https://fireside.fm/s/MKBxL_oF+TsC6Xc3U/iframe"></iframe>
                <p>…before buffs, $300 polarized fashion glasses, cell phones, blogs, pro staffers,<br>
                    millions of look-at-me videos, flats boots, shirts, pants and hats…</p>
                <p>…before the .com fly fishing business:</p>
                <p>There was a man in blue jeans and a fiberglass rod, discovering a new world.</p>
                <p>The new world of fly fishing the saltwater flats.</p>
                <h1><a id="Winston_Moore_A_Permits_Tale"></a>Winston Moore - A Permit’s Tale.</h1>

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
