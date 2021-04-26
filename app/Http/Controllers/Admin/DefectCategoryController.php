<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDefectCategoryRequest;
use App\Http\Requests\StoreDefectCategoryRequest;
use App\Http\Requests\UpdateDefectCategoryRequest;
use App\Models\DefectCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DefectCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('defect_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $defectCategories = DefectCategory::all();

        return view('admin.defectCategories.index', compact('defectCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('defect_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.defectCategories.create');
    }

    public function store(StoreDefectCategoryRequest $request)
    {
        $defectCategory = DefectCategory::create($request->all());

        return redirect()->route('admin.defect-categories.index');
    }

    public function edit(DefectCategory $defectCategory)
    {
        abort_if(Gate::denies('defect_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.defectCategories.edit', compact('defectCategory'));
    }

    public function update(UpdateDefectCategoryRequest $request, DefectCategory $defectCategory)
    {
        $defectCategory->update($request->all());

        return redirect()->route('admin.defect-categories.index');
    }

    public function show(DefectCategory $defectCategory)
    {
        abort_if(Gate::denies('defect_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $defectCategory->load('defectTypeDefects');

        return view('admin.defectCategories.show', compact('defectCategory'));
    }

    public function destroy(DefectCategory $defectCategory)
    {
        abort_if(Gate::denies('defect_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $defectCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyDefectCategoryRequest $request)
    {
        DefectCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
