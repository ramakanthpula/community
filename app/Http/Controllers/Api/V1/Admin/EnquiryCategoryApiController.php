<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEnquiryCategoryRequest;
use App\Http\Requests\UpdateEnquiryCategoryRequest;
use App\Http\Resources\Admin\EnquiryCategoryResource;
use App\Models\EnquiryCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnquiryCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('enquiry_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EnquiryCategoryResource(EnquiryCategory::all());
    }

    public function store(StoreEnquiryCategoryRequest $request)
    {
        $enquiryCategory = EnquiryCategory::create($request->all());

        return (new EnquiryCategoryResource($enquiryCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EnquiryCategory $enquiryCategory)
    {
        abort_if(Gate::denies('enquiry_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EnquiryCategoryResource($enquiryCategory);
    }

    public function update(UpdateEnquiryCategoryRequest $request, EnquiryCategory $enquiryCategory)
    {
        $enquiryCategory->update($request->all());

        return (new EnquiryCategoryResource($enquiryCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EnquiryCategory $enquiryCategory)
    {
        abort_if(Gate::denies('enquiry_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enquiryCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
