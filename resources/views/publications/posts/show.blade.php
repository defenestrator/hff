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
                    <h1>motherfucker</h1>
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
            </div>
        </div>
    </div>
@stop

@section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-0">
                <div class="article post">
                    <img src="{{$post->header_photo}}" alt="{{$post->title}}" title="{{$post->title}}">
                    {!! $post->body !!}

                </div>
            </div>
            <div class="col-md-4 col-md-offset-0">
                <div>
                    <p class="additional-post-wrap">
                        <span class="additional-post">
                            by {{ $post->author }}
                            </span>
                        <span class="additional-post">
                            @if($post->created_at)
                                - {{$post->created_at->diffForHumans()}}
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
                    <div id="disqus_thread"></div>
                    </p>
                    @endif
                </div>
                <h3 class="text-center">Destinations</h3>
                @foreach($showcases as $showcase)
                    <div class="col-md-12 info">
                        <a href="/showcases/{{ $showcase->slug}}" title="{{$showcase->title}}">
                            <div class="sidebar-thumbnail"
                                 style="background-image: url('{{$showcase->thumbnail}}');
                                         background-position: center center;">
                                <div class="caption">

                                    <h3 style="font-weight:600;">{{$showcase->region}}</h3>
                                </div>
                                @if($showcase->special)
                                    <button role="button" style="box-shadow: 2px 2px 2px #000; margin:0 15%; width:70%;" class="btn btn-warning">
                                        <i data-name="question" data-size="16" data-loop="true" data-c="#fff"
                                           data-hc="#F0F8FF" class="livicon icon4 icon3" style="width: 16px; height: 16px;"></i>
                                        <span>Learn More</span>
                                    </button>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
@stop
