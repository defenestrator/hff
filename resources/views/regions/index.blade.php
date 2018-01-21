@extends('layouts.master')

{{-- Page title --}}
@section('title')
      {{$pagetitle}}
@parent
@stop

@section('page_styles')
@stop

@section('top')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-sm-offset-0">
                <h4>Jump to:</h4>
            </div>
        </div>
        @foreach(array_chunk($regions->all(), 2) as $regionRow)
            <div class="row">
                @foreach($regionRow as $region)
                    <div class="col-xs-6">
                        @if($region->id != 0)

                            <a class="text-center" href="#{{$region->slug}}" title="{{$region->name}}">
                                <i class="fa fa-globe" aria-hidden="true"></i> {{$region->name}}
                            </a>
                        @endif
                    </div>
                @endforeach

            </div>
        @endforeach
    </div>
@stop
@section('content')
<hr>

<div class="row">
    <div class="col-md-8 col-md-offset-0">
    @foreach($regions as $region)
        @if($region->id != 0)
            <div>
                <h2 style="font-weight:bold; border-bottom:2px solid #c5c7ca; padding:1em; padding-left:0.2em;">
                    <i class="fa fa-globe" aria-hidden="true"></i>
                    <a class="text-center" id="{{$region->slug}}" href="/regions/{{$region->slug}}" title="{{$region->name}}">
                    {{$region->name}}
                    </a>
                </h2>
                @foreach($showcases->sortBy('title') as $showcase)
                    @if($region->id == $showcase->region_id)
                    <div class="article showcase">
                        <h3 class="primary"><a href="/showcases/{{$showcase->slug}}">{{$showcase->title}}</a></h3>
                        <p><a href="/showcases/{{$showcase->slug}}">
                                <img style="width:100%;" src="{{$showcase->header_photo}}" alt="{{$showcase->title}}" title="{{$showcase->title}}">
                            </a></p>
                        <article>
                            <p><a style="color:rgb(83, 89, 101);" href="/showcases/{{$showcase->slug}}">
                                    {!! str_limit(strip_tags($showcase->body), 200, '...') !!}
                                </a>
                            </p>
                        </article>
                        <p class="additional-showcase-wrap">
                            <span class="taglinks">Tags:
                                @forelse($showcase->tags as $tag)
                                    <a href="{{ URL::to('showcases/'. $tag->normalized .'/tag') }}">{{ $tag->name }}</a>,
                                @empty
                                    No Tags
                                @endforelse
                            </span>
                        </p>
                    </div>
                        <hr>
                    @endif
                @endforeach
            </div>
            @endif
        @endforeach
    </div>
    <div class="col-md-4 col-md-offset-0">
        <h4 class="text-center" style="font-weight:bold;"><a href="/publications/posts">FROM THE HOBO BLOG</a></h4>
        @foreach($posts->take(40) as $post)
            <div class="col-sm-12">
                <div class="post">
                    <div class="article">
                        <h2 class="primary"><a href="/publications/posts/{{$post->slug}}">{{$post->title}}</a></h2>
                        <a href="/publications/posts/{{$post->slug}}">
                            <div class="latest-posts-image"
                                 style="background:url('{{$post->header_photo}}') no-repeat; background-size:cover;">
                            </div>
                        </a>
                        <a style="color:rgb(83, 89, 101);" href="/publications/posts/{{$post->slug}}">
                            {!! str_limit(strip_tags($post->body), 200, '...') !!}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@stop

@section('page_scripts')

@stop
