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
    <div class="tagline" style="height:25vh;" >
        <h1 style="padding:0 0.5em;" class="showcase-header feature-tagline text-center wow pulse" data-wow-duration="0.5s">
            <a title="{{$region->name}}"></a>
            {{$region->name}}
        </h1>
        <h2 class="feature-tagline text-center">Yeah, we fish there too.</h2>
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
                    <h3>Places we book in {{$region->name}}</h3>
                    @foreach($region->showcases as $showcase)
                    <a href="/showcases/{{ $showcase->slug }}">{{$showcase->title}}</a>
                    @endforeach
                </article>
            </section>
        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    <hr>
                    <div>
                        <div id="disqus_thread"></div>
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
    <script>
        new WOW().init();
    </script>
@stop