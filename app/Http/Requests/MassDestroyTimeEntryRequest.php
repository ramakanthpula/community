<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\TimeEntry;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTimeEntryRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('time_entry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:time_entries,id',
]
    
}

}