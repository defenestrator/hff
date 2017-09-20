@extends('spark::layouts.app')

{{-- Page title --}}
@section('title')
    Dashboard
@parent
@stop
{{-- content --}}
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12 col-md-offset-0" style="padding-top:25px;">
                <div class="panel panel-default panel-body">
                    <div class="tab-content">
                        <div id="posts">
                            <h2>Posts List goes here.</h2>
                        </div>
                        <div id="podcasts">
                            <h2>Podcasts List goes here.</h2>
                        </div>
                        <div id="fish">
                            <article class="article">
                                <h2>New Fish Species:</h2>

                                <p>Add a fish!</p>
                            </article>
                            <article class="article">
                                <h2>Edit Fish Species:</h2>

                                <p>
                                    <em><strong>from the list below</strong></em>
                                </p>
                            </article>
                        </div>
                        <div id="fisheries">
                            <article class="article">
                                <h2>New Fishery:</h2>

                                <p>Add a fishery!</p>
                            </article>
                            <article class="article">
                                <h2>Edit Fisheries:</h2>

                                <p>
                                    <em><strong>from the list below</strong></em>
                                </p>
                            </article>
                        </div>
                        <div id="hatches">
                            <article class="article">
                                <h2>New Hatch:</h2>

                                <p>Add a hatch!</p>
                            </article>
                            <article class="article">
                                <h2>Edit Hatches:</h2>

                                <p>
                                    <em><strong>from the list below</strong></em>
                                </p>
                            </article>
                        </div>
                        <div id="flies">
                            <article class="article">
                                <h2>New Fly Pattern:</h2>

                                <p>Add a fly pattern.</p>
                            </article>
                            <article class="article">
                                <h2>Edit Fly Patterns:</h2>

                                <p>
                                    <em><strong>from the list below</strong></em>
                                </p>
                            </article>
                        </div>
                        <div id="flyboxes">
                            <article class="article">
                                <h2>Build a New Fly Box:</h2>

                                <p>Add a fly box.</p>
                            </article>
                            <article class="article">
                                <h2>Edit Fly Boxes:</h2>

                                <p>
                                    <em><strong>from the list below</strong></em>
                                </p>
                            </article>
                        </div>
                        <div id="trips">
                            <article class="article">
                                <h2>Build a New Trip:</h2>

                                <p>Add a trip.</p>
                            </article>
                            <article class="article">
                                <h2>Edit Trips:</h2>

                                <p>
                                    <em><strong>from the list below</strong></em>
                                </p>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
