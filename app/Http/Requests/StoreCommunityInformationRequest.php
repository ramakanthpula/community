<?php

namespace App\Http\Requests;

use App\Models\CommunityInformation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCommunityInformationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('community_information_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
            'security_office_mobile_no' => [
                'string',
                'required',
            ],
            'secretary_mobile_no' => [
                'string',
                'nullable',
            ],
            'moderator_mobile_no' => [
                'string',
                'nullable',
            ],
            'construction_year' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'required',
            ],
            'browse_file' => [
                'required',
            ],
        ];
    }
}
