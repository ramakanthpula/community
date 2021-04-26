<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNoticeBoardRequest;
use App\Http\Requests\StoreNoticeBoardRequest;
use App\Http\Requests\UpdateNoticeBoardRequest;
use App\Models\NoticeBoard;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class NoticeBoardController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('notice_board_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $noticeBoards = NoticeBoard::with(['recipients'])->get();

        $users = User::get();

        return view('admin.noticeBoards.index', compact('noticeBoards', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('notice_board_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recipients = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.noticeBoards.create', compact('recipients'));
    }

    public function store(StoreNoticeBoardRequest $request)
    {
        $noticeBoard = NoticeBoard::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $noticeBoard->id]);
        }

        return redirect()->route('admin.notice-boards.index');
    }

    public function edit(NoticeBoard $noticeBoard)
    {
        abort_if(Gate::denies('notice_board_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recipients = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $noticeBoard->load('recipients');

        return view('admin.noticeBoards.edit', compact('recipients', 'noticeBoard'));
    }

    public function update(UpdateNoticeBoardRequest $request, NoticeBoard $noticeBoard)
    {
        $noticeBoard->update($request->all());

        return redirect()->route('admin.notice-boards.index');
    }

    public function show(NoticeBoard $noticeBoard)
    {
        abort_if(Gate::denies('notice_board_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $noticeBoard->load('recipients');

        return view('admin.noticeBoards.show', compact('noticeBoard'));
    }

    public function destroy(NoticeBoard $noticeBoard)
    {
        abort_if(Gate::denies('notice_board_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $noticeBoard->delete();

        return back();
    }

    public function massDestroy(MassDestroyNoticeBoardRequest $request)
    {
        NoticeBoard::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('notice_board_create') && Gate::denies('notice_board_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new NoticeBoard();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
