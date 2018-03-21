@extends('layouts.master')

{{-- Page title --}}
@section('title')
    Manage Fish Species
    @parent
@stop
@section('page_styles')
@stop

@section('top')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Manage Fish Species</h1>
                <hr>
            </div>
        </div>
    </div>
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div id="posts">
            <fish-species :user="user" dev="{{$dev}}" content-type="fish-species"></fish-species>
        </div>
    </div>
</div>
@stop
