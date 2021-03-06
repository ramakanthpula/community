<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\CrmNote;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCrmNoteRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('crm_note_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:crm_notes,id',
]
    
}

}