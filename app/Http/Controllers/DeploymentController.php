<?php

namespace App\Http\Controllers;

use App\Deployment;
use Illuminate\Http\Request;

class DeploymentController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'payload.outcome' => 'required'
        ]);

        Deployment::create([
            'payload' => $request->getContent('payload')
        ]);

        if ($request->input('payload.outcome') == 'success' && config('app.env') == 'production') {
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
}
