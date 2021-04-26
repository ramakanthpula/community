@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.expectedVisit.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.expected-visits.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.expectedVisit.fields.visit_type') }}</label>
                @foreach(App\Models\ExpectedVisit::VISIT_TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('visit_type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="visit_type_{{ $key }}" name="visit_type" value="{{ $key }}" {{ old('visit_type', 'Invitation') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="visit_type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('visit_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('visit_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expectedVisit.fields.visit_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_no_id">{{ trans('cruds.expectedVisit.fields.unit_no') }}</label>
                <select class="form-control select2 {{ $errors->has('unit_no') ? 'is-invalid' : '' }}" name="unit_no_id" id="unit_no_id">
                    @foreach($unit_nos as $id => $entry)
                        <option value="{{ $id }}" {{ old('unit_no_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('unit_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expectedVisit.fields.unit_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.expectedVisit.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expectedVisit.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_of_persons">{{ trans('cruds.expectedVisit.fields.no_of_persons') }}</label>
                <input class="form-control {{ $errors->has('no_of_persons') ? 'is-invalid' : '' }}" type="text" name="no_of_persons" id="no_of_persons" value="{{ old('no_of_persons', '') }}" required>
                @if($errors->has('no_of_persons'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_of_persons') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expectedVisit.fields.no_of_persons_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.expectedVisit.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender" required>
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ExpectedVisit::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', 'Male') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expectedVisit.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.expectedVisit.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address') }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expectedVisit.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.expectedVisit.fields.check_in_type') }}</label>
                @foreach(App\Models\ExpectedVisit::CHECK_IN_TYPE_RADIO as $key => $label)
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
                <span class="help-block">{{ trans('cruds.expectedVisit.fields.check_in_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.expectedVisit.fields.visiting_type') }}</label>
                @foreach(App\Models\ExpectedVisit::VISITING_TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('visiting_type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="visiting_type_{{ $key }}" name="visiting_type" value="{{ $key }}" {{ old('visiting_type', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="visiting_type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('visiting_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('visiting_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expectedVisit.fields.visiting_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.expectedVisit.fields.check_in_by') }}</label>
                @foreach(App\Models\ExpectedVisit::CHECK_IN_BY_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('check_in_by') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="check_in_by_{{ $key }}" name="check_in_by" value="{{ $key }}" {{ old('check_in_by', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="check_in_by_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('check_in_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('check_in_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expectedVisit.fields.check_in_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.expectedVisit.fields.vehicle_type') }}</label>
                @foreach(App\Models\ExpectedVisit::VEHICLE_TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('vehicle_type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="vehicle_type_{{ $key }}" name="vehicle_type" value="{{ $key }}" {{ old('vehicle_type', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="vehicle_type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('vehicle_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vehicle_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expectedVisit.fields.vehicle_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expected_in_date">{{ trans('cruds.expectedVisit.fields.expected_in_date') }}</label>
                <input class="form-control date {{ $errors->has('expected_in_date') ? 'is-invalid' : '' }}" type="text" name="expected_in_date" id="expected_in_date" value="{{ old('expected_in_date') }}">
                @if($errors->has('expected_in_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expected_in_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expectedVisit.fields.expected_in_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="expected_in_time">{{ trans('cruds.expectedVisit.fields.expected_in_time') }}</label>
                <input class="form-control {{ $errors->has('expected_in_time') ? 'is-invalid' : '' }}" type="text" name="expected_in_time" id="expected_in_time" value="{{ old('expected_in_time', '') }}" required>
                @if($errors->has('expected_in_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expected_in_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expectedVisit.fields.expected_in_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="purposes">{{ trans('cruds.expectedVisit.fields.purpose') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('purposes') ? 'is-invalid' : '' }}" name="purposes[]" id="purposes" multiple>
                    @foreach($purposes as $id => $purpose)
                        <option value="{{ $id }}" {{ in_array($id, old('purposes', [])) ? 'selected' : '' }}>{{ $purpose }}</option>
                    @endforeach
                </select>
                @if($errors->has('purposes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purposes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expectedVisit.fields.purpose_helper') }}</span>
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