<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\PurposeOfVisit;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPurposeOfVisitRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('purpose_of_visit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:purpose_of_visits,id',
]
    
}

}