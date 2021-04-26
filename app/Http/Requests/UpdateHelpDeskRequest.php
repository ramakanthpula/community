<?php

namespace App\Http\Requests;

use App\Models\HelpDesk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHelpDeskRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('help_desk_edit');
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
            'flat_no' => [
                'string',
                'required',
            ],
            'timestamp' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'details' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'enquiry_types.*' => [
                'integer',
            ],
            'enquiry_types' => [
                'required',
                'array',
            ],
        ];
    }
}
