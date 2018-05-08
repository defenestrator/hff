<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Showcase;
use App\Transformers\Slugger;

class TagsController extends Controller
{
    protected $slugger;
    public function __construct(Slugger $slugger)
    {
        $this->slugger = $slugger;
    }

    /**
     * @param Post $post
     * @param Showcase $showcase
     * @param $normalized
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Post $post, Showcase $showcase, $normalized)
    {
        $posts = $post->withAnyTags([$normalized])->get()->map(function($post){
            $post['type'] = 'posts';
            return $post;
        });
        $showcases = $showcase->withAnyTags([$normalized])->get()->map(function($showcase){
            $showcase['type'] = 'showcases';
            return $showcase;
        });
        $contents = $showcases->merge($posts)->sortByDesc('created_at');

        $pagetitle = 'Everything tagged "'. $this->slugger->titleify($normalized) . '" at Hobo Fly Fishing';
        return view('tags.index', compact('contents', 'pagetitle'));
    }

    public function show(Post $post, $id)
    {
        return $post->withAllTags([$id])->get();
    }

}
