@extends('layouts.master')

@section('title', 'Page Not Found')

@yield('page_styles', '')

@yield('scripts', '')

@section('top')
    <div class="tagline text-center"
         style="background: linear-gradient(rgba(0,0,0, 0.4),rgba(0,0,0, 0.4)), url('https://hobo-assets.s3-us-west-2.amazonaws.com/images/tangle.jpg') top center no-repeat; background-size:cover; ">
        <h1 style="font-weight:600; text-shadow:4px 4px 3px #000000;" class="wow pulse" data-wow-duration="0.7s">
            404
        </h1>
        <h2 style="font-weight:600; text-shadow:4px 4px 3px #000000;">
            Fly fishing Not found
        </h2>
        <h2 style="visibility:hidden;">
            Seriously
        </h2>
    </div>
@stop

@section('message')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Try something new</h2>
                <div style="font-weight:600; padding:20px; border:1px solid #ccc; border-radius:1em;">
                    <ul class="list-inline border-primary">
                        <li>Fish:</li>
                        <li><a href="{{url('/tag/permit')}}">permit,</a></li>
                        <li><a href="{{url('/tag/bonefish')}}">bonefish,</a></li>
                        <li><a href="{{url('/tag/tarpon')}}">tarpon,</a></li>
                        <li><a href="{{url('/tag/roosterfish')}}">roosterfish,</a></li>
                        <li><a href="{{url('/tag/steelhead')}}">steelhead,</a></li>
                        <li><a href="{{url('/tag/salmon')}}">salmon</a></li>
                    </ul>
                    <ul class="list-inline border-primary">
                        <li>Places:</li>
                        <li><a href="{{url('/tag/belize')}}">Belize</a>,</li>
                        <li><a href="{{url('/tag/bahamas')}}">Bahamas</a>,</li>
                        <li><a href="{{url('/tag/costa-rica')}}">Costa Rica</a>,</li>
                        <li><a href="{{url('/tag/alaska')}}">Alaska</a>,</li>
                        <li><a href="{{url('/tag/australia')}}">Australia</a>,</li>
                        <li><a href="{{url('/tag/idaho')}}">Idaho</a></li>
                    </ul>
                    <ul class="list-inline border-primary">
                        <li>Sections:</li>
                        <li><a href="{{url('/')}}">Homepage</a>,</li>
                        <li><a href="{{url('/publications/posts')}}">Blog</a>,</li>
                        <li><a href="https://have-rod-will-travel.fireside.fm/">Podcast</a>,</li>
                        <li><a href="{{url('/publications/showcases')}}">Destinations</a></li>

                    </ul>
                </div>

                <h1 style="visibility:hidden;">Sorry!</h1>
            </div>
        </div>
    </div>
@stop

@section('bottom')
    <div class="tagline text-center"
         style="margin-bottom:0; background:linear-gradient(rgba(0,0,0, 0.4),rgba(0,0,0, 0.4)), url('https://hobo-assets.s3-us-west-2.amazonaws.com/images/tangle.jpg') bottom center no-repeat; background-size:cover;">
        <h2 style="visibility:hidden;">
            404
        </h2>
        <h2 style="visibility:hidden;">
            No fly fishing found
        </h2>
        <h2 style="visibility:hidden;">
            Seriously
        </h2>
    </div>
@stop