<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDefectRequest;
use App\Http\Requests\StoreDefectRequest;
use App\Http\Requests\UpdateDefectRequest;
use App\Models\Defect;
use App\Models\DefectCategory;
use App\Models\DefectSubCategory;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DefectsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('defect_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $defects = Defect::with(['users', 'defect_type', 'defect_sub_type'])->get();

        $users = User::get();

        $defect_categories = DefectCategory::get();

        $defect_sub_categories = DefectSubCategory::get();

        return view('admin.defects.index', compact('defects', 'users', 'defect_categories', 'defect_sub_categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('defect_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $defect_types = DefectCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $defect_sub_types = DefectSubCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.defects.create', compact('users', 'defect_types', 'defect_sub_types'));
    }

    public function store(StoreDefectRequest $request)
    {
        $defect = Defect::create($request->all());

        return redirect()->route('admin.defects.index');
    }

    public function edit(Defect $defect)
    {
        abort_if(Gate::denies('defect_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $defect_types = DefectCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $defect_sub_types = DefectSubCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $defect->load('users', 'defect_type', 'defect_sub_type');

        return view('admin.defects.edit', compact('users', 'defect_types', 'defect_sub_types', 'defect'));
    }

    public function update(UpdateDefectRequest $request, Defect $defect)
    {
        $defect->update($request->all());

        return redirect()->route('admin.defects.index');
    }

    public function show(Defect $defect)
    {
        abort_if(Gate::denies('defect_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $defect->load('users', 'defect_type', 'defect_sub_type');

        return view('admin.defects.show', compact('defect'));
    }

    public function destroy(Defect $defect)
    {
        abort_if(Gate::denies('defect_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $defect->delete();

        return back();
    }

    public function massDestroy(MassDestroyDefectRequest $request)
    {
        Defect::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
