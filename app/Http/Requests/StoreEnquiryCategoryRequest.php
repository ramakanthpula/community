<?php

namespace App\Http\Requests;

use App\Models\EnquiryCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEnquiryCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('enquiry_category_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
