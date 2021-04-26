<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Defect;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDefectRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('defect_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:defects,id',
]
    
}

}