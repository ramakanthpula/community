<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBlockRequest;
use App\Http\Requests\StoreBlockRequest;
use App\Http\Requests\UpdateBlockRequest;
use App\Models\Block;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BlockController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('block_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blocks = Block::with(['media'])->get();

        return view('admin.blocks.index', compact('blocks'));
    }

    public function create()
    {
        abort_if(Gate::denies('block_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blocks.create');
    }

    public function store(StoreBlockRequest $request)
    {
        $block = Block::create($request->all());

        foreach ($request->input('block_photo', []) as $file) {
            $block->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('block_photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $block->id]);
        }

        return redirect()->route('admin.blocks.index');
    }

    public function edit(Block $block)
    {
        abort_if(Gate::denies('block_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blocks.edit', compact('block'));
    }

    public function update(UpdateBlockRequest $request, Block $block)
    {
        $block->update($request->all());

        if (count($block->block_photo) > 0) {
            foreach ($block->block_photo as $media) {
                if (!in_array($media->file_name, $request->input('block_photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $block->block_photo->pluck('file_name')->toArray();
        foreach ($request->input('block_photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $block->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('block_photo');
            }
        }

        return redirect()->route('admin.blocks.index');
    }

    public function show(Block $block)
    {
        abort_if(Gate::denies('block_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blocks.show', compact('block'));
    }

    public function destroy(Block $block)
    {
        abort_if(Gate::denies('block_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $block->delete();

        return back();
    }

    public function massDestroy(MassDestroyBlockRequest $request)
    {
        Block::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('block_create') && Gate::denies('block_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Block();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
