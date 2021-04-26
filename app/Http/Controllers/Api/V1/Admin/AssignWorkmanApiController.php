<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssignWorkmanRequest;
use App\Http\Requests\UpdateAssignWorkmanRequest;
use App\Http\Resources\Admin\AssignWorkmanResource;
use App\Models\AssignWorkman;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssignWorkmanApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('assign_workman_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssignWorkmanResource(AssignWorkman::all());
    }

    public function store(StoreAssignWorkmanRequest $request)
    {
        $assignWorkman = AssignWorkman::create($request->all());

        return (new AssignWorkmanResource($assignWorkman))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AssignWorkman $assignWorkman)
    {
        abort_if(Gate::denies('assign_workman_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssignWorkmanResource($assignWorkman);
    }

    public function update(UpdateAssignWorkmanRequest $request, AssignWorkman $assignWorkman)
    {
        $assignWorkman->update($request->all());

        return (new AssignWorkmanResource($assignWorkman))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AssignWorkman $assignWorkman)
    {
        abort_if(Gate::denies('assign_workman_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignWorkman->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
