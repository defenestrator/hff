@extends('layouts.master')

@section('title')
{{$podcast->title}}
@parent
@stop

@section('page_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/blog.css') }}">
@stop

@section('top')
@stop

@section('content')
    <div class="container">
        <h3>Podcasts Coming, October 1st, 2017.</h3>
        <h2 class="primary marl12">{{ $podcast->title }}</h2>
        <div class="row content">
            <div class="col-sm-12 col-md-12">
                <div class=" podcast">

                    <div class="the-box no-border blog-detail-content">
                        <p class="additional-podcast-wrap">
                            <span class="additional-podcast">
                                    <i class="livicon" data-name="user" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i> Season <a href="#">{{ $podcast->season }}</a>
                                </span>
                            <span class="additional-podcast">
                                    <i class="livicon" data-name="clock" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i>Episode <a href="#"> {{$podcast->episode}} </a>
                                </span>
                        </p>
                        <p class="text-justify">
                            {!! $podcast->notes !!}
                        </p>
                        <p>
                            <strong>Tags: </strong>
                            @forelse($podcast->tags as $tag)
                                <a href="{{ URL::to('podcasts/'.mb_strtolower($tag->normalized).'/tag') }}">{{ $tag->name }}</a>,
                            @empty
                                No Tags
                            @endforelse
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
