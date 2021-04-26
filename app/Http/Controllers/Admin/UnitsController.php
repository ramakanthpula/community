<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUnitRequest;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Models\Block;
use App\Models\Floor;
use App\Models\Unit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnitsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $units = Unit::with(['block_name', 'floor_name'])->get();

        $blocks = Block::get();

        $floors = Floor::get();

        return view('admin.units.index', compact('units', 'blocks', 'floors'));
    }

    public function create()
    {
        abort_if(Gate::denies('unit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $block_names = Block::all()->pluck('block_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $floor_names = Floor::all()->pluck('floor_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.units.create', compact('block_names', 'floor_names'));
    }

    public function store(StoreUnitRequest $request)
    {
        $unit = Unit::create($request->all());

        return redirect()->route('admin.units.index');
    }

    public function edit(Unit $unit)
    {
        abort_if(Gate::denies('unit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $block_names = Block::all()->pluck('block_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $floor_names = Floor::all()->pluck('floor_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $unit->load('block_name', 'floor_name');

        return view('admin.units.edit', compact('block_names', 'floor_names', 'unit'));
    }

    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $unit->update($request->all());

        return redirect()->route('admin.units.index');
    }

    public function show(Unit $unit)
    {
        abort_if(Gate::denies('unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unit->load('block_name', 'floor_name');

        return view('admin.units.show', compact('unit'));
    }

    public function destroy(Unit $unit)
    {
        abort_if(Gate::denies('unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unit->delete();

        return back();
    }

    public function massDestroy(MassDestroyUnitRequest $request)
    {
        Unit::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
