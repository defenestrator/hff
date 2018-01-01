<?php


namespace App\Http\Controllers\Api;

use App\Newsletter;
use Illuminate\Http\Request;

class NewslettersApiController extends ApiController

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Newsletter::orderBy('created_at', 'desc')->paginate(50, ['subject', 'id', 'sent_on']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'body' => 'required|min:8',
            'subject' => 'required|min:2'
        ]);
        return $newsletter->create([
            'body' => $request->body,
            'subject' => $request->subject
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter, $id)
    {
        return $newsletter->where('id', $id)->first();
    }

    /**
     * @param Newsletter $newsletter
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function edit(Newsletter $newsletter, $id)
    {
        return $newsletter->where('id', '=', $id)->first();
    }

    /**
     * @param Request $request
     * @param Newsletter $newsletter
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Newsletter $newsletter, $id)
    {
        $request->validate([
            'body' => 'required|min:8',
            'subject' => 'required|min:2'
        ]);

        $content = $newsletter->find($id);

        $content->update([
            'body'  => $request->body,
            'subject' => $request->subject
        ]);
        $content->save();
        return $content;
    }

    /**
     * @param Newsletter $newsletter
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function destroy(Newsletter $newsletter, $id)
    {
        $newsletter->destroy($id);
        return response()->json(['data' => 'ok']);
    }
}