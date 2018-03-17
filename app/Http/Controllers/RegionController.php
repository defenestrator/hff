<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Publication;
use App\Post;

class RegionController extends ContentController
{

    /**
     * @param Publication $publication
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Publication $publication, Post $post)
    {
        $puBlogs = $publication->all('post_id');
        $posts = $post
            ->whereIn('id', $puBlogs)
            ->orderBy('created_at', 'desc')
            ->take(40)->get()
            ->map( function ($post) {
                $post['sentence'] = str_limit(strip_tags($post->body), 200, '...');
                // can also surround that with this, maybe break on sentence? preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', )
                return $post;
            });
        $pagetitle = 'Fly fishing regions of the world';
        return view('regions.index', compact('pagetitle', 'posts'));
    }

    /**
     * @param Region $region
     * @param $slug
     * @return $this
     */
    public function show(Region $region, $slug)
    {
        $title = $this->slugger->titleify($slug);
        $data = new $region([
            'special'=> false,
            'slug' => $title ,
            'tagline' => 'Doesn\'t exist' ,
            'thumbnail' => '/images/tangle.jpg',
            'region' => 'utopia' ,
            'fishery_type' => 'noncorporeal' ,
            'sidebar_top' => 'Nothing' ,
            'sidebar_bottom' => 'More nothing' ,
            'header_photo' => '/images/tangle.jpg',
            'body'  => 'There is nothing here, sorry.',
            'title' => "'" . $title . "'",
        ]);
        if ($region->where('slug', '=', $slug)->count() > 0) {
            $data = $region->where('slug', '=', $slug)->first();
        }
        return view('regions.show')->with('region', $data);
    }
}
