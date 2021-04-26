@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.defectSubCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.defect-sub-categories.update", [$defectSubCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="defect_category_id">{{ trans('cruds.defectSubCategory.fields.defect_category') }}</label>
                <select class="form-control select2 {{ $errors->has('defect_category') ? 'is-invalid' : '' }}" name="defect_category_id" id="defect_category_id">
                    @foreach($defect_categories as $id => $defect_category)
                        <option value="{{ $id }}" {{ (old('defect_category_id') ? old('defect_category_id') : $defectSubCategory->defect_category->id ?? '') == $id ? 'selected' : '' }}>{{ $defect_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('defect_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('defect_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.defectSubCategory.fields.defect_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.defectSubCategory.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $defectSubCategory->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.defectSubCategory.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection