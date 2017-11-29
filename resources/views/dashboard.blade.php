@extends('layouts.master')

{{-- Page title --}}
@section('title')
    Dashboard
@parent
@stop
@section('top')
    @stop
{{-- content --}}
@section('content')
    <div class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 container">
                            <a class="btn btn-default" href="/cms/showcases">Showcases</a>
                        </div>
                        <div class="col-md-6 container">
                            <a class="btn btn-default" href="cms/posts">Blog Posts</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 container">
                            <a class="btn btn-default" href="/settings">Your Settings</a>
                        </div>
                        <div class="col-md-6 container">
                            <a class="btn btn-default" href="/spark/kiosk">Site Admin</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
@section('page_scripts')
@stop