@extends('layouts.master')

{{-- Page title --}}
@section('title')
    Manage Showcases
    @parent
@stop
@section('page_styles')
@stop

@section('top')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h1>Manage Showcases</h1>
        <hr>
    </div>
</div>
@stop
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div id="posts">
            <showcases></showcases>
        </div>
    </div>
</div>
@stop
