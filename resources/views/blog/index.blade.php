@extends('master')

{{-- Page title --}}
@section('title')
Blog
@parent
@stop

{{-- page level styles --}}
@section('page_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/tabbular.css') }}">
    <!--end of page level css-->
@stop

@section('top')
{{--Full-width top content might go here. --}}
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="content">
            <div class="col-md-12">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="featured-text relative-left">
                            <h3 class="primary"><a href="/blog/{{$post->slug}}">{{$post->title}}</a></h3>
                            <article>
                                {!! $post->body !!}
                            </article>
                            <p>
                                <strong>Tags: </strong>
                                <a href="#">tags</a>
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
</div>
    
@stop

@section('page_scripts')

@stop
