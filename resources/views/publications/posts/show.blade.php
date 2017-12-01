@extends('layouts.master')

@section('title')
    {{ $post->title }}
@stop

@section('page_styles')

@stop

@section('top')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-0">
                <h1>{{ $post->title }}</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-0">
                <div class=" post">
                    <img src="{{$post->header_photo}}" alt="{{$post->title}}" title="{{$post->title}}">
                    <hr>
                    {!! $post->body !!}

                </div>
            </div>
            <div class="col-md-4 col-md-offset-0">
                <h3 class="text-center">&nbsp;</h3>
                <div>
                    <p class="additional-post-wrap">
                        <span class="additional-post">
                            by {{ $post->author }}, about
                            </span>
                        <span class="additional-post">
                               {{$post->created_at->diffForHumans()}}
                            </span>
                    </p>
                    <p class="text-justify">
                        {!! $post->content !!}
                    </p>
                    <p>
                        <strong>Tags: </strong>
                        @forelse($post->tags as $tag)
                            <a href="{{ URL::to('posts/' . ($tag->normalized) . '/tag') }}">{{ $tag->name }}</a>,
                        @empty
                            No Tags
                        @endforelse
                    </p>
                    <p>
                    <div id="disqus_thread"></div>
                    </p>
                </div>
                {{--<nav class="navbar navbar-default">--}}
                {{--<ul class="nav navbar-nav side-menu">--}}
                {{--@include('nav.places')--}}
                {{--</ul>--}}
                {{--</nav>--}}

            </div>
        </div>
@stop
