<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\AllotUnit;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAllotUnitRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('allot_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:allot_units,id',
]
    
}

}