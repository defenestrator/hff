@extends('layouts.master')
@unless($post)
    @section('title')
        Ain't shit here!
    @stop
    @section('page_styles')

    @stop

    @section('top')
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-0">
                    <h1>You so silly!</h1>
                </div>
            </div>
        </div>
    @stop
@endunless
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
                <h4><a href="/publications/posts"><p><i data-name="arrow-left" data-c="#3097D1" data-size="14" data-hc="#3097D1" class="livicon"></i><span style="margin-bottom:5px;">blog index</span></p></a></h4>
            </div>
        </div>
    </div>
@stop

@section('content')
        <div class="row">
            <div class="col-sm-8 col-sm-offset-0">
                <div class="article post">
                    <img src="{{$post->header_photo}}" alt="{{$post->title}}" title="{{$post->title}}">
                    {!! $post->body !!}
                </div>
            </div>
            <div class="col-sm-4 col-sm-offset-0">
                <div>
                    <p class="additional-post-wrap">
                        <span class="additional-post">
                            by

                            <a href="/publications/authors/{{$author->uuid}}">{{ $post->author }}
                            </a>

                            </span>
                        <span class="additional-post">
                            @if($post->created_at)
                                - {{$post->created_at->diffForHumans()}}
                                <br>
                                <a href="/publications/authors/{{$author->uuid}}">
                                    <img style="max-height:80px;max-width:80px; margin:8px;" alt="{{$author->name}}" title="{{$author->name}}" src="{{$author->photo_url}}"/>
                                </a>
                            @else
                                - Never happened.
                            @endif
                        </span>
                    </p>
                    <p class="text-justify">
                        {!! $post->content !!}
                    </p>
                    @if($post->created_at)
                    <p>
                        <strong>Tags: </strong>
                        @forelse($post->tags as $tag)
                            <strong><a href="{{ URL::to('posts/' . ($tag->normalized) . '/tag') }}">{{ $tag->name }}</a></strong>,
                        @empty
                            No Tags
                        @endforelse
                    </p>
                    <p>
                    </p>
                    @endif
                </div>
                @include('parts.top10')
            </div>
        </div>
@stop
