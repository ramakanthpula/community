<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\NoticeBoard;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNoticeBoardRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('notice_board_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:notice_boards,id',
]
    
}

}