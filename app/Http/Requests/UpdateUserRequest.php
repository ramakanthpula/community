<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'type' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'contact' => [
                'string',
                'required',
            ],
            'alternate_contact' => [
                'string',
                'required',
            ],
            'age' => [
                'string',
                'nullable',
            ],
            'profession' => [
                'string',
                'nullable',
            ],
            'present_address' => [
                'string',
                'required',
            ],
            'permanent_address' => [
                'string',
                'required',
            ],
            'nid' => [
                'string',
                'required',
            ],
            'block_name_id' => [
                'required',
                'integer',
            ],
            'floor_name_id' => [
                'required',
                'integer',
            ],
            'units_id' => [
                'required',
                'integer',
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
