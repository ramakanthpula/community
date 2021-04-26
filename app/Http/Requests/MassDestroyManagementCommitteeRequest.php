<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ManagementCommittee;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyManagementCommitteeRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('management_committee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:management_committees,id',
]
    
}

}