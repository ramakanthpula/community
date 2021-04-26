@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.builderInformation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.builder-informations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="company_name">{{ trans('cruds.builderInformation.fields.company_name') }}</label>
                <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', '') }}" required>
                @if($errors->has('company_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.builderInformation.fields.company_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="builder_name">{{ trans('cruds.builderInformation.fields.builder_name') }}</label>
                <input class="form-control {{ $errors->has('builder_name') ? 'is-invalid' : '' }}" type="text" name="builder_name" id="builder_name" value="{{ old('builder_name', '') }}" required>
                @if($errors->has('builder_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('builder_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.builderInformation.fields.builder_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="company_phone">{{ trans('cruds.builderInformation.fields.company_phone') }}</label>
                <input class="form-control {{ $errors->has('company_phone') ? 'is-invalid' : '' }}" type="text" name="company_phone" id="company_phone" value="{{ old('company_phone', '') }}" required>
                @if($errors->has('company_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.builderInformation.fields.company_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="company_address">{{ trans('cruds.builderInformation.fields.company_address') }}</label>
                <input class="form-control {{ $errors->has('company_address') ? 'is-invalid' : '' }}" type="text" name="company_address" id="company_address" value="{{ old('company_address', '') }}" required>
                @if($errors->has('company_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.builderInformation.fields.company_address_helper') }}</span>
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