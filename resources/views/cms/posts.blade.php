@extends('dashboard')

{{-- Page title --}}
@section('title')
    Posts
    @parent
@stop
{{-- content --}}
@section('cms')
<div class="row">
    <div class="col-md-10 col-md-offset-0" style="padding-top:25px;">
        <div class="panel panel-default panel-body">
            <div id="posts">
                <posts></posts>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-md-offset-0" style="padding-top:25px;">
        <div class="panel panel-default panel-body">
            <div id="post-list">
            </div>
        </div>
    </div>
</div>
@stop
