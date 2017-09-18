<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostTagsController extends Controller
{
    public function index(Post $post, $normalized)
    {
        $dingus = $post->withAllTags([$normalized])->get();
        return view('publications.posts.index')->with('posts', $dingus);
    }

    public function show(Post $post, $id)
    {
        return $post->withAllTags([$id])->get();
    }

    public function edit(Post $post, $id)
    {
        return $post->where('id', '=', $id)->first()->tag_array;
    }
}
