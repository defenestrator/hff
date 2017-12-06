<?php

namespace App\Http\Controllers;
use App\Showcase;
use App\Publication;
use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    protected $showcase;
    protected $publication;
    protected $post;

    /**
     * HomeController constructor.
     * @param Showcase $showcase
     * @param Publication $publication
     * @param Post $post
     */
    public function __construct(Showcase $showcase, Publication $publication, Post $post)
    {
        $this->publication = $publication;
        $this->showcase = $showcase;
        $this->post = $post;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $puBlogs = $this->publication->all('post_id');
        $posts = $this->post
                    ->whereIn('id', $puBlogs)
                    ->orderBy('created_at', 'desc')
                    ->take(3)->get()
                    ->map( function ($post) {
                        $post['sentence'] = str_limit(strip_tags($post->body), 200, '...');
                        // can also surround that with this, maybe break on sentence? preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', )
                        return $post;
                    });

        $puShowcases = $this->publication->all('showcase_id');
        $showcases = $this->showcase->whereIn('id', $puShowcases)->orderBy('updated_at', 'desc')->paginate(27);

        return view('home', compact('showcases', 'posts'));
    }
}
