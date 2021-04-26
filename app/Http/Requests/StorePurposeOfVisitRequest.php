<?php

namespace App\Http\Requests;

use App\Models\PurposeOfVisit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePurposeOfVisitRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purpose_of_visit_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
