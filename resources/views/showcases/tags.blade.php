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
            <div class="col-md-12 col-md-offset-0">
                <h1> {{$pagetitle}}</h1>
                <h4><a href="/tag/{{$tag}}">Show all results for the '{{$tag}}' tag</a></h4>

            </div>
        </div>
    </div>
@stop

@section('content')
<div class="row">
        <div class="col-md-12 col-md-offset-0">
            @if(count($tagShowcases) == 0)
                <h2>Sorry, there are no showcases with the '{{$tag}}' tag</h2>
            @endif
            @foreach($tagShowcases as $showcase)
                <div class="article showcase">
                    <div class="featured-text relative-left">
                        <h2 class="primary"><a href="/showcases/{{$showcase->slug}}">{{$showcase->title}}</a></h2>
                        <a href="/showcases/{{$showcase->slug}}">
                            <img style="width:100%;" src="{{$showcase->header_photo}}" alt="{{$showcase->title}}" title="{{$showcase->title}}">
                        </a>
                        <article>
                            <a style="color:rgb(83, 89, 101);" href="/showcases/{{$showcase->slug}}">
                                <p>{!! Illuminate\Support\Str::limit(strip_tags($showcase->body), 200, '...') !!}</p>
                            </a>
                        </article>
                        <p class="additional-showcase-wrap">
                            <span class="text-right">
                                <a href="/publications/showcases/{{ $showcase->slug }}"> <button class="btn btn-primary">Read More</button></a>
                            </span>
                        </p>
                        <p>
                            <span class="taglinks">Tags:
                                @forelse($showcase->tags as $tag)
                                    <a href="{{ URL::to('showcases/'. $tag->normalized .'/tag') }}">{{ $tag->name }}</a>,
                                @empty
                                    No Tags
                                @endforelse
                            </span>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop

@section('page_scripts')

@stop
