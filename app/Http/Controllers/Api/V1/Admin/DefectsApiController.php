<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDefectRequest;
use App\Http\Requests\UpdateDefectRequest;
use App\Http\Resources\Admin\DefectResource;
use App\Models\Defect;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DefectsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('defect_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DefectResource(Defect::with(['users', 'defect_type', 'defect_sub_type'])->get());
    }

    public function store(StoreDefectRequest $request)
    {
        $defect = Defect::create($request->all());

        return (new DefectResource($defect))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Defect $defect)
    {
        abort_if(Gate::denies('defect_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DefectResource($defect->load(['users', 'defect_type', 'defect_sub_type']));
    }

    public function update(UpdateDefectRequest $request, Defect $defect)
    {
        $defect->update($request->all());

        return (new DefectResource($defect))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Defect $defect)
    {
        abort_if(Gate::denies('defect_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $defect->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
