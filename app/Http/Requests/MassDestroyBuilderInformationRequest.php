<?php

namespace App\Http\Requests;

use App\Models\BuilderInformation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBuilderInformationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('builder_information_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:builder_informations,id',
        ];
    }
}
