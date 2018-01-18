@extends('layouts.email')

@section('title')
    Hobo Fly Fishing Newsletter
@parent
@stop

@section('page_styles')
    <style>
        body, h1, h2, h3 {
            font-weight:300;
            color:#262626;
        }
    </style>
@stop

@section('top')
    <h2>{{$newsletter->subject}}</h2>
    <h3> - {{$date}}</h3>
@stop

@section('content')
    <div style="font-weight:300; color:#262626; width:100%;">
        <img style="text-align:center; margin:0 auto; width:100%;" src="https://hobo-assets.s3-us-west-2.amazonaws.com/images/68ffed65d21ec9220d0f3a7d2c25535a.jpg">
        <div style="text-align:center;">@include('nav.authenticated-brand')</div>
        <hr>
        {!! $newsletter->body !!}
    </div>
<ul style="list-style-type: none;">
    <li style="text-align: center;  display: inline-block; list-style-type: none; width: fit-content; ">
       <a style="color:#262626; text-decoration:none;" href="https://hoboflyfishing.com"> - &hearts; the Hobos.</a>
    </li></ul>
<div style="margin:20px;">&nbsp;</div>
@stop


