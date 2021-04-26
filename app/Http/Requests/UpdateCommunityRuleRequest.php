<?php

namespace App\Http\Requests;

use App\Models\CommunityRule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCommunityRuleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('community_rule_edit');
    }

    public function rules()
    {
        return [
            'apartment_policies' => [
                'required',
            ],
            'code_of_conduct'    => [
                'required',
            ],
        ];
    }
}
