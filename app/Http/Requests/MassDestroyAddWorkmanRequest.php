<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\AddWorkman;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAddWorkmanRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('add_workman_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:add_workmen,id',
]
    
}

}