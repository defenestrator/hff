@extends('layouts.master')

@section('content')
<new-post></new-post>
<p>
    <span class="taglinks"><strong>Current Tags: </strong>
        @forelse($post->tags as $tag)
            <a href="{{ URL::to('posts/'. $tag->normalized .'/tag') }}">{{ $tag->name }}</a>,
        @empty
            No Tags
        @endforelse
    </span>
</p>
@stop
