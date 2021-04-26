<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRenewTenancyRequest;
use App\Http\Requests\StoreRenewTenancyRequest;
use App\Http\Requests\UpdateRenewTenancyRequest;
use App\Models\AllotUnit;
use App\Models\Block;
use App\Models\Floor;
use App\Models\RenewTenancy;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RenewTenancyController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('renew_tenancy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $renewTenancies = RenewTenancy::with(['block_name', 'floor_name', 'owner_unit', 'media'])->get();

        $blocks = Block::get();

        $floors = Floor::get();

        $allot_units = AllotUnit::get();

        return view('admin.renewTenancies.index', compact('renewTenancies', 'blocks', 'floors', 'allot_units'));
    }

    public function create()
    {
        abort_if(Gate::denies('renew_tenancy_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $block_names = Block::all()->pluck('block_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $floor_names = Floor::all()->pluck('floor_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $owner_units = AllotUnit::all()->pluck('unitnames', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.renewTenancies.create', compact('block_names', 'floor_names', 'owner_units'));
    }

    public function store(StoreRenewTenancyRequest $request)
    {
        $renewTenancy = RenewTenancy::create($request->all());

        if ($request->input('indemnity_document', false)) {
            $renewTenancy->addMedia(storage_path('tmp/uploads/' . basename($request->input('indemnity_document'))))->toMediaCollection('indemnity_document');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $renewTenancy->id]);
        }

        return redirect()->route('admin.renew-tenancies.index');
    }

    public function edit(RenewTenancy $renewTenancy)
    {
        abort_if(Gate::denies('renew_tenancy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $block_names = Block::all()->pluck('block_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $floor_names = Floor::all()->pluck('floor_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $owner_units = AllotUnit::all()->pluck('unitnames', 'id')->prepend(trans('global.pleaseSelect'), '');

        $renewTenancy->load('block_name', 'floor_name', 'owner_unit');

        return view('admin.renewTenancies.edit', compact('block_names', 'floor_names', 'owner_units', 'renewTenancy'));
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

        return redirect()->route('admin.renew-tenancies.index');
    }

    public function show(RenewTenancy $renewTenancy)
    {
        abort_if(Gate::denies('renew_tenancy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $renewTenancy->load('block_name', 'floor_name', 'owner_unit');

        return view('admin.renewTenancies.show', compact('renewTenancy'));
    }

    public function destroy(RenewTenancy $renewTenancy)
    {
        abort_if(Gate::denies('renew_tenancy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $renewTenancy->delete();

        return back();
    }

    public function massDestroy(MassDestroyRenewTenancyRequest $request)
    {
        RenewTenancy::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('renew_tenancy_create') && Gate::denies('renew_tenancy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RenewTenancy();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
