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
    @foreach($regions as $region)
        @if($region->id != 0)
            <div>
                <h2 style="font-weight:bold; border-bottom:2px solid #c5c7ca; padding:1em; padding-left:0.2em;">
                    <i class="fa fa-globe" aria-hidden="true"></i>
                    <a class="text-center" href="/regions/{{$region->slug}}" title="{{$region->name}}">
                    {{$region->name}}
                    </a>
                </h2>
                @foreach($showcases->sortBy('title') as $showcase)
                    @if($region->id == $showcase->region_id)
                    <div class="article showcase">
                        <h3 class="primary"><a href="/showcases/{{$showcase->slug}}">{{$showcase->title}}</a></h3>
                        <p><a href="/showcases/{{$showcase->slug}}">
                                <img style="width:100%;" src="{{$showcase->header_photo}}" alt="{{$showcase->title}}" title="{{$showcase->title}}">
                            </a></p>
                        <article>
                            <p><a style="color:rgb(83, 89, 101);" href="/showcases/{{$showcase->slug}}">
                                    {!! str_limit(strip_tags($showcase->body), 200, '...') !!}
                                </a>
                            </p>
                        </article>
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
                        <hr>
                    @endif
                @endforeach
            </div>
            @endif
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
