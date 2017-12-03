@extends('layouts.master')

@section('title')
    Manage Showcases
    @parent
@stop
@section('page_styles')
@stop

@section('top')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Manage Showcases</h1>
                <hr>
            </div>
        </div>
    </div>
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div id="showcases">
            <showcases></showcases>
        </div>
    </div>
</div>
@stop
@section('page_scripts')

@endsection
