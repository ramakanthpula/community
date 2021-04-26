<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAllotUnitRequest;
use App\Http\Requests\UpdateAllotUnitRequest;
use App\Http\Resources\Admin\AllotUnitResource;
use App\Models\AllotUnit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllotUnitsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('allot_unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AllotUnitResource(AllotUnit::with(['users', 'units'])->get());
    }

    public function store(StoreAllotUnitRequest $request)
    {
        $allotUnit = AllotUnit::create($request->all());

        return (new AllotUnitResource($allotUnit))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AllotUnit $allotUnit)
    {
        abort_if(Gate::denies('allot_unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AllotUnitResource($allotUnit->load(['users', 'units']));
    }

    public function update(UpdateAllotUnitRequest $request, AllotUnit $allotUnit)
    {
        $allotUnit->update($request->all());

        return (new AllotUnitResource($allotUnit))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AllotUnit $allotUnit)
    {
        abort_if(Gate::denies('allot_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allotUnit->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
