<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Showcase;


class TagsController extends Controller
{
    /**
     * @param Post $post
     * @param Showcase $showcase
     * @param $normalized
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Post $post, Showcase $showcase, $normalized)
    {

        $posts = $post->withAnyTags([$normalized])->orderBy('created_at', 'desc')->get(['created_at', 'header_photo', 'title', 'body']);
        $showcases = $showcase->withAnyTags([$normalized])->orderBy('created_at', 'desc')->get(['created_at', 'header_photo', 'title', 'body']);
        $contents = $showcases->merge($posts)->sortByDesc('created_at');
        $pagetitle = 'All content for '."'$normalized'" . ' tag';
        return view('tags.index', compact('contents', 'pagetitle'));
    }

    public function show(Post $post, $id)
    {
        return $post->withAllTags([$id])->get();
    }

}
