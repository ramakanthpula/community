<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ClientStatus;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClientStatusRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('client_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:client_statuses,id',
]
    
}

}