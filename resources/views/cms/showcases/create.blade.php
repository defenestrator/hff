@extends('layouts.master')

@section('title')
    Elite Destination, Local Flavor - Hobo Fly Fishing
    @parent
@stop

@section('page_styles')
@stop

@section('top')
<div class="col-md-10 col-md-offset-1">
    <h1>Create Destination Showcase</h1>
    <hr>
</div>
@stop

@section('content')
<create-showcase inline-template>
    <div class="col-md-10 col-md-offset-1">
        <div class="alert alert-success" v-if="form.successful">
            Showcase was updated successfully!
        </div>
        <form enctype="multipart/form-data" class="form-horizontal new-post" role="form">
            <div class="form-group">
                <div class="col-md-12">
                    <p role="presentation" name="title">Title: @{{form.title}} </p>
                    <input name="title" v-model="form.title" :class="{'form-control': true, 'input': true,
                    'has-error': form.errors.has('title') }" type="text" placeholder="Showcase Title" style="width:100%">
                    <span v-show="form.errors.has('title')" class="help is-danger">@{{ errors.first('title') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div name="slug">slug: @{{form.slug}} </div>
                    <span v-show="form.hasErrors" class="help is-danger">@{{ form.hasErrors }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <h4 role="presentation">Fishery Type: @{{ form.fishery_type }}</h4>
                    <input class="form-control input" name="fishery_type" v-model="form.fishery_type" placeholder="Fishery Type" />
                </div>
                <div class="col-md-6">
                    <h4 role="presentation">Region: @{{ form.region }}</h4>
                    <input class="form-control input" name="region" v-model="form.region" placeholder="Region" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <h4 role="presentation">Sub-header: @{{ form.tagline }}</h4>
                    <input class="form-control input" name="tagline" v-model="form.tagline" placeholder="Make it a zinger" />

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <h4 role="presentation">Showcase Body:</h4>
                    <trumbowyg id="trumbowyg" :config="trumbowygConfig" name="body" v-model="form.body"></trumbowyg>
                    <span v-if="form.hasErrors" class="help is-danger">
                        Get your shit together. Write something worth reading.
                    </span>
                </div>
            </div>
            <div>
                <div class="col-md-6">
                    <h4 role="presentation">Sidebar Top:</h4>
                    <trumbowyg id="sidebar-top-trumbowyg" :config="trumbowygConfig" name="sidebar_top"
                               v-model="form.sidebar_top"></trumbowyg>
                    <span v-if="form.hasErrors" class="help is-danger">
                    @{{ form.errors.sidebar_top }}
                </span>
                </div>
                <div class="col-md-6">
                    <h4 role="presentation">Sidebar Bottom:</h4>
                    <trumbowyg id="sidebar-bottom-trumbowyg" :config="trumbowygConfig" name="sidebar_bottom"
                               v-model="form.sidebar_bottom"></trumbowyg>
                <span v-if="form.hasErrors" class="help is-danger">
                    @{{ form.errors.sidebar_bottom }}
                </span>
                </div>
            </div>

            <!-- Update Button -->
            <div class="form-group">
                <div class="col-md-12">
                    <label type="button" class="btn btn-primary btn-upload" :disabled="form.busy">
                        <span>Select Header Photo</span>
                        <input ref="header_photo" type="file" class="form-control" name="header_photo" @change="update">
                    </label>
                    <div role="img" class="header-photo-preview"
                         :style="previewStyle">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': form.hasErrors }"
                            @click.prevent="save" :disabled="form.busy">
                            <span v-if="form.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Updating
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Save
                            </span>
                    </button>
                </div>
            </div>
            </form>
        <div class="alert alert-success" v-if="form.successful">
            Showcase was updated successfully!
        </div>
    </div>
</create-showcase>

@stop
@section('bottom')


@section('page_scripts')
    <script>
        new WOW().init();
    </script>
@stop