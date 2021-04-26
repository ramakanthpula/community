@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.unit.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.units.update", [$unit->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="block_name_id">{{ trans('cruds.unit.fields.block_name') }}</label>
                <select class="form-control select2 {{ $errors->has('block_name') ? 'is-invalid' : '' }}" name="block_name_id" id="block_name_id">
                    @foreach($block_names as $id => $block_name)
                        <option value="{{ $id }}" {{ (old('block_name_id') ? old('block_name_id') : $unit->block_name->id ?? '') == $id ? 'selected' : '' }}>{{ $block_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('block_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('block_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.block_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="floor_name_id">{{ trans('cruds.unit.fields.floor_name') }}</label>
                <select class="form-control select2 {{ $errors->has('floor_name') ? 'is-invalid' : '' }}" name="floor_name_id" id="floor_name_id">
                    @foreach($floor_names as $id => $floor_name)
                        <option value="{{ $id }}" {{ (old('floor_name_id') ? old('floor_name_id') : $unit->floor_name->id ?? '') == $id ? 'selected' : '' }}>{{ $floor_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('floor_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('floor_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.floor_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_of_units">{{ trans('cruds.unit.fields.no_of_units') }}</label>
                <input class="form-control {{ $errors->has('no_of_units') ? 'is-invalid' : '' }}" type="text" name="no_of_units" id="no_of_units" value="{{ old('no_of_units', $unit->no_of_units) }}" required>
                @if($errors->has('no_of_units'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_of_units') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.no_of_units_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="unit_names">{{ trans('cruds.unit.fields.unit_names') }}</label>
                <input class="form-control {{ $errors->has('unit_names') ? 'is-invalid' : '' }}" type="text" name="unit_names" id="unit_names" value="{{ old('unit_names', $unit->unit_names) }}" required>
                @if($errors->has('unit_names'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit_names') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.unit_names_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.unit.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Unit::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $unit->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.unit.fields.status_helper') }}</span>
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