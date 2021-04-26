<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreManagementCommitteeRequest;
use App\Http\Requests\UpdateManagementCommitteeRequest;
use App\Http\Resources\Admin\ManagementCommitteeResource;
use App\Models\ManagementCommittee;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManagementCommitteeApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('management_committee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManagementCommitteeResource(ManagementCommittee::with(['designation'])->get());
    }

    public function store(StoreManagementCommitteeRequest $request)
    {
        $managementCommittee = ManagementCommittee::create($request->all());

        if ($request->input('photo', false)) {
            $managementCommittee->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new ManagementCommitteeResource($managementCommittee))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ManagementCommittee $managementCommittee)
    {
        abort_if(Gate::denies('management_committee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManagementCommitteeResource($managementCommittee->load(['designation']));
    }

    public function update(UpdateManagementCommitteeRequest $request, ManagementCommittee $managementCommittee)
    {
        $managementCommittee->update($request->all());

        if ($request->input('photo', false)) {
            if (!$managementCommittee->photo || $request->input('photo') !== $managementCommittee->photo->file_name) {
                if ($managementCommittee->photo) {
                    $managementCommittee->photo->delete();
                }
                $managementCommittee->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($managementCommittee->photo) {
            $managementCommittee->photo->delete();
        }

        return (new ManagementCommitteeResource($managementCommittee))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ManagementCommittee $managementCommittee)
    {
        abort_if(Gate::denies('management_committee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $managementCommittee->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
