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
        return Showcase::orderBy('updated_at', 'desc')->paginate(50, ['title', 'special', 'id']);
    }

    /**
     * @param Request $request
     * @param Showcase $showcase
     * @return mixed
     */
    public function create(Request $request, Showcase $showcase)
    {

        $request->validate([
            'slug' => 'unique:showcases,slug',
            'header_photo' => 'required|string',
            'title' => 'required|min:8',
            'tagline' => 'required|min:8',
            'body' => 'required|min:20',
            'image_id' => 'required|integer',
            'homepage_top' => 'required|min:3|max:40',
            'homepage_bottom' => 'required|min:3|max:40',
            'sidebar_top' => 'min:4',
            'sidebar_bottom' => 'min:4',
        ]);


        return $showcase->create($request->all());
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
            'body' => 'required|min:20',
            'title' => 'required|min:8',
            'tagline' => 'required|min:8',
            'header_photo' => 'required|string',
            'homepage_top' => 'required|min:3|max:40',
            'homepage_bottom' => 'required|min:3|max:40',
            'sidebar_top' => 'min:4',
            'sidebar_bottom' => 'min:4',
        ]);
        $content = $showcase->find($id);

        $content->update($request->all());
        $content->retag($request->tags);
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