@extends('dashboard')

{{-- Page title --}}
@section('title')
    Posts
    @parent
@stop
{{-- content --}}
@section('cms')
<div class="row">
    <div class="col-md-10 col-md-offset-1" style="padding-top:25px;">
        <div id="posts">
            <posts></posts>
        </div>
    </div>
</div>
@stop
