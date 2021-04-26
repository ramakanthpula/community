<?php

namespace App\Http\Requests;

use App\Models\ManagementCommittee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateManagementCommitteeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('management_committee_edit');
    }

    public function rules()
    {
        return [
            'member_name' => [
                'string',
                'required',
                'unique:management_committees,member_name,' . request()->route('management_committee')->id,
            ],
            'email' => [
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'permanent_address' => [
                'required',
            ],
            'aadhaar' => [
                'string',
                'required',
            ],
            'designation_id' => [
                'required',
                'integer',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
