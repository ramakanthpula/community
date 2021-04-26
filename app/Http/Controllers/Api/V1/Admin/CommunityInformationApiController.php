<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCommunityInformationRequest;
use App\Http\Requests\UpdateCommunityInformationRequest;
use App\Http\Resources\Admin\CommunityInformationResource;
use App\Models\CommunityInformation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommunityInformationApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('community_information_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommunityInformationResource(CommunityInformation::all());
    }

    public function store(StoreCommunityInformationRequest $request)
    {
        $communityInformation = CommunityInformation::create($request->all());

        if ($request->input('browse_file', false)) {
            $communityInformation->addMedia(storage_path('tmp/uploads/' . basename($request->input('browse_file'))))->toMediaCollection('browse_file');
        }

        return (new CommunityInformationResource($communityInformation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CommunityInformation $communityInformation)
    {
        abort_if(Gate::denies('community_information_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommunityInformationResource($communityInformation);
    }

    public function update(UpdateCommunityInformationRequest $request, CommunityInformation $communityInformation)
    {
        $communityInformation->update($request->all());

        if ($request->input('browse_file', false)) {
            if (!$communityInformation->browse_file || $request->input('browse_file') !== $communityInformation->browse_file->file_name) {
                if ($communityInformation->browse_file) {
                    $communityInformation->browse_file->delete();
                }
                $communityInformation->addMedia(storage_path('tmp/uploads/' . basename($request->input('browse_file'))))->toMediaCollection('browse_file');
            }
        } elseif ($communityInformation->browse_file) {
            $communityInformation->browse_file->delete();
        }

        return (new CommunityInformationResource($communityInformation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CommunityInformation $communityInformation)
    {
        abort_if(Gate::denies('community_information_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $communityInformation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
