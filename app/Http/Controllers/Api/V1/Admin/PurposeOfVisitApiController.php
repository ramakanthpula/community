<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurposeOfVisitRequest;
use App\Http\Requests\UpdatePurposeOfVisitRequest;
use App\Http\Resources\Admin\PurposeOfVisitResource;
use App\Models\PurposeOfVisit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurposeOfVisitApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('purpose_of_visit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PurposeOfVisitResource(PurposeOfVisit::all());
    }

    public function store(StorePurposeOfVisitRequest $request)
    {
        $purposeOfVisit = PurposeOfVisit::create($request->all());

        return (new PurposeOfVisitResource($purposeOfVisit))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PurposeOfVisit $purposeOfVisit)
    {
        abort_if(Gate::denies('purpose_of_visit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PurposeOfVisitResource($purposeOfVisit);
    }

    public function update(UpdatePurposeOfVisitRequest $request, PurposeOfVisit $purposeOfVisit)
    {
        $purposeOfVisit->update($request->all());

        return (new PurposeOfVisitResource($purposeOfVisit))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PurposeOfVisit $purposeOfVisit)
    {
        abort_if(Gate::denies('purpose_of_visit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purposeOfVisit->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
