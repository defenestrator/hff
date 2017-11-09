<?php

namespace App\Http\Controllers;

use App\Deployment;
use Illuminate\Http\Request;

class DeploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'payload.outcome' => 'required'
        ]);
        Deployment::create([
            'payload' => $request
        ]);
        if ($request->input('payload.outcome') == 'success') {
            // create a new cURL resource
            $ch = curl_init();
            // set URL and other appropriate options
            curl_setopt($ch, CURLOPT_URL, config('app.deploy'));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            // grab URL and pass it to the browser
            curl_exec($ch);
            // close cURL resource, and free up system resources
            curl_close($ch);
            return response(201);
        }
        return response(201);

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
     * @param  \App\Deployment  $deployment
     * @return \Illuminate\Http\Response
     */
    public function show(Deployment $deployment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deployment  $deployment
     * @return \Illuminate\Http\Response
     */
    public function edit(Deployment $deployment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deployment  $deployment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deployment $deployment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deployment  $deployment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deployment $deployment)
    {
        //
    }
}
