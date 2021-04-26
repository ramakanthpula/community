<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDefectSubCategoryRequest;
use App\Http\Requests\StoreDefectSubCategoryRequest;
use App\Http\Requests\UpdateDefectSubCategoryRequest;
use App\Models\DefectCategory;
use App\Models\DefectSubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DefectSubCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('defect_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $defectSubCategories = DefectSubCategory::with(['defect_category'])->get();

        $defect_categories = DefectCategory::get();

        return view('admin.defectSubCategories.index', compact('defectSubCategories', 'defect_categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('defect_sub_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $defect_categories = DefectCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.defectSubCategories.create', compact('defect_categories'));
    }

    public function store(StoreDefectSubCategoryRequest $request)
    {
        $defectSubCategory = DefectSubCategory::create($request->all());

        return redirect()->route('admin.defect-sub-categories.index');
    }

    public function edit(DefectSubCategory $defectSubCategory)
    {
        abort_if(Gate::denies('defect_sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $defect_categories = DefectCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $defectSubCategory->load('defect_category');

        return view('admin.defectSubCategories.edit', compact('defect_categories', 'defectSubCategory'));
    }

    public function update(UpdateDefectSubCategoryRequest $request, DefectSubCategory $defectSubCategory)
    {
        $defectSubCategory->update($request->all());

        return redirect()->route('admin.defect-sub-categories.index');
    }

    public function show(DefectSubCategory $defectSubCategory)
    {
        abort_if(Gate::denies('defect_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $defectSubCategory->load('defect_category');

        return view('admin.defectSubCategories.show', compact('defectSubCategory'));
    }

    public function destroy(DefectSubCategory $defectSubCategory)
    {
        abort_if(Gate::denies('defect_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $defectSubCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyDefectSubCategoryRequest $request)
    {
        DefectSubCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
