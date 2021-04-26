<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCommunityRuleRequest;
use App\Http\Requests\StoreCommunityRuleRequest;
use App\Http\Requests\UpdateCommunityRuleRequest;
use App\Models\CommunityRule;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CommunityRulesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('community_rule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $communityRules = CommunityRule::all();

        return view('admin.communityRules.index', compact('communityRules'));
    }

    public function create()
    {
        abort_if(Gate::denies('community_rule_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.communityRules.create');
    }

    public function store(StoreCommunityRuleRequest $request)
    {
        $communityRule = CommunityRule::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $communityRule->id]);
        }

        return redirect()->route('admin.community-rules.index');
    }

    public function edit(CommunityRule $communityRule)
    {
        abort_if(Gate::denies('community_rule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.communityRules.edit', compact('communityRule'));
    }

    public function update(UpdateCommunityRuleRequest $request, CommunityRule $communityRule)
    {
        $communityRule->update($request->all());

        return redirect()->route('admin.community-rules.index');
    }

    public function show(CommunityRule $communityRule)
    {
        abort_if(Gate::denies('community_rule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.communityRules.show', compact('communityRule'));
    }

    public function destroy(CommunityRule $communityRule)
    {
        abort_if(Gate::denies('community_rule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $communityRule->delete();

        return back();
    }

    public function massDestroy(MassDestroyCommunityRuleRequest $request)
    {
        CommunityRule::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('community_rule_create') && Gate::denies('community_rule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CommunityRule();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
