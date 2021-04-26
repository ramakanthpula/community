<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkilledWorkerRequest;
use App\Http\Requests\UpdateSkilledWorkerRequest;
use App\Http\Resources\Admin\SkilledWorkerResource;
use App\Models\SkilledWorker;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkilledWorkerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('skilled_worker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SkilledWorkerResource(SkilledWorker::all());
    }

    public function store(StoreSkilledWorkerRequest $request)
    {
        $skilledWorker = SkilledWorker::create($request->all());

        return (new SkilledWorkerResource($skilledWorker))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SkilledWorker $skilledWorker)
    {
        abort_if(Gate::denies('skilled_worker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SkilledWorkerResource($skilledWorker);
    }

    public function update(UpdateSkilledWorkerRequest $request, SkilledWorker $skilledWorker)
    {
        $skilledWorker->update($request->all());

        return (new SkilledWorkerResource($skilledWorker))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SkilledWorker $skilledWorker)
    {
        abort_if(Gate::denies('skilled_worker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skilledWorker->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
