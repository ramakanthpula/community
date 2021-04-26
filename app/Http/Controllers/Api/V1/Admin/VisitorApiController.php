<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVisitorRequest;
use App\Http\Requests\UpdateVisitorRequest;
use App\Http\Resources\Admin\VisitorResource;
use App\Models\Visitor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisitorApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('visitor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VisitorResource(Visitor::with(['unit_no'])->get());
    }

    public function store(StoreVisitorRequest $request)
    {
        $visitor = Visitor::create($request->all());

        return (new VisitorResource($visitor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Visitor $visitor)
    {
        abort_if(Gate::denies('visitor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VisitorResource($visitor->load(['unit_no']));
    }

    public function update(UpdateVisitorRequest $request, Visitor $visitor)
    {
        $visitor->update($request->all());

        return (new VisitorResource($visitor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Visitor $visitor)
    {
        abort_if(Gate::denies('visitor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visitor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
