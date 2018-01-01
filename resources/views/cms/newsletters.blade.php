@extends('layouts.master')

{{-- Page title --}}
@section('title')
    Manage Posts
    @parent
@stop
@section('page_styles')
@stop

@section('top')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Manage Newsletters</h1>
                <hr>
            </div>
        </div>
    </div>
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div id="newsletters">
            <newsletters :user="user"></newsletters>
        </div>
    </div>
</div>
@stop
