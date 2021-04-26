<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Designation;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDesignationRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('designation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:designations,id',
]
    
}

}