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
            </div>
        </div>
    </div>
@stop
@section('content')
<div class="row">
        <div class="col-md-12 col-md-offset-0">
            @foreach(array_chunk($showcases->all(), 2) as $showcaseRow)
                <div class="row">
                    @foreach($showcaseRow as $showcase)
                        <div style="margin:20px 0; padding-left:30px; padding-right:30px;" class="col-md-6 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 info">
                            <a href="/showcases/{{ $showcase->slug}}" title="{{$showcase->title}}">
                                <div class="thumbnail"
                                     style="background: linear-gradient(rgba(0,0,0, 0.2),rgba(0,0,0, 0.2)), url('{{$showcase->thumbnail}}') no-repeat; background-size:cover;">
                                    <div class="caption">
                                        <h3 style="font-weight:600;">{{$showcase->homepage_top}}</h3>
                                        <h3 style="font-weight:600;">{{$showcase->homepage_bottom}}</h3>
                                    </div>
                                    @if($showcase->special)
                                        <button role="button" style="box-shadow: 2px 2px 2px #000; margin:0 15%; width:70%;" class="btn btn-warning">
                                            <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                            <span>Learn More</span>
                                        </button>
                                    @endif
                                </div>
                                <article>
                                    <p>
                                        <a style="color:rgb(83, 89, 101);" href="/showcases/{{$showcase->slug}}">
                                            {!! str_limit(strip_tags($showcase->body), 200, '...') !!}
                                        </a>
                                    </p>
                                </article>
                                <section class="additional-showcase-wrap">
                                    <span class="taglinks">Tags:
                                        @forelse($showcase->tags as $tag)
                                            <a href="{{ URL::to('showcases/'. $tag->normalized .'/tag') }}">{{ $tag->name }}</a>,
                                        @empty
                                            No Tags
                                        @endforelse
                                    </span>
                                </section>
                            </a>
                        </div>
                    @endforeach
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
