<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMeetingRequest;
use App\Http\Requests\StoreMeetingRequest;
use App\Http\Requests\UpdateMeetingRequest;
use App\Models\Meeting;
use App\Models\Team;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MeetingsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('meeting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $meetings = Meeting::with(['select_user_group', 'specific_users'])->get();

        $teams = Team::get();

        $users = User::get();

        return view('admin.meetings.index', compact('meetings', 'teams', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('meeting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $select_user_groups = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specific_users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.meetings.create', compact('select_user_groups', 'specific_users'));
    }

    public function store(StoreMeetingRequest $request)
    {
        $meeting = Meeting::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $meeting->id]);
        }

        return redirect()->route('admin.meetings.index');
    }

    public function edit(Meeting $meeting)
    {
        abort_if(Gate::denies('meeting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $select_user_groups = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specific_users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $meeting->load('select_user_group', 'specific_users');

        return view('admin.meetings.edit', compact('select_user_groups', 'specific_users', 'meeting'));
    }

    public function update(UpdateMeetingRequest $request, Meeting $meeting)
    {
        $meeting->update($request->all());

        return redirect()->route('admin.meetings.index');
    }

    public function show(Meeting $meeting)
    {
        abort_if(Gate::denies('meeting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $meeting->load('select_user_group', 'specific_users');

        return view('admin.meetings.show', compact('meeting'));
    }

    public function destroy(Meeting $meeting)
    {
        abort_if(Gate::denies('meeting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $meeting->delete();

        return back();
    }

    public function massDestroy(MassDestroyMeetingRequest $request)
    {
        Meeting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('meeting_create') && Gate::denies('meeting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Meeting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
