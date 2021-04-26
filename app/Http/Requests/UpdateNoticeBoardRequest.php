<?php

namespace App\Http\Requests;

use App\Models\NoticeBoard;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNoticeBoardRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('notice_board_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
