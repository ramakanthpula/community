<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBuilderInformationRequest;
use App\Http\Requests\UpdateBuilderInformationRequest;
use App\Http\Resources\Admin\BuilderInformationResource;
use App\Models\BuilderInformation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BuilderInformationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('builder_information_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BuilderInformationResource(BuilderInformation::all());
    }

    public function store(StoreBuilderInformationRequest $request)
    {
        $builderInformation = BuilderInformation::create($request->all());

        return (new BuilderInformationResource($builderInformation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BuilderInformation $builderInformation)
    {
        abort_if(Gate::denies('builder_information_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BuilderInformationResource($builderInformation);
    }

    public function update(UpdateBuilderInformationRequest $request, BuilderInformation $builderInformation)
    {
        $builderInformation->update($request->all());

        return (new BuilderInformationResource($builderInformation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BuilderInformation $builderInformation)
    {
        abort_if(Gate::denies('builder_information_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $builderInformation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
