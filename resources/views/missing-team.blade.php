@extends('layouts.master')
@section('title')
    Your team is missing
    @parent
@stop

@section('page_styles')
@stop

@section('top')

    <div class="text-center">
        <h3>
            Missing Team
        </h3>
    </div>
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-warning">
                <div class="panel-heading">Where's Your {{ ucfirst(Spark::teamString()) }}?</div>

                <div class="panel-body">
                    It looks like you're not part of any {{ Spark::teamString() }}! You can create one in your
                    <a href="/settings#/{{ str_plural(Spark::teamString()) }}">settings</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
