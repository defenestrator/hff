<?php

namespace App\Http\Controllers\Api;

use App\Destination;
use Illuminate\Http\Request;

class DestinationsApiController extends ApiController
{
    /**
     * @param Destination $destination
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(Destination $destination)
    {
        return $destination->orderBy('name', 'asc')->paginate(50);
    }

    /**
     * @param Request $request
     * @param Destination $destination
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function create(Request $request, Destination $destination)
    {
        return $destination->create($request->all());
    }

    /**
     * @param Destination $destination
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function edit(Destination $destination, $id)
    {
        return $destination->where('id', '=', $id)->first();
    }

    /**
     * @param Request $request
     * @param Destination $destination
     * @param $id
     * @return bool
     */
    public function update(Request $request, Destination $destination, $id)
    {
        $content = $destination->find($id);
        $content->update($request->all());
        return $content;
    }

    /**
     * @param Destination $destination
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Destination $destination, $id)
    {
        $destination->destroy($id);
        return response()->json(['data' => 'ok']);
    }
}
