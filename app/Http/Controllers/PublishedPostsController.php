<?php

namespace App\Http\Controllers;

use App\Post;
use App\Publication;
use Illuminate\Http\Request;

class PublishedPostsController extends Controller
{
    /**
     * @param Request $request
     * @param Post $post
     * @param Publication $publication
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Post $post, Publication $publication)
    {
        $published = $publication->all('post_id');

        $posts = $post->whereIn('id', $published)->paginate();
        return view('blog.index')->with('posts', $posts);
    }
}
