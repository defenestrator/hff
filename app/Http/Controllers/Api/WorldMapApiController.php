<?php

namespace App\Http\Controllers\Api;

use App\Destination;
use App\Showcase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorldMapApiController extends Controller
{
    /**
     * @param Destination $destination
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Destination $destination, Showcase $showcase)
    {
        $showcases = $showcase->all();
        $destinations = $destination->orderBy('created_at', 'desc')->get()->map(function ($destination) {
            $destination['position'] = ['lat' => (float) $destination['lat'], 'lng' => (float) $destination['lng']];
            $destination['infoText'] = $destination['description'];
            return $destination;
        });

        return $destinations;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        //
    }
}
