<?php

namespace App\Http\Requests;

use App\Models\Block;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBlockRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('block_create');
    }

    public function rules()
    {
        return [
            'block_name'          => [
                'string',
                'required',
            ],
            'block_admin_contact' => [
                'string',
                'required',
            ],
            'password'            => [
                'string',
                'required',
            ],
        ];
    }
}
