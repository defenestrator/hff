<?php

namespace App\Http\Controllers;

use App\Post;
use App\Publication;
use Illuminate\Http\Request;

class PublishedPostsController extends Controller
{
    /**
     * @param Post $post
     * @param Publication $publication
     * @return $this
     */
    public function index(Post $post, Publication $publication)
    {
        $published = $publication->all('post_id');
        $posts = $post->whereIn('id', $published)->paginate(5);

        return view('publications.posts.index')->with('posts', $posts);
    }

    /**
     * @param Post $post
     * @param $slug
     * @return $this
     */
    public function show(Post $post, $slug)
    {
        $data = $post->where('slug', '=', $slug)->first();

        return view('publications.posts.show')->with('post', $data);
    }

}
