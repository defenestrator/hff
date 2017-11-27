@extends('layouts.master')

@section('title')
    {{ $post->title }}
@stop

@section('page_styles')

@stop

@section('top')
@stop

@section('content')
        <div class="row content">
            <div class="col-md-8 col-md-offset-2">
                <h3>{{ $post->title }}</h3>
                <div class=" post">
                    {!! $post->body !!}
                    <div class="the-box no-border blog-detail-content">
                        <p class="additional-post-wrap">
                            <span class="additional-post">
                                by <a href="#"> {{ $post->author }}</a> about
                                </span>
                            <span class="additional-post">
                                    <a href="#">{{$post->created_at->diffForHumans()}} </a>
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
                </div>
            </div>
        </div>
@stop
