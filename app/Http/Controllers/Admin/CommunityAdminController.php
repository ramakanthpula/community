<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCommunityAdminRequest;
use App\Http\Requests\StoreCommunityAdminRequest;
use App\Http\Requests\UpdateCommunityAdminRequest;
use App\Models\CommunityAdmin;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CommunityAdminController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('community_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $communityAdmins = CommunityAdmin::with(['media'])->get();

        return view('admin.communityAdmins.index', compact('communityAdmins'));
    }

    public function create()
    {
        abort_if(Gate::denies('community_admin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.communityAdmins.create');
    }

    public function store(StoreCommunityAdminRequest $request)
    {
        $communityAdmin = CommunityAdmin::create($request->all());

        if ($request->input('photo', false)) {
            $communityAdmin->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $communityAdmin->id]);
        }

        return redirect()->route('admin.community-admins.index');
    }

    public function edit(CommunityAdmin $communityAdmin)
    {
        abort_if(Gate::denies('community_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.communityAdmins.edit', compact('communityAdmin'));
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

        return redirect()->route('admin.community-admins.index');
    }

    public function show(CommunityAdmin $communityAdmin)
    {
        abort_if(Gate::denies('community_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.communityAdmins.show', compact('communityAdmin'));
    }

    public function destroy(CommunityAdmin $communityAdmin)
    {
        abort_if(Gate::denies('community_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $communityAdmin->delete();

        return back();
    }

    public function massDestroy(MassDestroyCommunityAdminRequest $request)
    {
        CommunityAdmin::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('community_admin_create') && Gate::denies('community_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CommunityAdmin();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
