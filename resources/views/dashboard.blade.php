@extends('layouts.master')

{{-- Page title --}}
@section('title')
    Dashboard
@parent
@stop
@section('scripts')
    <script>
        (function(w,d,s,g,js,fs){
            g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
            js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
            js.src='https://apis.google.com/js/platform.js';
            fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
        }(window,document,'script'));
    </script>
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
    <br>
@stop
{{-- content --}}
@section('content')
    <div class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">User Dashboard</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-4 dashboard-links">
                                    <a class="btn btn-default btn-dashboard" href="cms/posts">Posts</a>
                                </div>
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

    <div class="container-fluid">
        @if (Spark::developer(Auth::user()->email))
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Administration Dashboard</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4 dashboard-links">
                            <a class="btn btn-default btn-dashboard" href="/cms/showcases">Showcases</a>
                        </div>
                        <div class="col-sm-4 dashboard-links">
                            <a class="btn btn-default btn-dashboard" href="/cms/newsletters">Newsletters</a>
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
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Primitive Analytics Dashboard</div>
                <div class="panel-body">
                    <h4>click the orange thingy and login with your @hoboflyfishing.com account</h4>
                    <div id="embed-api-auth-container"></div>
                    <div id="chart-container"></div>
                    <div id="view-selector-container"></div>
                </div>
            </div>
        </div>
    </div>
    @endif
@stop
@section('page_scripts')
    <script>

        gapi.analytics.ready(function() {

            /**
             * Authorize the user immediately if the user has already granted access.
             * If no access has been created, render an authorize button inside the
             * element with the ID "embed-api-auth-container".
             */
            gapi.analytics.auth.authorize({
                container: 'embed-api-auth-container',
                clientid: '913186508922-2qk0mbskk18v7r196un04ekip5g4dtli.apps.googleusercontent.com'
            });


            /**
             * Create a new ViewSelector instance to be rendered inside of an
             * element with the id "view-selector-container".
             */
            var viewSelector = new gapi.analytics.ViewSelector({
                container: 'view-selector-container'
            });

            // Render the view selector to the page.
            viewSelector.execute();


            /**
             * Create a new DataChart instance with the given query parameters
             * and Google chart options. It will be rendered inside an element
             * with the id "chart-container".
             */
            var dataChart = new gapi.analytics.googleCharts.DataChart({
                query: {
                    metrics: ['ga:users'],
                    dimensions: 'ga:date',
                    'start-date': '30daysAgo',
                    'end-date': 'yesterday'
                },
                chart: {
                    container: 'chart-container',
                    type: 'LINE',
                    options: {
                        width: '100%'
                    }
                }
            });


            /**
             * Render the dataChart on the page whenever a new view is selected.
             */
            viewSelector.on('change', function(ids) {
                dataChart.set({query: {ids: ids}}).execute();
            });

        });
    </script>
@stop