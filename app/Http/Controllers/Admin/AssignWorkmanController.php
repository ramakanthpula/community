<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssignWorkmanRequest;
use App\Http\Requests\StoreAssignWorkmanRequest;
use App\Http\Requests\UpdateAssignWorkmanRequest;
use App\Models\AssignWorkman;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssignWorkmanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('assign_workman_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignWorkmen = AssignWorkman::all();

        return view('admin.assignWorkmen.index', compact('assignWorkmen'));
    }

    public function create()
    {
        abort_if(Gate::denies('assign_workman_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assignWorkmen.create');
    }

    public function store(StoreAssignWorkmanRequest $request)
    {
        $assignWorkman = AssignWorkman::create($request->all());

        return redirect()->route('admin.assign-workmen.index');
    }

    public function edit(AssignWorkman $assignWorkman)
    {
        abort_if(Gate::denies('assign_workman_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assignWorkmen.edit', compact('assignWorkman'));
    }

    public function update(UpdateAssignWorkmanRequest $request, AssignWorkman $assignWorkman)
    {
        $assignWorkman->update($request->all());

        return redirect()->route('admin.assign-workmen.index');
    }

    public function show(AssignWorkman $assignWorkman)
    {
        abort_if(Gate::denies('assign_workman_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assignWorkmen.show', compact('assignWorkman'));
    }

    public function destroy(AssignWorkman $assignWorkman)
    {
        abort_if(Gate::denies('assign_workman_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignWorkman->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssignWorkmanRequest $request)
    {
        AssignWorkman::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
