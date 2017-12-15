@extends('layouts.master')

{{-- Page title --}}
@section('title')
      Blog{{$pagetitle}}
@parent
@stop

@section('page_styles')
@stop

@section('top')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-0">
                <h1>Hobo Fly Fishing Blog</h1>
            </div>
        </div>
    </div>
@stop
@section('content')
<div class="row">
        <div class="col-md-8 col-md-offset-0">
            {!! $posts!!}
            @foreach($posts as $post)
                <div class="article post">
                    <div class="featured-text relative-left">
                        <h2 class="primary"><a href="/publications/posts/{{$post->slug}}">{{$post->title}}</a></h2>
                        <p>
                        <span class="additional-post">
                            by {{ $post->author }} {{$post->created_at->diffForHumans()}}
                        </span>
                        </p>
                        <a href="/publications/posts/{{$post->slug}}">
                            <img src="{{$post->header_photo}}" alt="{{$post->title}}" title="{{$post->title}}">
                        </a>
                        <article>
                            <p><a style="color:rgb(83, 89, 101);" href="/publications/posts/{{$post->slug}}">
                                <strong>{!! str_limit(strip_tags($post->body), 200, '...') !!}</strong>
                            </a></p>
                        </article>
                        <p>
                        <span class="text-right">
                            <a href="/publications/posts/{{ $post->slug }}" title="{{ $post->title }}"> <button class="btn btn-primary">Read More</button></a>
                        </span>
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
            @endforeach
        </div>
    <div class="col-md-4 col-md-offset-0">
        <h3 class="text-center">Destinations</h3>
        @foreach($showcases->take(10) as $showcase)
            <div class="col-md-12 info">
                <a href="/showcases/{{ $showcase->slug}}" title="{{$showcase->title}}">
                    <div class="sidebar-thumbnail"
                         style="background-image: url('{{$showcase->thumbnail}}');
                                 background-position: center center;">
                        <div class="caption">
                            <h3 style="font-weight:600;">{{$showcase->homepage_bottom}}</h3>
                        </div>
                        @if($showcase->special)
                                <button role="button" style=" margin:0 15%; width:70%;" class="btn btn-warning">
                                    <i data-name="question" data-size="16" data-loop="true" data-c="#fff"
                                       data-hc="#F0F8FF" class="livicon icon4 icon3" style="width: 16px; height: 16px;"></i>
                                    Learn More
                                </button>
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
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
