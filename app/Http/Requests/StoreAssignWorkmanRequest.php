<?php

namespace App\Http\Requests;

use App\Models\AssignWorkman;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssignWorkmanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('assign_workman_create');
    }

    public function rules()
    {
        return [
            'unit_assignment' => [
                'required',
            ],
            'weekly_off' => [
                'required',
            ],
            'contract_effective_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'from_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'to_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'gate_pass_status' => [
                'required',
            ],
        ];
    }
}
