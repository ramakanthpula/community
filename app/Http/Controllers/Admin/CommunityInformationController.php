<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCommunityInformationRequest;
use App\Http\Requests\StoreCommunityInformationRequest;
use App\Http\Requests\UpdateCommunityInformationRequest;
use App\Models\CommunityInformation;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CommunityInformationController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('community_information_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $communityInformations = CommunityInformation::with(['media'])->get();

        return view('admin.communityInformations.index', compact('communityInformations'));
    }

    public function create()
    {
        abort_if(Gate::denies('community_information_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.communityInformations.create');
    }

    public function store(StoreCommunityInformationRequest $request)
    {
        $communityInformation = CommunityInformation::create($request->all());

        if ($request->input('browse_file', false)) {
            $communityInformation->addMedia(storage_path('tmp/uploads/' . basename($request->input('browse_file'))))->toMediaCollection('browse_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $communityInformation->id]);
        }

        return redirect()->route('admin.community-informations.index');
    }

    public function edit(CommunityInformation $communityInformation)
    {
        abort_if(Gate::denies('community_information_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.communityInformations.edit', compact('communityInformation'));
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

        return redirect()->route('admin.community-informations.index');
    }

    public function show(CommunityInformation $communityInformation)
    {
        abort_if(Gate::denies('community_information_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.communityInformations.show', compact('communityInformation'));
    }

    public function destroy(CommunityInformation $communityInformation)
    {
        abort_if(Gate::denies('community_information_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $communityInformation->delete();

        return back();
    }

    public function massDestroy(MassDestroyCommunityInformationRequest $request)
    {
        CommunityInformation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('community_information_create') && Gate::denies('community_information_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CommunityInformation();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
