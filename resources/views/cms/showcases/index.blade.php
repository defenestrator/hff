@extends('layouts.master')

@section('title')
    Edit you up some fancy posts, cowboy!
    @parent
@stop

@section('page_styles')
    <style>
        .help.is-danger {
            color : #ef6f6c;
        }
        .btn.is-danger {
            border-color: #ef6f6c;
            outline: 0;
            box-shadow: inset 0 0 2px red, 0 0 4px red;
        }
        .btn.btn-warning.is-success {
            border-color: #0A8A4A;
            outline: 0;
            box-shadow: inset 0 0 2px #0A8A4A, 0 0 4px #0A8A4A;
            background-color:transparent;
            color: #0A8A4A;
        }
        .btn-warning.disabled:hover, .btn-warning[disabled]:hover,
        fieldset[disabled] .btn:hover,
        .btn.disabled:focus, .btn[disabled]:focus,
        fieldset[disabled] .btn:focus {
            background-color:transparent;
            border:none;
            outline: 0;
        }
        input.is-danger, textarea.is-danger {
            border-color: #ef6f6c;
            outline: 0;
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(239, 111, 108, 0.6);
        }
        .ql-container.ql-snow {
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .ql-toolbar.ql-snow {
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }
        @media (max-width: 991px) {
            .new-post .btn
            {
                width:100%;
                padding:1.34em;
                margin: 0.66em 0;
            }
        }
        .post-index {
            position:relative;
            display:block
        }
    </style>
@stop

@section('top')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Blog Post Listing</h1>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div id="index-post">
            <a href="/cms/posts/create">
                <button  role="button" id="create" class="btn btn-create">
                    New Post
                </button>
            </a>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-inverse">
                        <thead  class="thead-inverse">
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody class="resource-list">
                        @foreach($posts as $post)
                        <tr class="table-hover">
                            <td><strong>{{ $post->title }}</strong></td>
                            <td>{{ $post->author }}</td>
                            <td><a href="/cms/posts/{{$post->id}}/edit"><button role="button" class="btn btn-warning">Edit</button></a></td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop