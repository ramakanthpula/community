<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDefectSubCategoryRequest;
use App\Http\Requests\UpdateDefectSubCategoryRequest;
use App\Http\Resources\Admin\DefectSubCategoryResource;
use App\Models\DefectSubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DefectSubCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('defect_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DefectSubCategoryResource(DefectSubCategory::with(['defect_category'])->get());
    }

    public function store(StoreDefectSubCategoryRequest $request)
    {
        $defectSubCategory = DefectSubCategory::create($request->all());

        return (new DefectSubCategoryResource($defectSubCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DefectSubCategory $defectSubCategory)
    {
        abort_if(Gate::denies('defect_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DefectSubCategoryResource($defectSubCategory->load(['defect_category']));
    }

    public function update(UpdateDefectSubCategoryRequest $request, DefectSubCategory $defectSubCategory)
    {
        $defectSubCategory->update($request->all());

        return (new DefectSubCategoryResource($defectSubCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DefectSubCategory $defectSubCategory)
    {
        abort_if(Gate::denies('defect_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $defectSubCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
