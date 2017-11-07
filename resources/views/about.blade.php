@extends('layouts.master')

@section('title')
    Have Rod Will Travel
    @parent
@stop

@section('page_styles')
@stop

@section('top')

    <div class="tagline text-center">
        <h1 style="padding-left:1em; padding-right:1em;" class="bg-border wow pulse" data-wow-duration="0.5s">
            More than 30 fly fishing lodges worldwide
        </h1>
        <h2 class="text-center">Trust us to represent them.</h2>
    </div>

@stop

@section('content')

    <h3 class="text-center">The best fly-fishing-specific trips on the planet.</h3>
    <div class="col-md-6 col-md-offset-3">
    <h4>Our customers get</h4>
        <ul>
            <li>angling intelligence </li>
            <li>logistical assistance </li>
            <li>fishing tools (hardware and software) </li>
            <li>humanized support after the sale</li>
            <li>hobo pride</li>
            <li>reduced BS</li>
        </ul>
    </div>
@stop
{{-- footer scripts --}}
@section('page_scripts')
    <script>
        new WOW().init();
    </script>
@stop

