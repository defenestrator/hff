@extends('dashboard')

{{-- Page title --}}
@section('title')
    Dashboard
@parent
@stop
{{-- content --}}
@section('cms')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="padding-top:25px;">
            <div class="panel with-nav-tabs panel-default panel-body">
                <div id="podcasts">
                    <form enctype='multipart/form-data' method="post" class="form-horizontal podcast" role="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-12">
                                <input name="title" class="form-control input" type="text" placeholder="Podcast Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input name="description" class="form-control input" type="text" placeholder="Podcast Description">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <select name="season" class="form-control input" type="select" placeholder="Podcast Season">
                                    <option value="1" selected>1</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input name="season" class="form-control input" type="number" placeholder="Podcast Episode">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <h2>Upload</h2>
                                <label>
                                    Upload a file<br>
                                    <input type="file" name="file" />
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>

                    <h2>Existing Files</h2>

                    <ul>
                        @forelse($files as $file)
                            <li><a href="{{ Storage::disk('DO')->url($file) }}">{{ Storage::disk('DO')->url($file) }}</a></li>
                        @empty
                            <li><em>No files to display.</em></li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
