<?php

namespace App\Http\Requests;

use App\Models\DefectSubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDefectSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('defect_sub_category_edit');
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
