<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ProjectStatus;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProjectStatusRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('project_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:project_statuses,id',
]
    
}

}