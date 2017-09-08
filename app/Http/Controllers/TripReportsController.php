<?php namespace App\Api\Http\Controllers;

use App\TripReport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TripReportsController extends ApiController
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     * @internal param $
     */
    public function index(Request $request, Response $response)
    {
        $countUsers = TripReport::count();
        $limit = $request->input('limit', 25);

        if ($limit > 100) {
            return $this->respondBadRequest('Bad Request, Naughty Request! Limit maximum is 100 per page.');
        } elseif ($countUsers == 0) {
            return $this->respondNotFound('There are no Trip Reports!?');
        } else {
            $tripReport = TripReport::paginate($limit);

            return $response->setContent([
                'data' => ''
            ], 200
            );
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
        //
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
