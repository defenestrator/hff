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
@section('page_scripts')
    <script src="/js/trumbowyg.cleanpaste.min.js"></script>
    <script src="/js/trumbowyg.pasteimage.min.js"></script>
    <script src="/js/trumbowyg.upload.min.js"></script>
@stop