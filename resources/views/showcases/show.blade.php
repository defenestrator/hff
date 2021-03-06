@extends('layouts.master')

@section('title')
    {{$showcase->title}}
    @parent
@stop

@section('page_styles')
    <style>

    </style>

@stop

@section('top')
    <div style="padding:2em 0;
                background: #1a1a1a url('{{$showcase->header_photo}}') center center no-repeat;
                background-size:cover; height:50vh;" >
        <h1 style="padding:0 0.5em;" class="showcase-header feature-tagline text-center">
            <a title="{{$showcase->title}}"></a>
            {{$showcase->title}}
        </h1>
        <h2 class="feature-tagline text-center">{{$showcase->tagline}} </h2>
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
                    {!! $showcase->body !!}
                </article>
            </section>
        </div>
        <div class="col-sm-4 col-sm-offset-0">
            <section>
                <article class="article">
                    {!! $showcase->sidebar_top !!}
                    <hr>
                    {!! $showcase->sidebar_bottom !!}
                    <hr>
                    <div>
                        <p>
                            Tags:
                            @forelse($showcase->tags as $tag)
                                <a href="{{ URL::to('showcases/' . ($tag->normalized) . '/tag') }}">{{ $tag->name }}</a>,
                            @empty
                                No Tags
                            @endforelse
                        </p>
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