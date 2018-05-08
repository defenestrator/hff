<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
use App\Transformers\Slugger;

class PostTagsController extends ContentController
{
    /**
     * @param Post $post
     * @param $normalized
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Post $post, $normalized)
    {
        $tag = $normalized;
        $tagPosts = $post->withAnyTags([$normalized])->orderBy('created_at', 'desc')->get();
        $pagetitle = 'Blog posts tagged "' . $this->slugger->titleify($normalized) .  '" at Hobo Fly Fishing';
        return view('publications.posts.tags', compact('tagPosts' , 'pagetitle', 'tag'));
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
