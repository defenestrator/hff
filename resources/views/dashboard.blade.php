@extends('spark::layouts.app')

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
