<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\AssignWorkman;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAssignWorkmanRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('assign_workman_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:assign_workmen,id',
]
    
}

}