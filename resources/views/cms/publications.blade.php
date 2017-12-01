@extends('layouts.master')

{{-- Page title --}}
@section('title')
    Manage Publications
    @parent
@stop
@section('page_styles')
@stop

@section('top')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Manage Publications</h1>
                <hr>
            </div>
        </div>
    </div>
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <publications></publications>
    </div>
</div>
@stop
