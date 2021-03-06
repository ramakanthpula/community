<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\IncomeSource;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIncomeSourceRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('income_source_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:income_sources,id',
]
    
}

}