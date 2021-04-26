<?php

namespace App\Http\Requests;

use App\Models\SkilledWorker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSkilledWorkerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('skilled_worker_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
