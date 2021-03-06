<?php


namespace App\Http\Controllers\Api;

use App\FishSpecies;
use Illuminate\Http\Request;

class FishSpeciesApiController extends ApiController

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FishSpecies::orderBy('created_at', 'desc')->paginate(50, ['common_name', 'id', 'genus', 'species']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, FishSpecies $fishSpecies)
    {
        $request->validate([
            'common_name' => 'required|min:2|max:140',
            'genus' => 'required|min:2|max:140',
            'slug' => 'required|unique:fish_species',
            'species' => 'required|min:2|max:140'
        ]);
        return $fishSpecies->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FishSpecies  $fishSpecies
     * @return \Illuminate\Http\Response
     */
    public function show(FishSpecies $fishSpecies, $id)
    {
        return $fishSpecies->where('id', $id)->first()->publication;
    }

    /**
     * @param FishSpecies $fishSpecies
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function edit(FishSpecies $fishSpecies, $id)
    {
        return $fishSpecies->where('id', '=', $id)->first();
    }

    /**
     * @param Request $request
     * @param FishSpecies $fishSpecies
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function update(Request $request, FishSpecies $fishSpecies, $id)
    {
        $request->validate([
            'common_name' => 'required|min:2|max:140',
            'genus' => 'required|min:2|max:140',
            'species' => 'required|min:2|max:140'
        ]);
        $content = $fishSpecies->find($id);

        $content->update([
            'header_photo' => $request['header_photo'],
            'common_name' => $request['common_name'],
            'genus' => $request['genus'],
            'species' => $request['species'],
            'description' => $request['description']
        ]
        );
        $content->save();
        return $content;
    }

    /**
     * @param FishSpecies $fishSpecies
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function destroy(FishSpecies $fishSpecies, $id)
    {
        $fishSpecies->destroy($id);
        return response()->json(['data' => 'ok']);
    }

}