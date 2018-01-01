@extends('layouts.email')

@section('title')
    Hobo Fly Fishing Newsletter
@parent
@stop

@section('page_styles')
    <style>
    </style>
@stop

@section('top')
    <h1>Riding the Reels</h1>
    <h2>{{$newsletter->subject}}</h2>
    <h3> - {{$date}}</h3>
@stop

@section('content')
{!! $newsletter->body !!}

<img src="https://hobo-assets.s3-us-west-2.amazonaws.com/images/68ffed65d21ec9220d0f3a7d2c25535a.jpg">
@stop


