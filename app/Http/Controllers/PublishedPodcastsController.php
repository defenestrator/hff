<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublishedPodcastsController extends Controller
{
    public function index(Request $request, Podcast $podcast, Publication $publication)
    {
        $published = $publication->all('post_id');
        $posts = $post->whereIn('id', $published)->paginate(5);
        return view('blog.index')->with(compact('posts', $posts));
    }
}
