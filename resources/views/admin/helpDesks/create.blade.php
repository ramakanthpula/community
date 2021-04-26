@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.helpDesk.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.help-desks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.helpDesk.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.helpDesk.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile">{{ trans('cruds.helpDesk.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', '') }}" required>
                @if($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.helpDesk.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="flat_no">{{ trans('cruds.helpDesk.fields.flat_no') }}</label>
                <input class="form-control {{ $errors->has('flat_no') ? 'is-invalid' : '' }}" type="text" name="flat_no" id="flat_no" value="{{ old('flat_no', '') }}" required>
                @if($errors->has('flat_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('flat_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.helpDesk.fields.flat_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="timestamp">{{ trans('cruds.helpDesk.fields.timestamp') }}</label>
                <input class="form-control datetime {{ $errors->has('timestamp') ? 'is-invalid' : '' }}" type="text" name="timestamp" id="timestamp" value="{{ old('timestamp') }}" required>
                @if($errors->has('timestamp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('timestamp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.helpDesk.fields.timestamp_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="enquiry_types">{{ trans('cruds.helpDesk.fields.enquiry_type') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('enquiry_types') ? 'is-invalid' : '' }}" name="enquiry_types[]" id="enquiry_types" multiple required>
                    @foreach($enquiry_types as $id => $enquiry_type)
                        <option value="{{ $id }}" {{ in_array($id, old('enquiry_types', [])) ? 'selected' : '' }}>{{ $enquiry_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('enquiry_types'))
                    <div class="invalid-feedback">
                        {{ $errors->first('enquiry_types') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.helpDesk.fields.enquiry_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="details">{{ trans('cruds.helpDesk.fields.details') }}</label>
                <textarea class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details" id="details" required>{{ old('details') }}</textarea>
                @if($errors->has('details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.helpDesk.fields.details_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.helpDesk.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.helpDesk.fields.description_helper') }}</span>
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