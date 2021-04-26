<?php

namespace App\Http\Requests;

use App\Models\Floor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFloorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('floor_edit');
    }

    public function rules()
    {
        return [
            'floor_name'    => [
                'string',
                'required',
            ],
            'block_name_id' => [
                'required',
                'integer',
            ],
            'no_of_units'   => [
                'string',
                'required',
            ],
        ];
    }
}
