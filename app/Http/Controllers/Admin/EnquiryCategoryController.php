<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEnquiryCategoryRequest;
use App\Http\Requests\StoreEnquiryCategoryRequest;
use App\Http\Requests\UpdateEnquiryCategoryRequest;
use App\Models\EnquiryCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnquiryCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('enquiry_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enquiryCategories = EnquiryCategory::all();

        return view('admin.enquiryCategories.index', compact('enquiryCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('enquiry_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.enquiryCategories.create');
    }

    public function store(StoreEnquiryCategoryRequest $request)
    {
        $enquiryCategory = EnquiryCategory::create($request->all());

        return redirect()->route('admin.enquiry-categories.index');
    }

    public function edit(EnquiryCategory $enquiryCategory)
    {
        abort_if(Gate::denies('enquiry_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.enquiryCategories.edit', compact('enquiryCategory'));
    }

    public function update(UpdateEnquiryCategoryRequest $request, EnquiryCategory $enquiryCategory)
    {
        $enquiryCategory->update($request->all());

        return redirect()->route('admin.enquiry-categories.index');
    }

    public function show(EnquiryCategory $enquiryCategory)
    {
        abort_if(Gate::denies('enquiry_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.enquiryCategories.show', compact('enquiryCategory'));
    }

    public function destroy(EnquiryCategory $enquiryCategory)
    {
        abort_if(Gate::denies('enquiry_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enquiryCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyEnquiryCategoryRequest $request)
    {
        EnquiryCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
