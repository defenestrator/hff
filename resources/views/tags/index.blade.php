@extends('layouts.master')

{{-- Page title --}}
@section('title')
    {{$pagetitle}}
    @parent
@stop

@section('page_styles')
@stop

@section('top')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-0">
                <h1>{{$pagetitle}}</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            @foreach($contents as $content)
                <div class="post">
                    <div class="featured-text relative-left">
                        <h2 class="primary"><a href="/publications/{{$content->type}}/{{$content->slug}}">{{$content->title}}</a></h2>
                        <a href="/publications/{{$content->type}}/{{$content->slug}}">
                            <img src="{{$content->header_photo}}" alt="{{$content->title}}" title="{{$content->title}}">
                        </a>
                        <article>
                            <p><a style="color:rgb(83, 89, 101);" href="/publications/{{$content->type}}/{{$content->slug}}">
                                {!! str_limit(strip_tags($content->body), 200, '...') !!}
                            </a></p>
                        </article>
                        <br>
                        <p>
                        <span class="text-right">
                            <a href="/publications/{{$content->type}}/{{ $content->slug }}"> <button class="btn btn-primary">Read More</button></a>
                        </span>&nbsp;&nbsp;
                        </p>
                        <p class="additional-post-wrap">
                            <span class="taglinks">Tags:
                                @forelse($content->tags as $tag)
                                    <a href="{{ URL::to('tag/'. $tag->normalized) }}">{{ $tag->name }}</a>,
                                @empty
                                    No Tags
                                @endforelse
                            </span>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-4 col-md-offset-0">
            <h3 class="text-center">&nbsp;</h3>
            {{--<nav class="navbar navbar-default">--}}
            {{--<ul class="nav navbar-nav side-menu">--}}
            {{--@include('nav.places')--}}
            {{--</ul>--}}
            {{--</nav>--}}

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
