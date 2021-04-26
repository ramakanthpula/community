@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.defect.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.defects.update", [$defect->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="users_id">{{ trans('cruds.defect.fields.users') }}</label>
                <select class="form-control select2 {{ $errors->has('users') ? 'is-invalid' : '' }}" name="users_id" id="users_id">
                    @foreach($users as $id => $users)
                        <option value="{{ $id }}" {{ (old('users_id') ? old('users_id') : $defect->users->id ?? '') == $id ? 'selected' : '' }}>{{ $users }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <div class="invalid-feedback">
                        {{ $errors->first('users') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.defect.fields.users_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.defect.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $defect->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.defect.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile">{{ trans('cruds.defect.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', $defect->mobile) }}" required>
                @if($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.defect.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.defect.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $defect->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.defect.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="flat_no">{{ trans('cruds.defect.fields.flat_no') }}</label>
                <input class="form-control {{ $errors->has('flat_no') ? 'is-invalid' : '' }}" type="text" name="flat_no" id="flat_no" value="{{ old('flat_no', $defect->flat_no) }}" required>
                @if($errors->has('flat_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('flat_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.defect.fields.flat_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="incident_date">{{ trans('cruds.defect.fields.incident_date') }}</label>
                <input class="form-control datetime {{ $errors->has('incident_date') ? 'is-invalid' : '' }}" type="text" name="incident_date" id="incident_date" value="{{ old('incident_date', $defect->incident_date) }}">
                @if($errors->has('incident_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('incident_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.defect.fields.incident_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="defect_type_id">{{ trans('cruds.defect.fields.defect_type') }}</label>
                <select class="form-control select2 {{ $errors->has('defect_type') ? 'is-invalid' : '' }}" name="defect_type_id" id="defect_type_id" required>
                    @foreach($defect_types as $id => $defect_type)
                        <option value="{{ $id }}" {{ (old('defect_type_id') ? old('defect_type_id') : $defect->defect_type->id ?? '') == $id ? 'selected' : '' }}>{{ $defect_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('defect_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('defect_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.defect.fields.defect_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="defect_sub_type_id">{{ trans('cruds.defect.fields.defect_sub_type') }}</label>
                <select class="form-control select2 {{ $errors->has('defect_sub_type') ? 'is-invalid' : '' }}" name="defect_sub_type_id" id="defect_sub_type_id" required>
                    @foreach($defect_sub_types as $id => $defect_sub_type)
                        <option value="{{ $id }}" {{ (old('defect_sub_type_id') ? old('defect_sub_type_id') : $defect->defect_sub_type->id ?? '') == $id ? 'selected' : '' }}>{{ $defect_sub_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('defect_sub_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('defect_sub_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.defect.fields.defect_sub_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="incident_location">{{ trans('cruds.defect.fields.incident_location') }}</label>
                <input class="form-control {{ $errors->has('incident_location') ? 'is-invalid' : '' }}" type="text" name="incident_location" id="incident_location" value="{{ old('incident_location', $defect->incident_location) }}" required>
                @if($errors->has('incident_location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('incident_location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.defect.fields.incident_location_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="defect_details">{{ trans('cruds.defect.fields.defect_details') }}</label>
                <input class="form-control {{ $errors->has('defect_details') ? 'is-invalid' : '' }}" type="text" name="defect_details" id="defect_details" value="{{ old('defect_details', $defect->defect_details) }}" required>
                @if($errors->has('defect_details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('defect_details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.defect.fields.defect_details_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="problem_description">{{ trans('cruds.defect.fields.problem_description') }}</label>
                <textarea class="form-control {{ $errors->has('problem_description') ? 'is-invalid' : '' }}" name="problem_description" id="problem_description" required>{{ old('problem_description', $defect->problem_description) }}</textarea>
                @if($errors->has('problem_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('problem_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.defect.fields.problem_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="convenient_time">{{ trans('cruds.defect.fields.convenient_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('convenient_time') ? 'is-invalid' : '' }}" type="text" name="convenient_time" id="convenient_time" value="{{ old('convenient_time', $defect->convenient_time) }}" required>
                @if($errors->has('convenient_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('convenient_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.defect.fields.convenient_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="desired_outcome">{{ trans('cruds.defect.fields.desired_outcome') }}</label>
                <textarea class="form-control {{ $errors->has('desired_outcome') ? 'is-invalid' : '' }}" name="desired_outcome" id="desired_outcome" required>{{ old('desired_outcome', $defect->desired_outcome) }}</textarea>
                @if($errors->has('desired_outcome'))
                    <div class="invalid-feedback">
                        {{ $errors->first('desired_outcome') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.defect.fields.desired_outcome_helper') }}</span>
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