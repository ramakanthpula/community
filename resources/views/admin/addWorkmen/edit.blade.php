@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.addWorkman.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.add-workmen.update", [$addWorkman->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.addWorkman.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $addWorkman->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addWorkman.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_of_birth">{{ trans('cruds.addWorkman.fields.date_of_birth') }}</label>
                <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $addWorkman->date_of_birth) }}" required>
                @if($errors->has('date_of_birth'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_birth') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addWorkman.fields.date_of_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.addWorkman.fields.category') }}</label>
                @foreach(App\Models\AddWorkman::CATEGORY_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('category') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="category_{{ $key }}" name="category" value="{{ $key }}" {{ old('category', $addWorkman->category) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="category_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addWorkman.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="skilled_id">{{ trans('cruds.addWorkman.fields.skilled') }}</label>
                <select class="form-control select2 {{ $errors->has('skilled') ? 'is-invalid' : '' }}" name="skilled_id" id="skilled_id" required>
                    @foreach($skilleds as $id => $entry)
                        <option value="{{ $id }}" {{ (old('skilled_id') ? old('skilled_id') : $addWorkman->skilled->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('skilled'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skilled') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addWorkman.fields.skilled_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address_line_1">{{ trans('cruds.addWorkman.fields.address_line_1') }}</label>
                <textarea class="form-control {{ $errors->has('address_line_1') ? 'is-invalid' : '' }}" name="address_line_1" id="address_line_1" required>{{ old('address_line_1', $addWorkman->address_line_1) }}</textarea>
                @if($errors->has('address_line_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_line_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addWorkman.fields.address_line_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_line_2">{{ trans('cruds.addWorkman.fields.address_line_2') }}</label>
                <textarea class="form-control {{ $errors->has('address_line_2') ? 'is-invalid' : '' }}" name="address_line_2" id="address_line_2">{{ old('address_line_2', $addWorkman->address_line_2) }}</textarea>
                @if($errors->has('address_line_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_line_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addWorkman.fields.address_line_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city">{{ trans('cruds.addWorkman.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $addWorkman->city) }}" required>
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addWorkman.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="father_husband">{{ trans('cruds.addWorkman.fields.father_husband') }}</label>
                <input class="form-control {{ $errors->has('father_husband') ? 'is-invalid' : '' }}" type="text" name="father_husband" id="father_husband" value="{{ old('father_husband', $addWorkman->father_husband) }}" required>
                @if($errors->has('father_husband'))
                    <div class="invalid-feedback">
                        {{ $errors->first('father_husband') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addWorkman.fields.father_husband_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.addWorkman.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\AddWorkman::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', $addWorkman->gender) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addWorkman.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pin_code">{{ trans('cruds.addWorkman.fields.pin_code') }}</label>
                <input class="form-control {{ $errors->has('pin_code') ? 'is-invalid' : '' }}" type="text" name="pin_code" id="pin_code" value="{{ old('pin_code', $addWorkman->pin_code) }}" required>
                @if($errors->has('pin_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pin_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addWorkman.fields.pin_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_of_joining">{{ trans('cruds.addWorkman.fields.date_of_joining') }}</label>
                <input class="form-control date {{ $errors->has('date_of_joining') ? 'is-invalid' : '' }}" type="text" name="date_of_joining" id="date_of_joining" value="{{ old('date_of_joining', $addWorkman->date_of_joining) }}" required>
                @if($errors->has('date_of_joining'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_joining') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addWorkman.fields.date_of_joining_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="aadhaar_number">{{ trans('cruds.addWorkman.fields.aadhaar_number') }}</label>
                <input class="form-control {{ $errors->has('aadhaar_number') ? 'is-invalid' : '' }}" type="text" name="aadhaar_number" id="aadhaar_number" value="{{ old('aadhaar_number', $addWorkman->aadhaar_number) }}" required>
                @if($errors->has('aadhaar_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('aadhaar_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addWorkman.fields.aadhaar_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.addWorkman.fields.blood_group') }}</label>
                <select class="form-control {{ $errors->has('blood_group') ? 'is-invalid' : '' }}" name="blood_group" id="blood_group" required>
                    <option value disabled {{ old('blood_group', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\AddWorkman::BLOOD_GROUP_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('blood_group', $addWorkman->blood_group) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('blood_group'))
                    <div class="invalid-feedback">
                        {{ $errors->first('blood_group') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addWorkman.fields.blood_group_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="photo">{{ trans('cruds.addWorkman.fields.photo') }}</label>
                <input class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" type="text" name="photo" id="photo" value="{{ old('photo', $addWorkman->photo) }}" required>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addWorkman.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vehicle_number">{{ trans('cruds.addWorkman.fields.vehicle_number') }}</label>
                <input class="form-control {{ $errors->has('vehicle_number') ? 'is-invalid' : '' }}" type="text" name="vehicle_number" id="vehicle_number" value="{{ old('vehicle_number', $addWorkman->vehicle_number) }}">
                @if($errors->has('vehicle_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vehicle_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addWorkman.fields.vehicle_number_helper') }}</span>
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