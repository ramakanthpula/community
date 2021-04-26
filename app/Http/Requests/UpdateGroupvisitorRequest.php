<?php

namespace App\Http\Requests;

use App\Models\Groupvisitor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGroupvisitorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('groupvisitor_edit');
    }

    public function rules()
    {
        return [];
    }
}
