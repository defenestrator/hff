@extends('layouts.master')

{{-- Page title --}}
@section('title')
    Dashboard
@parent
@stop
{{-- content --}}
@section('content')
    <div class="container">
        @yield('cms')
    </div>
@stop
@section('page_scripts')
@stop