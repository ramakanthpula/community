<?php

namespace App\Http\Requests;

use App\Models\AllotUnit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAllotUnitRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('allot_unit_create');
    }

    public function rules()
    {
        return [
            'users_id' => [
                'required',
                'integer',
            ],
            'units_id' => [
                'required',
                'integer',
            ],
            'unitnames' => [
                'string',
                'required',
            ],
        ];
    }
}
