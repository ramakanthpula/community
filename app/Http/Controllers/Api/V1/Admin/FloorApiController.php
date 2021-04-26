<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFloorRequest;
use App\Http\Requests\UpdateFloorRequest;
use App\Http\Resources\Admin\FloorResource;
use App\Models\Floor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FloorApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('floor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FloorResource(Floor::with(['block_name'])->get());
    }

    public function store(StoreFloorRequest $request)
    {
        $floor = Floor::create($request->all());

        return (new FloorResource($floor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Floor $floor)
    {
        abort_if(Gate::denies('floor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FloorResource($floor->load(['block_name']));
    }

    public function update(UpdateFloorRequest $request, Floor $floor)
    {
        $floor->update($request->all());

        return (new FloorResource($floor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Floor $floor)
    {
        abort_if(Gate::denies('floor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $floor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
