@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.managementCommittee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.management-committees.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="member_name">{{ trans('cruds.managementCommittee.fields.member_name') }}</label>
                <input class="form-control {{ $errors->has('member_name') ? 'is-invalid' : '' }}" type="text" name="member_name" id="member_name" value="{{ old('member_name', '') }}" required>
                @if($errors->has('member_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('member_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managementCommittee.fields.member_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.managementCommittee.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managementCommittee.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.managementCommittee.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managementCommittee.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.managementCommittee.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managementCommittee.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="present_address">{{ trans('cruds.managementCommittee.fields.present_address') }}</label>
                <textarea class="form-control {{ $errors->has('present_address') ? 'is-invalid' : '' }}" name="present_address" id="present_address">{{ old('present_address') }}</textarea>
                @if($errors->has('present_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('present_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managementCommittee.fields.present_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="permanent_address">{{ trans('cruds.managementCommittee.fields.permanent_address') }}</label>
                <textarea class="form-control {{ $errors->has('permanent_address') ? 'is-invalid' : '' }}" name="permanent_address" id="permanent_address" required>{{ old('permanent_address') }}</textarea>
                @if($errors->has('permanent_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permanent_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managementCommittee.fields.permanent_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="aadhaar">{{ trans('cruds.managementCommittee.fields.aadhaar') }}</label>
                <input class="form-control {{ $errors->has('aadhaar') ? 'is-invalid' : '' }}" type="text" name="aadhaar" id="aadhaar" value="{{ old('aadhaar', '') }}" required>
                @if($errors->has('aadhaar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('aadhaar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managementCommittee.fields.aadhaar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="designation_id">{{ trans('cruds.managementCommittee.fields.designation') }}</label>
                <select class="form-control select2 {{ $errors->has('designation') ? 'is-invalid' : '' }}" name="designation_id" id="designation_id" required>
                    @foreach($designations as $id => $designation)
                        <option value="{{ $id }}" {{ old('designation_id') == $id ? 'selected' : '' }}>{{ $designation }}</option>
                    @endforeach
                </select>
                @if($errors->has('designation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('designation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managementCommittee.fields.designation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.managementCommittee.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managementCommittee.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.managementCommittee.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}">
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managementCommittee.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.managementCommittee.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managementCommittee.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.managementCommittee.fields.member_status') }}</label>
                <select class="form-control {{ $errors->has('member_status') ? 'is-invalid' : '' }}" name="member_status" id="member_status">
                    <option value disabled {{ old('member_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ManagementCommittee::MEMBER_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('member_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('member_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('member_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managementCommittee.fields.member_status_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.management-committees.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($managementCommittee) && $managementCommittee->photo)
      var file = {!! json_encode($managementCommittee->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection