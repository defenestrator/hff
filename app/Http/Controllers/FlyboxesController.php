<?php namespace App\Api\Http\Controllers;

use App\Api\Flybox;

/**
 * Class FlyboxesController
 *
 * @package Hatches\Http\Controllers
 */
class FlyboxesController extends Controller
{

    protected $fractal;

    protected $resourceKey = 'flybox';

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     *
     * @param \Illuminate\Http\Request $request
     * @internal param $
     */
    public function index(Request $request)
    {
        $countFlyboxes = Flybox::count();
        $limit = $request->input('limit', 25);

        if ($limit > 100) {
            return $this->respondBadRequest('Bad Request, Naughty Request! Limit maximum is 100 per page.');
        } elseif ($countFlyboxes < 1) {
            return $this->respondNotFound('There are no Users!?');
        } else {
            $flyboxes = Flybox::paginate($limit);

            return $this->fractal->paginatedCollection($flyboxes, new FlyboxTransformer, $this->resourceKey);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        FishSpecies::save();
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
