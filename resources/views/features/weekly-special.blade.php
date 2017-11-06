@extends('layouts.app')

@section('title')
    Hobo Fly Fishing Alaskan adventure  - 6 days - $2500/angler
    @parent
@stop

@section('page_styles')
@stop

@section('top')
    <div style="padding:2em 0;
                background: #1a1a1a url('{{config('filesystems.disks.DO.endpoint')}}/images/naknek-river-camp/steelie.jpg') center center no-repeat;
                background-size:cover;" >
        <h2 class="feature-tagline text-center">
            Hobo Fly Fishing Alaskan Adventure
        </h2>

        <h2 class="feature-tagline text-center">Alaska's Most Productive Waters</h2>
        <h2 class="feature-tagline text-center">Six days of Salmon and Trout</h2>
        <h2 style="font-size:40px;"class="feature-tagline text-center  wow pulse" data-wow-duration="2.5s">$2,500</h2>
        <div style="margin: 0 auto;width:300px; max-width:70%"><sales-inquiry></sales-inquiry></div>

    </div>

@stop

@section('content')
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <h3>Give us a call, write us, whatever, but don't miss your shot at this one.</h3>
            <p>If we're out fishing when you call, we'll get back to you, just after we hang our waders up to dry.
            </p>
        </div>
    </div>
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
@stop
