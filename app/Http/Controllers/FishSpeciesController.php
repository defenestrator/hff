<?php namespace App\Http\Controllers;

use App\FishSpecies;

/**
 * Class FishSpeciesController
 *
 * @package Hatches\Http\Controllers
 */
class FishSpeciesController extends ContentController
{

    protected $fractal;

    protected $resourceKey = 'fish-species';

    public function __construct(Larasponse $fractal)
    {
        $this->fractal = $fractal;
    }

    /**
     * Display a listing of the resource.
     *
     *
     * @param \Illuminate\Http\Request $request
     * @return \Hatches\Http\Controllers\Response
     * @internal param $
     */
    public function index(Request $request)
    {
        $countFishSpecies = FishSpecies::count();
        $limit = $request->input('limit', 25);

        if ($limit > 100) {
            return $this->respondBadRequest('Bad Request, Naughty Request! Limit maximum is 100 per page.');
        } elseif ($countFishSpecies < 1) {
            return $this->respondNotFound('There are no Users!?');
        } else {
            $fishSpecies = FishSpecies::paginate($limit);

            return $this->fractal->paginatedCollection($fishSpecies, new FishSpeciesTransformer, $this->resourceKey);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $data
     * @return Response
     */
    public function create($data)
    {
        $this->fishSpecies([$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $data
     * @return Response
     */
    public function store($data)
    {
        $this->save([$data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
