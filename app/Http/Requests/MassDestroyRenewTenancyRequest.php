<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\RenewTenancy;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRenewTenancyRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('renew_tenancy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:renew_tenancies,id',
]
    
}

}