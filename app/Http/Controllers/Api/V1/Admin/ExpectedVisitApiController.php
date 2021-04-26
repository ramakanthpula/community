<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpectedVisitRequest;
use App\Http\Requests\UpdateExpectedVisitRequest;
use App\Http\Resources\Admin\ExpectedVisitResource;
use App\Models\ExpectedVisit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpectedVisitApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expected_visit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpectedVisitResource(ExpectedVisit::with(['unit_no', 'purposes'])->get());
    }

    public function store(StoreExpectedVisitRequest $request)
    {
        $expectedVisit = ExpectedVisit::create($request->all());
        $expectedVisit->purposes()->sync($request->input('purposes', []));

        return (new ExpectedVisitResource($expectedVisit))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ExpectedVisit $expectedVisit)
    {
        abort_if(Gate::denies('expected_visit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpectedVisitResource($expectedVisit->load(['unit_no', 'purposes']));
    }

    public function update(UpdateExpectedVisitRequest $request, ExpectedVisit $expectedVisit)
    {
        $expectedVisit->update($request->all());
        $expectedVisit->purposes()->sync($request->input('purposes', []));

        return (new ExpectedVisitResource($expectedVisit))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ExpectedVisit $expectedVisit)
    {
        abort_if(Gate::denies('expected_visit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expectedVisit->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
