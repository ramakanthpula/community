<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySkilledWorkerRequest;
use App\Http\Requests\StoreSkilledWorkerRequest;
use App\Http\Requests\UpdateSkilledWorkerRequest;
use App\Models\SkilledWorker;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkilledWorkerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('skilled_worker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skilledWorkers = SkilledWorker::all();

        return view('admin.skilledWorkers.index', compact('skilledWorkers'));
    }

    public function create()
    {
        abort_if(Gate::denies('skilled_worker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.skilledWorkers.create');
    }

    public function store(StoreSkilledWorkerRequest $request)
    {
        $skilledWorker = SkilledWorker::create($request->all());

        return redirect()->route('admin.skilled-workers.index');
    }

    public function edit(SkilledWorker $skilledWorker)
    {
        abort_if(Gate::denies('skilled_worker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.skilledWorkers.edit', compact('skilledWorker'));
    }

    public function update(UpdateSkilledWorkerRequest $request, SkilledWorker $skilledWorker)
    {
        $skilledWorker->update($request->all());

        return redirect()->route('admin.skilled-workers.index');
    }

    public function show(SkilledWorker $skilledWorker)
    {
        abort_if(Gate::denies('skilled_worker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.skilledWorkers.show', compact('skilledWorker'));
    }

    public function destroy(SkilledWorker $skilledWorker)
    {
        abort_if(Gate::denies('skilled_worker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skilledWorker->delete();

        return back();
    }

    public function massDestroy(MassDestroySkilledWorkerRequest $request)
    {
        SkilledWorker::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
