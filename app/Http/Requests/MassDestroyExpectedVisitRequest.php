<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ExpectedVisit;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExpectedVisitRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('expected_visit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:expected_visits,id',
]
    
}

}