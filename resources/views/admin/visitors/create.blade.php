@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.visitor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.visitors.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.visitor.fields.check_in_type') }}</label>
                @foreach(App\Models\Visitor::CHECK_IN_TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('check_in_type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="check_in_type_{{ $key }}" name="check_in_type" value="{{ $key }}" {{ old('check_in_type', 'Individual') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="check_in_type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('check_in_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('check_in_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.check_in_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.visitor.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.visitor.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender" required>
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Visitor::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', 'Male') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.visitor.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" required>{{ old('address') }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="company">{{ trans('cruds.visitor.fields.company') }}</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', '') }}">
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="unit_no_id">{{ trans('cruds.visitor.fields.unit_no') }}</label>
                <select class="form-control select2 {{ $errors->has('unit_no') ? 'is-invalid' : '' }}" name="unit_no_id" id="unit_no_id" required>
                    @foreach($unit_nos as $id => $entry)
                        <option value="{{ $id }}" {{ old('unit_no_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('unit_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.unit_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.visitor.fields.photo') }}</label>
                <input class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" type="text" name="photo" id="photo" value="{{ old('photo', '') }}">
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="in_time">{{ trans('cruds.visitor.fields.in_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('in_time') ? 'is-invalid' : '' }}" type="text" name="in_time" id="in_time" value="{{ old('in_time') }}">
                @if($errors->has('in_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('in_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.in_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="out_time">{{ trans('cruds.visitor.fields.out_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('out_time') ? 'is-invalid' : '' }}" type="text" name="out_time" id="out_time" value="{{ old('out_time') }}">
                @if($errors->has('out_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('out_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.out_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="whom_to_meet">{{ trans('cruds.visitor.fields.whom_to_meet') }}</label>
                <input class="form-control {{ $errors->has('whom_to_meet') ? 'is-invalid' : '' }}" type="text" name="whom_to_meet" id="whom_to_meet" value="{{ old('whom_to_meet', '') }}">
                @if($errors->has('whom_to_meet'))
                    <div class="invalid-feedback">
                        {{ $errors->first('whom_to_meet') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.whom_to_meet_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="purpose_of_visit">{{ trans('cruds.visitor.fields.purpose_of_visit') }}</label>
                <input class="form-control {{ $errors->has('purpose_of_visit') ? 'is-invalid' : '' }}" type="text" name="purpose_of_visit" id="purpose_of_visit" value="{{ old('purpose_of_visit', '') }}">
                @if($errors->has('purpose_of_visit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purpose_of_visit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visitor.fields.purpose_of_visit_helper') }}</span>
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