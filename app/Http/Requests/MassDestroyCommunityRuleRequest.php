<?php

namespace App\Http\Requests;

use App\Models\CommunityRule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCommunityRuleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('community_rule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:community_rules,id',
        ];
    }
}
