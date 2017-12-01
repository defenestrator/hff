<?php

namespace App\Http\Controllers;

use App\Post;
use App\Publication;
use App\Showcase;
use Illuminate\Http\Request;

class PublishedPostsController extends ContentController
{
    /**
     * @param Post $post
     * @param Showcase $showcase
     * @param Publication $publication
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Post $post, Showcase $showcase, Publication $publication)
    {
        $publishedShowcases = $showcase->published();
        $showcases = $publishedShowcases->sortByDesc('updated_at')->slice(0, 12);
        $published = $publication->all('post_id');
        $posts = $post->whereIn('id', $published)->orderBy('created_at', 'desc')->paginate(6);
        $pagetitle = $post->whereIn('id', $published)->orderBy('created_at', 'desc')->pluck('title')->first();
        return view('publications.posts.index', compact('posts', 'showcases', 'pagetitle'));
    }

    /**
     * @param Post $post
     * @param Showcase $showcase
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post, Showcase $showcase, $slug)
    {
        $showcases = $showcase->published()->sortByDesc('updated_at')->slice(0, 5);
//        $showcases = $showcase->published();
        $data = $post->where('slug', '=', $slug)->first();

        return view('publications.posts.show',['showcases'=>$showcases, 'post' => $data]);
    }

}
