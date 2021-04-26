<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\CommunityInformation;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCommunityInformationRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('community_information_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:community_informations,id',
]
    
}

}