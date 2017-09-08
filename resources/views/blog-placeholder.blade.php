@extends('layouts/default')

{{-- Page title --}}
@section('title')
Blog
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/tabbular.css') }}">
    <!--end of page level css-->
@stop

@section('top')
@stop


{{-- Page content --}}
@section('content')
    <!-- Container Section Strat -->
<div class="container">
    <div class="row">
        <div class="content">
            <div class="col-md-12">
                <!-- BEGIN FEATURED POST -->
                <div class="featured-post-wide thumbnail">
                    <h3 class="text-center">Coming Soon!</h3>
                    <div class="featured-text relative-left">
                        <h3 class="primary"><a href="#">Blog Title</a></h3>
                        <article>
                            Blog Content
                        </article>
                        <p>
                            <strong>Tags: </strong>
                            <a href="#">tags</a>
                        </p>
                        <p class="additional-post-wrap">
                                <span class="additional-post">
                                    <i class="livicon" data-name="user" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i> by Shitty Author
                                </span>
                                <span class="additional-post">
                                    <i class="livicon" data-name="clock" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i> created_at->diffForHumans()
                                </span>
                                <span class="additional-post">
                                    <a href="#"><i class="livicon" data-name="comment" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i># of comments</a>
                                </span>
                        </p>
                        <hr>
                        <p class="text-right">
                            <a href="#" class="btn btn-primary text-white">be a smartass</a>
                        </p>
                    </div>
                </div>

                <!-- /.featured-text -->
            </div>
            </div>
        </div>
    </div>
</div>
    
@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop
