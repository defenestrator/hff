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
        <div class="col-sm-8 col-sm-offset-0">
            <section>
                <article class="article">
                    <h2>Places we book in {{$region->name}}</h2>
                    @foreach($region->showcases as $showcase)
                    <ul class="list-unstyled">
                        <li><a href="/showcases/{{ $showcase->slug }}"><h3>{{$showcase->title}}</h3><img src="{{$showcase->header_photo}}"/></a></li>
                    </ul>
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