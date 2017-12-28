<?php


namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;

class PostsApiController extends ApiController

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::orderBy('created_at', 'desc')->paginate(50, ['title', 'id', 'user_id', 'author']);
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
            'title' => 'required|min:2',
            'image_id' => 'required|integer',
            'header_photo' => 'required'
        ]);
        return $post->create([
            'user_id'  => $request->user_id,
            'author' => $request->author,
            'header_photo' => $request->header_photo,
            'image_id' => $request->image_id,
            'body'  => $request->body,
            'title' => $request->title,
            'slug' => $request->slug
        ])->tag($request->tags);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
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
        return $post->where('id', '=', $id)->first();
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
            'title' => 'required|min:2',
            'header_photo' => 'required'
        ]);
        $content = $post->find($id);

        $content->update([
            'body'  => $request->body,
            'title' => $request->title,
            'image_id' => $request->image_id,
            'header_photo' => $request->header_photo,
        ]);
        $content->retag($request->tags);
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