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
        $published = $publication->all('post_id');
        $posts = $post->whereIn('id', $published)->orderBy('created_at', 'desc')->paginate(3);
        $pagetitle = ", latest post: " . $post->whereIn('id', $published)->orderBy('created_at', 'desc')->pluck('title')->first();
        return view('publications.posts.index', compact('posts', 'pagetitle'));
    }

    /**
     * @param Post $post
     * @param Showcase $showcase
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post, Showcase $showcase, $slug)
    {
        $data = new $post([
            'user_id'  => 0,
            'author' => 'Nobody Nullington',
            'header_photo' => '/images/tangle.jpg',
            'body'  => 'There is nothing here, sorry.',
            'title' => "There is no post called: ". "'".$this->slugger->titleify($slug)."'",
            'slug' => $slug
        ]);
        if ($post->where('slug', '=', $slug)->count() > 0){

            $data = $post->where('slug', '=', $slug)->first();

        }
        return view('publications.posts.show',['post' => $data]);
    }

}
