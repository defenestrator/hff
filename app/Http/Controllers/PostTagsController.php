<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class PostTagsController extends Controller
{
    public function index(Post $post, $slug)
    {
        $dingus = $post->withAllTags([$slug])->get();
        return view('publications.posts.index')->with('posts', $dingus);
    }
}
