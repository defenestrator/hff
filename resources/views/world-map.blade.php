@extends('layouts.master')

@section('title')

@parent
@stop

@section('page_styles')
    <style>
        .world-map-component {
            width: 100%;
            height: 90vh;
            margin-bottom:1em;
        }
    </style>
@stop

@section('top')
    <world-map></world-map>
@stop

@section('content')

@stop

@section('bottom')
@stop

@section('page_scripts')

@stop

