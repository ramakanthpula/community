<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\TransactionType;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTransactionTypeRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('transaction_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:transaction_types,id',
]
    
}

}