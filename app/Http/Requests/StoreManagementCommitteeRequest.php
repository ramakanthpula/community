<?php

namespace App\Http\Requests;

use App\Models\ManagementCommittee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreManagementCommitteeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('management_committee_create');
    }

    public function rules()
    {
        return [
            'member_name' => [
                'string',
                'required',
                'unique:management_committees',
            ],
            'email' => [
                'required',
            ],
            'password' => [
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
