<?php

namespace App\Http\Requests;

use App\Models\RenewTenancy;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRenewTenancyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('renew_tenancy_create');
    }

    public function rules()
    {
        return [
            'block_name_id' => [
                'required',
                'integer',
            ],
            'floor_name_id' => [
                'required',
                'integer',
            ],
            'owner_unit_id' => [
                'required',
                'integer',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
