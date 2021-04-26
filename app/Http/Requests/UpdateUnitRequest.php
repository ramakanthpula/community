<?php

namespace App\Http\Requests;

use App\Models\Unit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUnitRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('unit_edit');
    }

    public function rules()
    {
        return [
            'no_of_units' => [
                'string',
                'required',
            ],
            'unit_names' => [
                'string',
                'required',
            ],
        ];
    }
}
