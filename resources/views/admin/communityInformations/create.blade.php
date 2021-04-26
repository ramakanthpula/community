@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.communityInformation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.community-informations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.communityInformation.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.communityInformation.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.communityInformation.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.communityInformation.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="security_office_mobile_no">{{ trans('cruds.communityInformation.fields.security_office_mobile_no') }}</label>
                <input class="form-control {{ $errors->has('security_office_mobile_no') ? 'is-invalid' : '' }}" type="text" name="security_office_mobile_no" id="security_office_mobile_no" value="{{ old('security_office_mobile_no', '') }}" required>
                @if($errors->has('security_office_mobile_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('security_office_mobile_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.communityInformation.fields.security_office_mobile_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="secretary_mobile_no">{{ trans('cruds.communityInformation.fields.secretary_mobile_no') }}</label>
                <input class="form-control {{ $errors->has('secretary_mobile_no') ? 'is-invalid' : '' }}" type="text" name="secretary_mobile_no" id="secretary_mobile_no" value="{{ old('secretary_mobile_no', '') }}">
                @if($errors->has('secretary_mobile_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('secretary_mobile_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.communityInformation.fields.secretary_mobile_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="moderator_mobile_no">{{ trans('cruds.communityInformation.fields.moderator_mobile_no') }}</label>
                <input class="form-control {{ $errors->has('moderator_mobile_no') ? 'is-invalid' : '' }}" type="text" name="moderator_mobile_no" id="moderator_mobile_no" value="{{ old('moderator_mobile_no', '') }}">
                @if($errors->has('moderator_mobile_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('moderator_mobile_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.communityInformation.fields.moderator_mobile_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="construction_year">{{ trans('cruds.communityInformation.fields.construction_year') }}</label>
                <input class="form-control {{ $errors->has('construction_year') ? 'is-invalid' : '' }}" type="text" name="construction_year" id="construction_year" value="{{ old('construction_year', '') }}">
                @if($errors->has('construction_year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('construction_year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.communityInformation.fields.construction_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.communityInformation.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.communityInformation.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="browse_file">{{ trans('cruds.communityInformation.fields.browse_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('browse_file') ? 'is-invalid' : '' }}" id="browse_file-dropzone">
                </div>
                @if($errors->has('browse_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('browse_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.communityInformation.fields.browse_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.communityInformation.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\CommunityInformation::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.communityInformation.fields.status_helper') }}</span>
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
    Dropzone.options.browseFileDropzone = {
    url: '{{ route('admin.community-informations.storeMedia') }}',
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
      $('form').find('input[name="browse_file"]').remove()
      $('form').append('<input type="hidden" name="browse_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="browse_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($communityInformation) && $communityInformation->browse_file)
      var file = {!! json_encode($communityInformation->browse_file) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="browse_file" value="' + file.file_name + '">')
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