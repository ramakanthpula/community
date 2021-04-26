<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Unit;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyUnitRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:units,id',
]
    
}

}