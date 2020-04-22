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
        <div class="col-sm-8 col-sm-offset-0">
            <div class="text-center">
                <span class="text-center">{{ $posts->links() }}</span>
            </div>
            @foreach($posts as $post)
                <div class="article post">
                    <div class="featured-text relative-left">
                        <h2 class="primary"><a href="/publications/posts/{{$post->slug}}">{{$post->title}}</a></h2>
                        <a href="/publications/posts/{{$post->slug}}">
                            <img src="{{$post->header_photo}}" alt="{{$post->title}}" title="{{$post->title}}">
                        </a>
                        <article>
                            <p><a style="color:rgb(83, 89, 101);" href="/publications/posts/{{$post->slug}}">
                                <strong>{!! Illuminate\Support\Str::limit(strip_tags($post->body), 200, '...') !!}</strong>
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
            <div class="text-center">
                <span class="text-center">{{ $posts->links() }}</span>
            </div>
        </div>
    <div class="col-sm-4 col-sm-offset-0">
        <h3 class="text-center">Top 10 Destinations</h3>
        @foreach($showcases->take(10) as $showcase)
            <div class="col-md-12 info">
                <a href="/showcases/{{ $showcase->slug}}" title="{{$showcase->title}}">
                    <div class="sidebar-thumbnail"
                         style="background: linear-gradient(rgba(0,0,0, 0.3),rgba(0,0,0, 0.3)), url('{{$showcase->thumbnail}}') no-repeat; background-size:cover;">
                        <div class="caption">
                            <h3 style="font-weight:600;">{{$showcase->homepage_top}}</h3>
                            <h3 class="hidden-md hidden-lg" style="font-weight:600;">{{$showcase->homepage_bottom}}</h3>
                        </div>
                        @if($showcase->special)
                                <button role="button" style=" margin:0 15%; width:70%;" class="btn btn-warning">
                                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
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
