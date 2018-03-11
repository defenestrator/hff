<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Showcase;
class SearchApiController extends Controller
{
    public function filter(Post $post, Showcase $showcase, Request $request)
    {
        $posts = $post->search($request->get('query'))->orderBy('created_at', 'desc')->get()->map(function($post){
            $post['type'] = 'Blog Post';
            $post['link'] = '/publications/posts/'. $post['slug'];
            return $post;
        });
        $showcases = $showcase->search($request->get('query'))->orderBy('created_at', 'desc')->get()->map(function($showcase){
            $showcase['type'] = 'Fly Fishing Destination';
            $showcase['link'] = '/publications/showcases/'. $showcase['slug'];
            return $showcase;
        });
        $results = $showcases->merge($posts)->sortByDesc('created_at');
        // If there are results return them, if none, return the error message.
        return $results;
    }
}
