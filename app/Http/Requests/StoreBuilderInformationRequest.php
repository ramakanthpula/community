<?php

namespace App\Http\Requests;

use App\Models\BuilderInformation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBuilderInformationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('builder_information_create');
    }

    public function rules()
    {
        return [
            'company_name'    => [
                'string',
                'required',
            ],
            'builder_name'    => [
                'string',
                'required',
            ],
            'company_phone'   => [
                'string',
                'required',
            ],
            'company_address' => [
                'string',
                'required',
            ],
        ];
    }
}
