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
                <h2>Podcasts Coming, October 2017.</h2>
                <h3>We are humbled to speak with our first guest, he's the real deal.</h3>
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
