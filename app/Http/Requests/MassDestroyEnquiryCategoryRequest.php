<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\EnquiryCategory;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEnquiryCategoryRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('enquiry_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:enquiry_categories,id',
]
    
}

}