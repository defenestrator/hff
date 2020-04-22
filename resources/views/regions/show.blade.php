@extends('layouts.master')

@section('title')
    {{$region->name}}
    @parent
@stop

@section('page_styles')
    <style>
    </style>

@stop

@section('top')
    <div style="padding:2em 0;
            background: #1a1a1a url('{{$region->header_photo}}') center center no-repeat;
            background-size:cover; height:50vh;"
        class="tagline">
        <h1 style="padding:0 0.5em;" class="showcase-header feature-tagline text-center">
            <a title="{{$region->name}}"></a>
            {{$region->name}}
        </h1>
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
    @foreach(array_chunk($region->showcases->all(), 2) as $showcaseRow)
    <div class="row">
        @foreach($showcaseRow as $showcase)
        @if($showcase->publication == true)
        <div class="col-sm-6 col-sm-offset-0">
            <section>
                <article class="article">
                    <div style="padding:12px 20px;" class="article">
                        <p>
                            <a href="/showcases/{{ $showcase->slug }}">
                                <h3>{{$showcase->title}}</h3>
                                <img src="{{$showcase->header_photo}}"/>
                            </a>
                        </p>
                        <h4>
                            <a href="/showcases/{{ $showcase->slug}}" title="{{$showcase->homepage_top}}">{{$showcase->tagline}}</a>
                        </h4>
                        <p>
                            <a style="color:rgb(83, 89, 101);" href="/showcases/{{$showcase->slug}}" title="{{$showcase->homepage_bottom}}">
                                {!! Illuminate\Support\Illuminate\Support\Str::limit(strip_tags($showcase->body), 200, '...') !!}
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
                </article>
            </section>
        </div>
        @endif
        @endforeach
    </div>
    @endforeach

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