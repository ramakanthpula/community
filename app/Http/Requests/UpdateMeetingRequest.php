<?php

namespace App\Http\Requests;

use App\Models\Meeting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMeetingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('meeting_edit');
    }

    public function rules()
    {
        return [
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'from' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'to' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'venue' => [
                'string',
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
            'attendees' => [
                'required',
            ],
        ];
    }
}
