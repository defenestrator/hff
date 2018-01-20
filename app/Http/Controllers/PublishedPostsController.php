<?php

namespace App\Http\Controllers;

use App\Post;
use App\Publication;
use App\Showcase;
use Illuminate\Http\Request;
use App\User;

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
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post, User $user, $slug)
    {
        return view('publications.posts.show',[
            'post' => $post->where('slug', '=', $slug)->first(),
            'author' => $user->where('id', '=', $item->user_id)->first()
        ]);
    }

}
