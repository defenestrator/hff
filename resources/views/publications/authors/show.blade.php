@extends('layouts.master')

@section('title')

@parent
@stop

@section('page_styles')
    <style>
    </style>
@stop

@section('top')

@stop

@section('content')
    <h1>{{$author->name}}</h1>
    <div class="row">
        <div class="col-sm-4 article">
            <img style="max-height:300px;max-width:300px;" alt="{{$author->name}}" title="{{$author->name}}" src="{{$author->photo_url}}"/>
        </div>
        <div class="col-sm-8">
            <article id="author-bio">
                {{$author->bio}}
            </article>
        </div>
    </div>
    <div class="row">
        <hr>
        <div class="col-sm-8 col-sm-offset-2">
            <h3>Posts by {{$author->name}}:</h3>
    @foreach($posts as $post)

        <ul>
            <li>
                <a href="/publications/posts/{{$post->slug}}">{{$post->title}}</a> - {{$post->created_at->diffForHumans()}}
            </li>
        </ul>
    @endforeach
        </div>
    </div>
@stop

@section('bottom')
@stop

@section('page_scripts')

@stop

