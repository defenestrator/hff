@extends('master')

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
                    <ul class="nav nav-tabs" style="border-bottom:none;">
                        <li class="active"><a href="#posts" data-toggle="tab">Posts</a></li>
                        <li><a href="#fish" data-toggle="tab">Fish</a>
                        </li>
                        <li><a href="#fisheries" data-toggle="tab">Fisheries</a>
                        </li>
                        <li><a href="#hatches" data-toggle="tab">Hatches</a>
                        </li>
                        <li><a href="#flies" data-toggle="tab">Flies</a>
                        </li>
                        <li><a href="#flyboxes" data-toggle="tab">Fly Boxes</a>
                        </li>
                        <li><a href="#trips" data-toggle="tab">Trips</a>
                        </li>
                        <li><a href="#outfitters" data-toggle="tab">Outfitters</a>
                        </li>
                    </ul>
                <div class="panel with-nav-tabs panel-default panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in out active" id="posts">
                            <posts></posts>
                        </div>
                        <div class="tab-pane fade in out" id="fish">
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
                        <div class="tab-pane fade in out" id="fisheries">
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
                        <div class="tab-pane fade in out" id="hatches">
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
                        <div class="tab-pane fade in out" id="flies">
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
                        <div class="tab-pane fade in out" id="flyboxes">
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
                        <div class="tab-pane fade in out" id="trips">
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
