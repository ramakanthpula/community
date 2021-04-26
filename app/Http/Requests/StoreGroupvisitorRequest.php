<?php

namespace App\Http\Requests;

use App\Models\Groupvisitor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGroupvisitorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('groupvisitor_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
