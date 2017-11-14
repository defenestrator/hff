@extends('layouts.master')

@section('title')
    Edit you some posts, fancy cowboy!
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
            <h1>Edit {{$post->title}}</h1>
        </div>
    </div>
@stop

@section('content')
    <edit-post class="row"
               post_body="{{$post->body}}"
               post_title="{{$post->title}}"
               post_id="{{$post->id}}"
               id="edit-post"
               name="edit-post"
               inline-template>
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal new-post" role="form">
                <div class="form-group">
                    <div class="col-md-12">
                        <input v-validate="'required|min:2'" name="title" v-model="editPost.title"
                               :class="{'form-control': true, 'input': true, 'is-danger': errors.has('title') }"
                               type="text" placeholder="Post Title" style="width:100%" value="{{$post->title}}">
                        <span v-show="errors.has('title')" class="help is-danger">@{{ errors.first('title') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <trumbowyg id="trumbowyg"
                                   :config="trumbowygConfig"
                                   name="body"
                                   v-validate="'required|min:4'"
                                   v-model="editPost.body">

                        </trumbowyg>
                        <span v-show="editPost.saveError" class="help is-danger">
                        Get your shit together. Write something worth reading, won't you please?.
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input-tag class="input-tag" name="tags" v-model="editPost.tags" :tags="editPost.tags" placeholder="add tag"></input-tag>
                        <label>Spaces are allowed! Use ENTER/RETURN key, or type a comma to separate tags.</label>
                    </div>
                </div>
                <div class="form-group">
                    <div v-show="editPost.postId" class="col-md-2 col-sm-12">
                        <button :class="{'btn': true, 'btn-primary': true, 'is-danger': editPost.saveError }" @click.prevent="update" :disabled="editPost.saveDisabled">
                        <span v-if="editPost.saveBusy">
                            <i class="fa fa-btn fa-spinner fa-spin"></i>Updating
                         </span>
                        <span v-else-if="editPost.saved">
                            <i class="fa fa-btn fa-check-circle"></i>Saved!
                         </span>
                    <span v-else-if="editPost.saved == false">
                            <i class="fa fa-btn fa-check-circle"></i>Update
                         </span>
                        <span v-else>
                            <i class="fa fa-btn fa-check-circle"></i>Updated
                        </span>

                        </button>
                    </div>
                    <div v-show="! editPost.postId" class="col-md-2 col-sm-12">
                        <button :class="{'btn': true, 'btn-primary': true, 'is-danger': editPost.saveError }" @click.prevent="save" :disabled="editPost.saveDisabled">
                        <span v-if="editPost.saveBusy">
                            <i class="fa fa-btn fa-spinner fa-spin"></i>Saving
                         </span>
                        <span v-else-if="editPost.postId !== null">
                            <i class="fa fa-btn fa-check-circle"></i>Saved!
                         </span>
                        <span v-else>
                            <i class="fa fa-btn fa-check-circle"></i>Save
                        </span>
                        </button>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <button :class="{'btn': true, 'btn-warning': true, 'is-success': editPost.published }"  @click.prevent="publish" :disabled="editPost.published">
                    <span v-if="editPost.publishBusy">
                            <i class="fa fa-btn fa-spinner fa-spin"></i>Publishing
                         </span>
                         <span class="is-success" v-else-if="editPost.published !== null">
                            <i class="fa fa-btn btn-success fa-newspaper-o"></i>Published!
                         </span>
                        <span v-else>
                            <i class="fa fa-btn fa-newspaper-o"></i>Publish
                        </span>
                        </button>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <button @click.prevent="unpublish" :class="{'btn': true, 'btn-warning': true, 'hidden': ! editPost.published }">
                            Unpublish
                        </button>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <button @click.prevent="leeroyjenkins" :class="{'btn': true, 'btn-danger': true, 'hidden': editPost.published }" :disabled="! editPost.postId">
                            Delete
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </edit-post>
@stop