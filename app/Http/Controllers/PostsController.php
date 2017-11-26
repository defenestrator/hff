<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends ContentController

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(50, ['title', 'author', 'body', 'slug', 'created_at', 'id']);
        return view('cms.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|min:8',
            'slug' => 'required|alpha_dash|unique:posts,slug',
            'title' => 'required|min:2'
        ]);
        return $post->create([
            'user_id'  => $request->user_id,
            'author' => $request->author,
            'body'  => $request->body,
            'title' => $request->title,
            'slug' => $request->slug
        ])->tag($request->tags);
    }

    /**
     * @param Post $post
     * @param $id
     * @return \App\Publication|mixed
     */
    public function show(Post $post, $id)
    {
        return $post->where('id', $id)->first()->publication;
    }

    /**
     * @param Post $post
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function edit(Post $post, $id)
    {
        return view('cms.posts.edit', ['post' => $post->where('id', '=', $id)->first()]);
    }

    /**
     * @param Request $request
     * @param Post $post
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Post $post, $id)
    {
        $request->validate([
            'body' => 'required|min:8',
            'title' => 'required|min:2'
        ]);
        $content = $post->find($id);

        $content->tag($request->tags);
        $content->save();
        return $content;
    }

    /**
     * @param Post $post
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function destroy(Post $post, $id)
    {
        $post->destroy($id);
        return response()->json(['data' => 'ok']);
    }
}
