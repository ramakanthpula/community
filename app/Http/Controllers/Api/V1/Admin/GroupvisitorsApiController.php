<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupvisitorRequest;
use App\Http\Requests\UpdateGroupvisitorRequest;
use App\Http\Resources\Admin\GroupvisitorResource;
use App\Models\Groupvisitor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GroupvisitorsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('groupvisitor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GroupvisitorResource(Groupvisitor::all());
    }

    public function store(StoreGroupvisitorRequest $request)
    {
        $groupvisitor = Groupvisitor::create($request->all());

        return (new GroupvisitorResource($groupvisitor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Groupvisitor $groupvisitor)
    {
        abort_if(Gate::denies('groupvisitor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GroupvisitorResource($groupvisitor);
    }

    public function update(UpdateGroupvisitorRequest $request, Groupvisitor $groupvisitor)
    {
        $groupvisitor->update($request->all());

        return (new GroupvisitorResource($groupvisitor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Groupvisitor $groupvisitor)
    {
        abort_if(Gate::denies('groupvisitor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $groupvisitor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
