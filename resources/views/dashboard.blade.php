@extends('layouts.master')

{{-- Page title --}}
@section('title')
    Dashboard
@parent
@stop
{{-- content --}}
@section('content')
    <div class="container">
        @include('nav.cms')
        @yield('cms')
    </div>
@stop
@section('page_scripts')
@stop