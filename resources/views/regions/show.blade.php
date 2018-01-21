@extends('layouts.master')

@section('title')
    {{$region->name}}
    @parent
@stop

@section('page_styles')
    <style>
        .g-recaptcha {
            width: 304px;
            margin: 0 auto;
        }
    </style>

@stop

@section('top')
    <div class="tagline">
        <h1 style="padding:0 0.5em;" class="showcase-header feature-tagline text-center">
            <a title="{{$region->name}}"></a>
            {{$region->name}}
        </h1>
        <h2 class="showcase-header text-center">Yeah, we fish there too.</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @include('sales-inquiry')
            </div>
        </div>
    </div>

@stop
@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <section>
                <article class="article">
                    <h2>Places we book in {{$region->name}}</h2>
                    @foreach($region->showcases as $showcase)
                    <div style="padding-bottom: 24px; border-bottom:2px solid #c5c7ca;" class="article">
                        <p><a href="/showcases/{{ $showcase->slug }}"><h3>{{$showcase->title}}</h3><img src="{{$showcase->header_photo}}"/></a></p>
                        <article>
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>
                                        <a href="/showcases/{{ $showcase->slug}}" title="{{$showcase->homepage_top}}">{{$showcase->tagline}}</a>
                                    </h4>
                                </div>
                                <div class="col-md-8">
                                    <p>
                                        <a style="color:rgb(83, 89, 101);" href="/showcases/{{$showcase->slug}}" title="{{$showcase->homepage_bottom}}">
                                            {!! str_limit(strip_tags($showcase->body), 200, '...') !!}
                                        </a>
                                    </p>
                                    <p>
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
                        </article>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">

                            </div>
                        </div>
                    </div>
                    @endforeach
                </article>
            </section>
        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <hr>
                    <div>
                    </div>
                </article>
            </section>
        </div>
    </div>
@stop

@section('bottom')
    <div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <p>
            </p>
            <p>
                &nbsp;
            </p>
        </div>
    </div>
        </div>
@stop
{{-- footer scripts --}}
@section('page_scripts')

@stop