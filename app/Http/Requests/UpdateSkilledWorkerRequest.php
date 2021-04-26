<?php

namespace App\Http\Requests;

use App\Models\SkilledWorker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSkilledWorkerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('skilled_worker_edit');
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
