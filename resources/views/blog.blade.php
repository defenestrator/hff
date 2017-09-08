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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/blog.css') }}">
    <!--end of page level css-->
@stop

@section('top')
@stop


{{-- Page content --}}
@section('content')
    <!-- Container Section Strat -->
    <div class="container">
        <h2>Blog</h2>
        <div class="row">
            <div class="content">
                <div class="col-md-12">
                    @forelse ($blogs as $blog)
                    <!-- BEGIN FEATURED POST -->
                    <div class="featured-post-wide thumbnail">
                        @if($blog->image)
                        <img src="{{ URL::to('/uploads/blog/'.$blog->image)  }}" class="img-responsive" alt="{{ $blog->title }}">
                        @endif
                        <div class="featured-text relative-left">
                            <h3 class="primary"><a href="{{ URL::to('blogitem/'.$blog->slug) }}">{{$blog->title}}</a></h3>
                            <p>
                                {!! $blog->content !!}
                            </p>
                            <p>
                                <strong>Tags: </strong>
                                @forelse($blog->tags as $tag)
                                    <a href="{{ URL::to('blog/'.mb_strtolower($tag).'/tag') }}">{{ $tag }}</a>,
                                @empty
                                    No Tags
                                @endforelse
                            </p>
                            <p class="additional-post-wrap">
                                <span class="additional-post">
                                    <i class="livicon" data-name="user" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i> by&nbsp;{{$blog->author->first_name . ' ' . $blog->author->last_name}}
                                </span>
                                <span class="additional-post">
                                    <i class="livicon" data-name="clock" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i>{{$blog->created_at->diffForHumans()}}
                                </span>
                                <span class="additional-post">
                                    <a href="{{ URL::to('blogitem/'.$blog->slug) }}"><i class="livicon" data-name="comment" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i>{{$blog->comments->count()}} comments</a>
                                </span>
                            </p>
                            <hr>
                            <p class="text-right">
                                <a href="{{ URL::to('blogitem/'.$blog->slug) }}" class="btn btn-primary text-white">{{ $smartass }}</a>
                            </p>
                        </div>
                        <!-- /.featured-text -->
                    </div>
                    <!-- /.featured-post-wide -->
                    <!-- END FEATURED POST -->
                    @empty
                        <h3>No Posts Exists!</h3>
                    @endforelse
                    <ul class="pager">
                        {!! $blogs->render() !!}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    
@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop
