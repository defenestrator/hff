@extends('layouts.master')

{{-- Page title --}}
@section('title')
    Podcasts
    @parent
@stop

@section('page_styles')
@stop

@section('top')
@stop

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <h1>{{$title}}</h1>
            <h3>{{$description}}</h3>
            <h4>{{$tagline}}</h4>
            <hr>
            @foreach($episodes as $item)

            <div class="audio-container">
                <p style="font-size:1.5em; margin:0 0.5em;">{{ $item['title']}}</p>
                <audio src="{{$item['attachments'][0]['url']}}" class="text-center audio-player" controls="controls">Your browser does not support HTML5 Audio!</audio>
            </div>
                <p>{{ $item['content_text']}}</p>
                <hr>
            @endforeach
        </div>
    </div>
@stop

@section('page_scripts')

@stop
