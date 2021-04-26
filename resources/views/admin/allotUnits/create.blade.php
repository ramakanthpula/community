@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.allotUnit.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.allot-units.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="users_id">{{ trans('cruds.allotUnit.fields.users') }}</label>
                <select class="form-control select2 {{ $errors->has('users') ? 'is-invalid' : '' }}" name="users_id" id="users_id" required>
                    @foreach($users as $id => $users)
                        <option value="{{ $id }}" {{ old('users_id') == $id ? 'selected' : '' }}>{{ $users }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <div class="invalid-feedback">
                        {{ $errors->first('users') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.allotUnit.fields.users_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="units_id">{{ trans('cruds.allotUnit.fields.units') }}</label>
                <select class="form-control select2 {{ $errors->has('units') ? 'is-invalid' : '' }}" name="units_id" id="units_id" required>
                    @foreach($units as $id => $units)
                        <option value="{{ $id }}" {{ old('units_id') == $id ? 'selected' : '' }}>{{ $units }}</option>
                    @endforeach
                </select>
                @if($errors->has('units'))
                    <div class="invalid-feedback">
                        {{ $errors->first('units') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.allotUnit.fields.units_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="unitnames">{{ trans('cruds.allotUnit.fields.unitnames') }}</label>
                <input class="form-control {{ $errors->has('unitnames') ? 'is-invalid' : '' }}" type="text" name="unitnames" id="unitnames" value="{{ old('unitnames', '') }}" required>
                @if($errors->has('unitnames'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unitnames') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.allotUnit.fields.unitnames_helper') }}</span>
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