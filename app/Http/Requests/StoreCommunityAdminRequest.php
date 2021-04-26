<?php

namespace App\Http\Requests;

use App\Models\CommunityAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCommunityAdminRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('community_admin_create');
    }

    public function rules()
    {
        return [
            'email'    => [
                'string',
                'required',
                'unique:community_admins',
            ],
            'name'     => [
                'string',
                'required',
            ],
            'contact'  => [
                'string',
                'required',
            ],
            'password' => [
                'string',
                'required',
            ],
        ];
    }
}
