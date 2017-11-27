@extends('layouts.master')

{{-- Page title --}}
@section('title')
      Blog - {{$pagetitle}}
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
            @foreach($posts as $post)
                <div class="post">
                    <div class="featured-text relative-left">
                        <h3 class="primary"><a href="/publications/posts/{{$post->slug}}">{{$post->title}}</a></h3>
                        <article>
                                {!! str_limit(strip_tags($post->body), 140, '...') !!}
                        </article>
                        <p>
                            <span class="taglinks"><strong>Tags: </strong>
                            @forelse($post->tags as $tag)
                                <a href="{{ URL::to('posts/'. $tag->normalized .'/tag') }}">{{ $tag->name }}</a>,
                            @empty
                                No Tags
                            @endforelse
                            </span>
                        </p>
                        <p class="additional-post-wrap">
                            <span class="additional-post">
                                <i class="livicon" data-name="user" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i>
                                by {{ $post->author }}
                            </span>
                            <span class="additional-post">
                                <i class="livicon" data-name="clock" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i>
                                {{$post->created_at->diffForHumans()}}
                            </span>
                        </p>
                        <hr>
                        <p class="text-right">
                            <a href="/publications/posts/{{ $post->slug }}"> <button class="btn btn-primary">Read More</button></a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    <div class="col-md-4 col-md-offset-0">
            <h3 class="text-center">Destinations</h3>
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav side-menu">
                @include('nav.places')
            </ul>
        </nav>

    </div>
    </div>
@stop

@section('page_scripts')

@stop
