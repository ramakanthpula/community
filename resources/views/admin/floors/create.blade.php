@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.floor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.floors.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="floor_name">{{ trans('cruds.floor.fields.floor_name') }}</label>
                <input class="form-control {{ $errors->has('floor_name') ? 'is-invalid' : '' }}" type="text" name="floor_name" id="floor_name" value="{{ old('floor_name', '') }}" required>
                @if($errors->has('floor_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('floor_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.floor.fields.floor_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="block_name_id">{{ trans('cruds.floor.fields.block_name') }}</label>
                <select class="form-control select2 {{ $errors->has('block_name') ? 'is-invalid' : '' }}" name="block_name_id" id="block_name_id" required>
                    @foreach($block_names as $id => $block_name)
                        <option value="{{ $id }}" {{ old('block_name_id') == $id ? 'selected' : '' }}>{{ $block_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('block_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('block_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.floor.fields.block_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_of_units">{{ trans('cruds.floor.fields.no_of_units') }}</label>
                <input class="form-control {{ $errors->has('no_of_units') ? 'is-invalid' : '' }}" type="text" name="no_of_units" id="no_of_units" value="{{ old('no_of_units', '') }}" required>
                @if($errors->has('no_of_units'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_of_units') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.floor.fields.no_of_units_helper') }}</span>
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