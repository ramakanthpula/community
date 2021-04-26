@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.assignWorkman.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.assign-workmen.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.assignWorkman.fields.unit_assignment') }}</label>
                @foreach(App\Models\AssignWorkman::UNIT_ASSIGNMENT_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('unit_assignment') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="unit_assignment_{{ $key }}" name="unit_assignment" value="{{ $key }}" {{ old('unit_assignment', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="unit_assignment_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('unit_assignment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit_assignment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignWorkman.fields.unit_assignment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="working_area">{{ trans('cruds.assignWorkman.fields.working_area') }}</label>
                <textarea class="form-control {{ $errors->has('working_area') ? 'is-invalid' : '' }}" name="working_area" id="working_area">{{ old('working_area') }}</textarea>
                @if($errors->has('working_area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('working_area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignWorkman.fields.working_area_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.assignWorkman.fields.weekly_off') }}</label>
                @foreach(App\Models\AssignWorkman::WEEKLY_OFF_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('weekly_off') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="weekly_off_{{ $key }}" name="weekly_off" value="{{ $key }}" {{ old('weekly_off', 'No') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="weekly_off_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('weekly_off'))
                    <div class="invalid-feedback">
                        {{ $errors->first('weekly_off') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignWorkman.fields.weekly_off_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contract_effective_date">{{ trans('cruds.assignWorkman.fields.contract_effective_date') }}</label>
                <input class="form-control date {{ $errors->has('contract_effective_date') ? 'is-invalid' : '' }}" type="text" name="contract_effective_date" id="contract_effective_date" value="{{ old('contract_effective_date') }}">
                @if($errors->has('contract_effective_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contract_effective_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignWorkman.fields.contract_effective_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="from_date">{{ trans('cruds.assignWorkman.fields.from_date') }}</label>
                <input class="form-control date {{ $errors->has('from_date') ? 'is-invalid' : '' }}" type="text" name="from_date" id="from_date" value="{{ old('from_date') }}" required>
                @if($errors->has('from_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignWorkman.fields.from_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="to_date">{{ trans('cruds.assignWorkman.fields.to_date') }}</label>
                <input class="form-control date {{ $errors->has('to_date') ? 'is-invalid' : '' }}" type="text" name="to_date" id="to_date" value="{{ old('to_date') }}">
                @if($errors->has('to_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('to_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignWorkman.fields.to_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.assignWorkman.fields.gate_pass_status') }}</label>
                <select class="form-control {{ $errors->has('gate_pass_status') ? 'is-invalid' : '' }}" name="gate_pass_status" id="gate_pass_status" required>
                    <option value disabled {{ old('gate_pass_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\AssignWorkman::GATE_PASS_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gate_pass_status', 'Active') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gate_pass_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gate_pass_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignWorkman.fields.gate_pass_status_helper') }}</span>
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