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
        $showtype = collect(['type' => 'showcase']);
        $postype = collect(['type' => 'post']);

        $posts = $post->withAnyTags([$normalized])->get()->map(function($post){
            $post['type'] = 'posts';
            return $post;
        });
        $showcases = $showcase->withAnyTags([$normalized])->get()->map(function($showcase){
            $showcase['type'] = 'showcases';
            return $showcase;
        });
        $contents = $showcases->merge($posts)->sortByDesc('created_at');

        $pagetitle = 'All content for '."'$normalized'" . ' tag';
        return view('tags.index', compact('contents', 'pagetitle'));
    }

    public function show(Post $post, $id)
    {
        return $post->withAllTags([$id])->get();
    }

}
