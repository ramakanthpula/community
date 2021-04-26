<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAddWorkmanRequest;
use App\Http\Requests\StoreAddWorkmanRequest;
use App\Http\Requests\UpdateAddWorkmanRequest;
use App\Models\AddWorkman;
use App\Models\SkilledWorker;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddWorkmanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('add_workman_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addWorkmen = AddWorkman::with(['skilled'])->get();

        $skilled_workers = SkilledWorker::get();

        return view('admin.addWorkmen.index', compact('addWorkmen', 'skilled_workers'));
    }

    public function create()
    {
        abort_if(Gate::denies('add_workman_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skilleds = SkilledWorker::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addWorkmen.create', compact('skilleds'));
    }

    public function store(StoreAddWorkmanRequest $request)
    {
        $addWorkman = AddWorkman::create($request->all());

        return redirect()->route('admin.add-workmen.index');
    }

    public function edit(AddWorkman $addWorkman)
    {
        abort_if(Gate::denies('add_workman_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skilleds = SkilledWorker::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addWorkman->load('skilled');

        return view('admin.addWorkmen.edit', compact('skilleds', 'addWorkman'));
    }

    public function update(UpdateAddWorkmanRequest $request, AddWorkman $addWorkman)
    {
        $addWorkman->update($request->all());

        return redirect()->route('admin.add-workmen.index');
    }

    public function show(AddWorkman $addWorkman)
    {
        abort_if(Gate::denies('add_workman_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addWorkman->load('skilled');

        return view('admin.addWorkmen.show', compact('addWorkman'));
    }

    public function destroy(AddWorkman $addWorkman)
    {
        abort_if(Gate::denies('add_workman_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addWorkman->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddWorkmanRequest $request)
    {
        AddWorkman::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
