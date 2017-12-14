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
        a.btn-dashboard {
            overflow:hidden;
        }
        .btn-dashboard {
            width:100%;
        }
    </style>
@stop
@section('top')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    @stop
{{-- content --}}
@section('content')
    @if (Spark::developer(Auth::user()->email))
    <div class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Administration Dashboard</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4 dashboard-links">
                            <a class="btn btn-default btn-dashboard" href="cms/posts">Posts</a>
                        </div>
                        <div class="col-sm-4 dashboard-links">
                            <a class="btn btn-default btn-dashboard" href="/cms/showcases">Showcases</a>
                        </div>
                        <div class="col-sm-4 dashboard-links">
                            <a class="btn btn-default btn-dashboard" href="/cms/publications">Publications</a>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4 dashboard-links">
                            <a class="btn btn-default btn-dashboard" href="/cms/destinations">Destinations</a>
                        </div>
                        <div class="col-sm-4 dashboard-links">
                            <a class="btn btn-default btn-dashboard" href="/cms/regions">Regions</a>
                        </div>
                        <div class="col-sm-4 dashboard-links">
                            <a class="btn btn-default btn-dashboard" href="/spark/kiosk">Site Admin</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">User Dashboard</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-4 dashboard-links">
                                    <a class="btn btn-default btn-dashboard" href="/settings">Your Settings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page_scripts')
@stop