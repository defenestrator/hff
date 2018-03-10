<?php

namespace App\Http\Controllers\Api;

use App\Region;
use Illuminate\Http\Request;

class RegionsApiController extends ApiController
{
    /**
     * @param Region $region
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(Region $region)
    {
        return $region->orderBy('name', 'asc')->paginate(50);
    }

    /**
     * @param Request $request
     * @param Region $region
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function create(Request $request, Region $region)
    {
        return $region->create($request->all());
    }

    /**
     * @param Region $region
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function edit(Region $region, $id)
    {
        return $region->where('id', '=', $id)->first();
    }

    /**
     * @param Request $request
     * @param Region $region
     * @param $id
     * @return bool
     */
    public function update(Request $request, Region $region, $id)
    {
        $content = $region->find($id);
        $content->update($request->all());
        return $content;
    }

    /**
     * @param Region $region
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Region $region, $id)
    {
        $region->destroy($id);
        return response()->json(['data' => 'ok']);
    }
}
