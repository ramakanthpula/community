<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAllotUnitRequest;
use App\Http\Requests\StoreAllotUnitRequest;
use App\Http\Requests\UpdateAllotUnitRequest;
use App\Models\AllotUnit;
use App\Models\Unit;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllotUnitsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('allot_unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allotUnits = AllotUnit::with(['users', 'units'])->get();

        $users = User::get();

        $units = Unit::get();

        return view('admin.allotUnits.index', compact('allotUnits', 'users', 'units'));
    }

    public function create()
    {
        abort_if(Gate::denies('allot_unit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $units = Unit::all()->pluck('no_of_units', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.allotUnits.create', compact('users', 'units'));
    }

    public function store(StoreAllotUnitRequest $request)
    {
        $allotUnit = AllotUnit::create($request->all());

        return redirect()->route('admin.allot-units.index');
    }

    public function edit(AllotUnit $allotUnit)
    {
        abort_if(Gate::denies('allot_unit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $units = Unit::all()->pluck('no_of_units', 'id')->prepend(trans('global.pleaseSelect'), '');

        $allotUnit->load('users', 'units');

        return view('admin.allotUnits.edit', compact('users', 'units', 'allotUnit'));
    }

    public function update(UpdateAllotUnitRequest $request, AllotUnit $allotUnit)
    {
        $allotUnit->update($request->all());

        return redirect()->route('admin.allot-units.index');
    }

    public function show(AllotUnit $allotUnit)
    {
        abort_if(Gate::denies('allot_unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allotUnit->load('users', 'units');

        return view('admin.allotUnits.show', compact('allotUnit'));
    }

    public function destroy(AllotUnit $allotUnit)
    {
        abort_if(Gate::denies('allot_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allotUnit->delete();

        return back();
    }

    public function massDestroy(MassDestroyAllotUnitRequest $request)
    {
        AllotUnit::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
