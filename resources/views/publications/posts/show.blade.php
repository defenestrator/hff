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
                <h3 class="text-center">Destinations</h3>
                @foreach($showcases as $showcase)
                    <div class="col-md-12 info">
                        <a href="/showcases/{{ $showcase->slug}}" title="{{$showcase->title}}">
                            <div class="thumbnail"
                                 style="background-image: url('{{$showcase->thumbnail}}');
                                         background-position: center center;">
                                <div class="caption">

                                    <h3 style="font-weight:600;">{{$showcase->region}}</h3>
                                </div>
                                @if($showcase->special)
                                    <a href="tel:2088599133">
                                        <button role="button" style=" margin:0 15%; width:70%; z-index:99;" class="btn btn-danger">
                                            <i data-name="phone" data-size="20" data-loop="true" data-c="#fff"
                                               data-hc="#F0F8FF" class="livicon icon4 icon3" style="width: 20px; height: 20px;"></i>
                                            call now!
                                        </button>
                                    </a>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
@stop
