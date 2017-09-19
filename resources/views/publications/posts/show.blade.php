@extends('master')

@section('title')
{{$post->title}}
@parent
@stop

@section('page_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/blog.css') }}">
@stop

@section('top')
@stop

@section('content')
    <div class="container">
        <h2 class="primary marl12">{{ $post->title }}</h2>
        <div class="row content">
            <div class="col-sm-12 col-md-12">
                <div class=" post">
                    {!! $post->body !!}
                    <div class="the-box no-border blog-detail-content">
                        <p class="additional-post-wrap">
                            <span class="additional-post">
                                    <i class="livicon" data-name="user" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i> by&nbsp;<a href="#">{{ $post->author }}</a>
                                </span>
                            <span class="additional-post">
                                    <i class="livicon" data-name="clock" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i><a href="#">at {{$post->created_at}} </a>
                                </span>
                        </p>
                        <p class="text-justify">
                            {!! $post->content !!}
                        </p>
                        <p>
                            <strong>Tags: </strong>
                            @forelse($post->tags as $tag)
                                <a href="{{ URL::to('posts/'.mb_strtolower($tag->normalized).'/tag') }}">{{ $tag->name }}</a>,
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
    </div>
@stop
