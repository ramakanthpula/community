<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Client;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClientRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('client_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:clients,id',
]
    
}

}