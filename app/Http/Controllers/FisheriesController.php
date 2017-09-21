<?php namespace App\Http\Controllers;

use App\Fishery;

/**
 * Class FisheriesController
 * @package App\Http\Controllers
 */
class FisheryController extends ContentController
{

    /**
     * A New instance of this controller
     * uses 'auth' middleware
     */
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     * GET /fisheries
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param $
     * @internal param $
     */
    public function index(Request $request)
    {
        $limit = intval($request->input('limit', 25));
        $countFisheries = Fishery::count();

        if ($limit >= 100) {
            return $this->respondBadRequest('Maximum response limit is 100');
        } elseif ($countFisheries < 1) {
            return $this->respondNotFound('There are no Fisheries!?');
        } else {
            $fishery = Fishery::paginate($limit);

            return response()->json([
                'data' => $fishery
            ],
                200
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     * GET /fisheries/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /fisheries
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /fisheries/{id}
     *
     * @param  int $id
     * @param Response $response
     * @param FisheryTransformer $fisheryTransformer
     * @return Response
     * @internal param $
     */
    public function show($id, Response $response, FisheryTransformer $fisheryTransformer)
    {
        $fishery = Fishery::find($id);
        if (!$fishery) {
            return $this->respondNotFound('This fishery does not exist');
        }

        return $response->setContent(['data' => $fisheryTransformer->transform($fishery)], 200);
    }

    /**
     * Show the form for editing the specified resource.
     * GET /fisheries/{id}/edit
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
     * PUT /fisheries/{id}
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
     * DELETE /fisheries/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}