@extends('spark::layouts.app')

{{-- Page title --}}
@section('title')
    Dashboard
    @parent
@stop
{{-- content --}}
@section('cms')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel with-nav-tabs panel-default panel-body">
                    <div id="posts">
                        <posts></posts>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
