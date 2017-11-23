<?php


namespace App\Http\Controllers\Api;

use App\Showcase;
use Illuminate\Http\Request;
use Storage;
class ShowcasesApiController extends ApiController
{

    /**
     * @return mixed
     */
    public function index()
    {
        return Showcase::paginate(50, ['title', 'author', 'body', 'slug', 'created_at', 'id']);
    }

    /**
     * @param Request $request
     * @param Showcase $showcase
     * @return mixed
     */
    public function create(Request $request, Showcase $showcase)
    {

        $request->validate([
            'body' => 'required|min:8',
            'slug' => 'required|alpha_dash|unique:posts,slug',
            'title' => 'required|min:8',
            'tagline' => 'required|min:8',
            'header_photo' => 'required|string',
            'region' => 'required|min:3',
            'fishery_type' => 'required|min:3',
            'sidebar_top' => 'required|min:4',
            'sidebar_bottom' => 'required|min:4',
        ]);


        return $showcase->create([
            'body' => $request->body ,
            'slug' => $request->slug ,
            'title' => $request->title ,
            'tagline' => $request->tagline ,
            'header_photo' => $request->header_photo ,
            'thumbnail' => $request->thumbnail,
            'region' => $request->region ,
            'fishery_type' => $request->fishery_type ,
            'sidebar_top' => $request->sidebar_top ,
            'sidebar_bottom' => $request->sidebar_bottom ,
        ]);
    }

    /**
     * @param Showcase $showcase
     * @param $id
     * @return mixed
     */
    public function show(Showcase $showcase, $id)
    {
        return $showcase->where('id', $id)->first()->publication;
    }

    /**
     * @param Showcase $showcase
     * @param $id
     * @return mixed
     */
    public function edit(Showcase $showcase, $id)
    {
        return $showcase->where('id', '=', $id)->first();
    }

    /**
     * @param Request $request
     * @param Showcase $showcase
     * @param $id
     * @return mixed
     */
    public function update(Request $request, Showcase $showcase, $id)
    {
        $request->validate([
            'body' => 'required|min:8',
            'title' => 'required|min:2'
        ]);
        $content = $showcase->find($id);

        $content->update([
            'body'  => $request->body,
            'title' => $request->title
        ]);
        $content->tag($request->tags);
        $content->save();
        return $content;
    }

    /**
     * @param Showcase $showcase
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Showcase $showcase, $id)
    {
        $showcase->destroy($id);
        return response()->json(['data' => 'ok']);
    }
}