<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\SkilledWorker;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySkilledWorkerRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('skilled_worker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:skilled_workers,id',
]
    
}

}