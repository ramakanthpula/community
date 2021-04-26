<?php

namespace App\Http\Requests;

use App\Models\NoticeBoard;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNoticeBoardRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('notice_board_create');
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
