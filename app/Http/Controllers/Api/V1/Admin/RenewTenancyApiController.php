<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreRenewTenancyRequest;
use App\Http\Requests\UpdateRenewTenancyRequest;
use App\Http\Resources\Admin\RenewTenancyResource;
use App\Models\RenewTenancy;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RenewTenancyApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('renew_tenancy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RenewTenancyResource(RenewTenancy::with(['block_name', 'floor_name', 'owner_unit'])->get());
    }

    public function store(StoreRenewTenancyRequest $request)
    {
        $renewTenancy = RenewTenancy::create($request->all());

        if ($request->input('indemnity_document', false)) {
            $renewTenancy->addMedia(storage_path('tmp/uploads/' . basename($request->input('indemnity_document'))))->toMediaCollection('indemnity_document');
        }

        return (new RenewTenancyResource($renewTenancy))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RenewTenancy $renewTenancy)
    {
        abort_if(Gate::denies('renew_tenancy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RenewTenancyResource($renewTenancy->load(['block_name', 'floor_name', 'owner_unit']));
    }

    public function update(UpdateRenewTenancyRequest $request, RenewTenancy $renewTenancy)
    {
        $renewTenancy->update($request->all());

        if ($request->input('indemnity_document', false)) {
            if (!$renewTenancy->indemnity_document || $request->input('indemnity_document') !== $renewTenancy->indemnity_document->file_name) {
                if ($renewTenancy->indemnity_document) {
                    $renewTenancy->indemnity_document->delete();
                }
                $renewTenancy->addMedia(storage_path('tmp/uploads/' . basename($request->input('indemnity_document'))))->toMediaCollection('indemnity_document');
            }
        } elseif ($renewTenancy->indemnity_document) {
            $renewTenancy->indemnity_document->delete();
        }

        return (new RenewTenancyResource($renewTenancy))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RenewTenancy $renewTenancy)
    {
        abort_if(Gate::denies('renew_tenancy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $renewTenancy->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
