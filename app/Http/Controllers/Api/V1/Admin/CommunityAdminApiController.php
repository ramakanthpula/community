<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCommunityAdminRequest;
use App\Http\Requests\UpdateCommunityAdminRequest;
use App\Http\Resources\Admin\CommunityAdminResource;
use App\Models\CommunityAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommunityAdminApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('community_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommunityAdminResource(CommunityAdmin::all());
    }

    public function store(StoreCommunityAdminRequest $request)
    {
        $communityAdmin = CommunityAdmin::create($request->all());

        if ($request->input('photo', false)) {
            $communityAdmin->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new CommunityAdminResource($communityAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CommunityAdmin $communityAdmin)
    {
        abort_if(Gate::denies('community_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommunityAdminResource($communityAdmin);
    }

    public function update(UpdateCommunityAdminRequest $request, CommunityAdmin $communityAdmin)
    {
        $communityAdmin->update($request->all());

        if ($request->input('photo', false)) {
            if (!$communityAdmin->photo || $request->input('photo') !== $communityAdmin->photo->file_name) {
                if ($communityAdmin->photo) {
                    $communityAdmin->photo->delete();
                }
                $communityAdmin->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($communityAdmin->photo) {
            $communityAdmin->photo->delete();
        }

        return (new CommunityAdminResource($communityAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CommunityAdmin $communityAdmin)
    {
        abort_if(Gate::denies('community_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $communityAdmin->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
