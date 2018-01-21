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
                                {!! str_limit(strip_tags($post->body), 200, '...') !!}
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
        @include('parts.top10')
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
