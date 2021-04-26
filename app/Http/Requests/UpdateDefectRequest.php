<?php

namespace App\Http\Requests;

use App\Models\Defect;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDefectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('defect_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'mobile' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'flat_no' => [
                'string',
                'required',
            ],
            'incident_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'defect_type_id' => [
                'required',
                'integer',
            ],
            'defect_sub_type_id' => [
                'required',
                'integer',
            ],
            'incident_location' => [
                'string',
                'required',
            ],
            'defect_details' => [
                'string',
                'required',
            ],
            'problem_description' => [
                'required',
            ],
            'convenient_time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'desired_outcome' => [
                'required',
            ],
        ];
    }
}
