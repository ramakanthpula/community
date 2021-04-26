<?php

namespace App\Http\Requests;

use App\Models\ExpectedVisit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExpectedVisitRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('expected_visit_create');
    }

    public function rules()
    {
        return [
            'visit_type' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'no_of_persons' => [
                'string',
                'required',
            ],
            'gender' => [
                'required',
            ],
            'check_in_type' => [
                'required',
            ],
            'visiting_type' => [
                'required',
            ],
            'check_in_by' => [
                'required',
            ],
            'vehicle_type' => [
                'required',
            ],
            'expected_in_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'expected_in_time' => [
                'string',
                'required',
            ],
            'purposes.*' => [
                'integer',
            ],
            'purposes' => [
                'array',
            ],
        ];
    }
}
