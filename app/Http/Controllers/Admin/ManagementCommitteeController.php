<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyManagementCommitteeRequest;
use App\Http\Requests\StoreManagementCommitteeRequest;
use App\Http\Requests\UpdateManagementCommitteeRequest;
use App\Models\DefectCategory;
use App\Models\ManagementCommittee;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ManagementCommitteeController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('management_committee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $managementCommittees = ManagementCommittee::with(['designation', 'media'])->get();

        $defect_categories = DefectCategory::get();

        return view('admin.managementCommittees.index', compact('managementCommittees', 'defect_categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('management_committee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designations = DefectCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.managementCommittees.create', compact('designations'));
    }

    public function store(StoreManagementCommitteeRequest $request)
    {
        $managementCommittee = ManagementCommittee::create($request->all());

        if ($request->input('photo', false)) {
            $managementCommittee->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $managementCommittee->id]);
        }

        return redirect()->route('admin.management-committees.index');
    }

    public function edit(ManagementCommittee $managementCommittee)
    {
        abort_if(Gate::denies('management_committee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designations = DefectCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $managementCommittee->load('designation');

        return view('admin.managementCommittees.edit', compact('designations', 'managementCommittee'));
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

        return redirect()->route('admin.management-committees.index');
    }

    public function show(ManagementCommittee $managementCommittee)
    {
        abort_if(Gate::denies('management_committee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $managementCommittee->load('designation');

        return view('admin.managementCommittees.show', compact('managementCommittee'));
    }

    public function destroy(ManagementCommittee $managementCommittee)
    {
        abort_if(Gate::denies('management_committee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $managementCommittee->delete();

        return back();
    }

    public function massDestroy(MassDestroyManagementCommitteeRequest $request)
    {
        ManagementCommittee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('management_committee_create') && Gate::denies('management_committee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ManagementCommittee();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
