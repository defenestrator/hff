@extends('master')

{{-- Page title --}}
@section('title')
Blog
@parent
@stop

@section('page_styles')
@stop

@section('top')
@stop

@section('content')
<div class="row">
    <div class="content">
        <div class="col-md-12">
            @foreach($posts as $post)
                <div class="post">
                    <div class="featured-text relative-left">
                        <h3 class="primary"><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h3>
                        <article>
                            {!! $post->body !!}
                        </article>
                        <p>
                            <span class="taglinks"><strong>Tags: </strong>
                            @forelse($post->tags as $tag)
                                <a href="{{ URL::to('posts/'.mb_strtolower($tag->slug).'/tag') }}">{{ $tag->name }}</a>,
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
                            <a href="#" class="btn btn-primary text-white">be a smartass</a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </div>
</div>
    
@stop

@section('page_scripts')

@stop
