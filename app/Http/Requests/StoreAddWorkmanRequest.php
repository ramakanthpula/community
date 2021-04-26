<?php

namespace App\Http\Requests;

use App\Models\AddWorkman;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddWorkmanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_workman_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'date_of_birth' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'category' => [
                'required',
            ],
            'skilled_id' => [
                'required',
                'integer',
            ],
            'address_line_1' => [
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            'father_husband' => [
                'string',
                'required',
            ],
            'pin_code' => [
                'string',
                'required',
            ],
            'date_of_joining' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'aadhaar_number' => [
                'string',
                'required',
            ],
            'blood_group' => [
                'required',
            ],
            'photo' => [
                'string',
                'required',
            ],
            'vehicle_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
