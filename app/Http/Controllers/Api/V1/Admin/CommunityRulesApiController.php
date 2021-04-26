<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCommunityRuleRequest;
use App\Http\Requests\UpdateCommunityRuleRequest;
use App\Http\Resources\Admin\CommunityRuleResource;
use App\Models\CommunityRule;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommunityRulesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('community_rule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommunityRuleResource(CommunityRule::all());
    }

    public function store(StoreCommunityRuleRequest $request)
    {
        $communityRule = CommunityRule::create($request->all());

        return (new CommunityRuleResource($communityRule))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CommunityRule $communityRule)
    {
        abort_if(Gate::denies('community_rule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommunityRuleResource($communityRule);
    }

    public function update(UpdateCommunityRuleRequest $request, CommunityRule $communityRule)
    {
        $communityRule->update($request->all());

        return (new CommunityRuleResource($communityRule))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CommunityRule $communityRule)
    {
        abort_if(Gate::denies('community_rule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $communityRule->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
