@extends('layouts.master')

{{-- Page title --}}
@section('title')
      {{$pagetitle}}
@parent
@stop

@section('page_styles')
@stop

@section('top')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-0">
                <h1>{{$pagetitle}}</h1>
                <h4><a href="/tag/{{$tag}}">Show all results for '{{$tag}}' tag</a></h4>
            </div>
        </div>
    </div>
@stop

@section('content')
<div class="row">
        <div class="col-md-8 col-md-offset-0">
            @if(count($posts) == 0)
                <h2>Sorry, there are no posts with the '{{$tag}}' tag</h2>
            @endif
            @foreach($posts as $post)
                <div class="post">
                    <div class="featured-text relative-left">
                        <h2 class="primary"><a href="/publications/posts/{{$post->slug}}">{{$post->title}}</a></h2>
                        <a href="/publications/posts/{{$post->slug}}">
                            <img src="{{$post->header_photo}}" alt="{{$post->title}}" title="{{$post->title}}">
                        </a>
                        <article>
                            <p> <a style="color:rgb(83, 89, 101);" href="/publications/posts/{{$post->slug}}">
                                {!! str_limit(strip_tags($post->body), 200, '...') !!}
                            </a></p>
                        </article>
                        <p>
                            <span class="text-right">
                                <a href="/publications/posts/{{ $post->slug }}"> <button class="btn btn-primary">Read More</button></a>
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
        <h3 class="text-center">&nbsp;</h3>
        {{--<nav class="navbar navbar-default">--}}
            {{--<ul class="nav navbar-nav side-menu">--}}
                {{--@include('nav.places')--}}
            {{--</ul>--}}
        {{--</nav>--}}

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
