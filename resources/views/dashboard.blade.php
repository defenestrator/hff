@extends('layouts.master')

{{-- Page title --}}
@section('title')
    Dashboard
@parent
@stop
@section('page_styles')
    <style>
        .dashboard-links {
            padding: 1em;
        }
        .btn-dashboard {
            width:100%;
        }
    </style>
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
                        <div class="col-sm-4 dashboard-links">
                            <a class="btn btn-default btn-dashboard" href="/cms/showcases">Showcases</a>
                        </div>
                        <div class="col-sm-4 dashboard-links">
                            <a class="btn btn-default btn-dashboard" href="cms/posts">Blog Posts</a>
                        </div>
                        <div class="col-sm-4 dashboard-links">
                            <a class="btn btn-default btn-dashboard" href="/cms/publications">Publications</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 dashboard-links">
                            <a class="btn btn-default btn-dashboard" href="/settings">Your Settings</a>
                        </div>
                        <div class="col-sm-6 dashboard-links">
                            <a class="btn btn-default btn-dashboard" href="/spark/kiosk">Site Admin</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
@section('page_scripts')
@stop