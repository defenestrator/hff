<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostTagsController extends ContentController
{
    public function index(Post $post, $normalized)
    {
        $posts = $post->withAllTags([$normalized])->get();
        $smartass = $this->smartass;
        return view('publications.posts.index', compact('posts' , 'smartass'));
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
