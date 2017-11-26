@extends('layouts.master')

@section('title')
    {{$showcase->title}}
    @parent
@stop

@section('page_styles')
@stop

@section('top')
    <img style="width:100%;"  src="{{$showcase->header_photo}}"
         alt="Get away from the mainland, see some real outback!" title="Get away from the mainland, see some real outback!">
    <h1 style="padding:0 0.5em;" class="showcase-header text-center wow pulse" data-wow-duration="0.5s">
        {{$showcase->title}}
    </h1>
    <hr>
@stop
@section('content')
    <h2 class="text-center">{{$showcase->tagline}}</h2>
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
                    <sales-inquiry></sales-inquiry>
                    {!! $showcase->sidebar_bottom !!}
                </article>
            </section>
        </div>
    </div>
@stop

@section('bottom')
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
@stop