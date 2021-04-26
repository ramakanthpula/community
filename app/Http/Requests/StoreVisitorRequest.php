<?php

namespace App\Http\Requests;

use App\Models\Visitor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVisitorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('visitor_create');
    }

    public function rules()
    {
        return [
            'check_in_type' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'gender' => [
                'required',
            ],
            'address' => [
                'required',
            ],
            'company' => [
                'string',
                'nullable',
            ],
            'unit_no_id' => [
                'required',
                'integer',
            ],
            'photo' => [
                'string',
                'nullable',
            ],
            'in_time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'out_time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'whom_to_meet' => [
                'string',
                'nullable',
            ],
            'purpose_of_visit' => [
                'string',
                'nullable',
            ],
        ];
    }
}
