<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddWorkmanRequest;
use App\Http\Requests\UpdateAddWorkmanRequest;
use App\Http\Resources\Admin\AddWorkmanResource;
use App\Models\AddWorkman;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddWorkmanApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('add_workman_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddWorkmanResource(AddWorkman::with(['skilled'])->get());
    }

    public function store(StoreAddWorkmanRequest $request)
    {
        $addWorkman = AddWorkman::create($request->all());

        return (new AddWorkmanResource($addWorkman))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddWorkman $addWorkman)
    {
        abort_if(Gate::denies('add_workman_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddWorkmanResource($addWorkman->load(['skilled']));
    }

    public function update(UpdateAddWorkmanRequest $request, AddWorkman $addWorkman)
    {
        $addWorkman->update($request->all());

        return (new AddWorkmanResource($addWorkman))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddWorkman $addWorkman)
    {
        abort_if(Gate::denies('add_workman_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addWorkman->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
