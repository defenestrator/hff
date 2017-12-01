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
                <h1> {{$pagetitle}}</h1>
                <h2><a href="/tag/{{$tag}}">Show all content for '{{$tag}}' tag</a></h2>
            </div>
        </div>
    </div>
@stop

@section('content')
<div class="row">
        <div class="col-md-8 col-md-offset-0">
            @foreach($showcases as $showcase)
                <div class="showcase">
                    <div class="featured-text relative-left">
                        <h2 class="primary"><a href="/showcases/{{$showcase->slug}}">{{$showcase->title}}</a></h2>
                        <a href="/showcases/{{$showcase->slug}}">
                            <img style="width:100%;" src="{{$showcase->header_photo}}" alt="{{$showcase->title}}" title="{{$showcase->title}}">
                        </a>
                        <hr>
                        <article>
                            <a style="color:rgb(83, 89, 101);" href="/showcases/{{$showcase->slug}}">
                                {!! str_limit(strip_tags($showcase->body), 200, '...') !!}
                            </a>
                        </article>
                        <br>
                        <p class="additional-showcase-wrap">
                            <span class="taglinks">Tags:
                                @forelse($showcase->tags as $tag)
                                    <a href="{{ URL::to('showcases/'. $tag->normalized .'/tag') }}">{{ $tag->name }}</a>,
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
            {{--<h3 class="text-center">Destinations</h3>--}}
        {{--<nav class="navbar navbar-default">--}}
            {{--<ul class="nav navbar-nav side-menu">--}}
                {{--@include('nav.places')--}}
            {{--</ul>--}}
        {{--</nav>--}}
        &nbsp;
    </div>
    </div>
@stop

@section('page_scripts')

@stop
