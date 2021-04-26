<?php

namespace App\Http\Requests;

use App\Models\CommunityAdmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCommunityAdminRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('community_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:community_admins,id',
        ];
    }
}
