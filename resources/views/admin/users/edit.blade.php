@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.user.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\User::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $user->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('approved') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="approved" value="0">
                    <input class="form-check-input" type="checkbox" name="approved" id="approved" value="1" {{ $user->approved || old('approved', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="approved">{{ trans('cruds.user.fields.approved') }}</label>
                </div>
                @if($errors->has('approved'))
                    <div class="invalid-feedback">
                        {{ $errors->first('approved') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.approved_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contact">{{ trans('cruds.user.fields.contact') }}</label>
                <input class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}" type="text" name="contact" id="contact" value="{{ old('contact', $user->contact) }}" required>
                @if($errors->has('contact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alternate_contact">{{ trans('cruds.user.fields.alternate_contact') }}</label>
                <input class="form-control {{ $errors->has('alternate_contact') ? 'is-invalid' : '' }}" type="text" name="alternate_contact" id="alternate_contact" value="{{ old('alternate_contact', $user->alternate_contact) }}" required>
                @if($errors->has('alternate_contact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alternate_contact') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.alternate_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="age">{{ trans('cruds.user.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="text" name="age" id="age" value="{{ old('age', $user->age) }}">
                @if($errors->has('age'))
                    <div class="invalid-feedback">
                        {{ $errors->first('age') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profession">{{ trans('cruds.user.fields.profession') }}</label>
                <input class="form-control {{ $errors->has('profession') ? 'is-invalid' : '' }}" type="text" name="profession" id="profession" value="{{ old('profession', $user->profession) }}">
                @if($errors->has('profession'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profession') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.profession_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="present_address">{{ trans('cruds.user.fields.present_address') }}</label>
                <input class="form-control {{ $errors->has('present_address') ? 'is-invalid' : '' }}" type="text" name="present_address" id="present_address" value="{{ old('present_address', $user->present_address) }}" required>
                @if($errors->has('present_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('present_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.present_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="permanent_address">{{ trans('cruds.user.fields.permanent_address') }}</label>
                <input class="form-control {{ $errors->has('permanent_address') ? 'is-invalid' : '' }}" type="text" name="permanent_address" id="permanent_address" value="{{ old('permanent_address', $user->permanent_address) }}" required>
                @if($errors->has('permanent_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permanent_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.permanent_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nid">{{ trans('cruds.user.fields.nid') }}</label>
                <input class="form-control {{ $errors->has('nid') ? 'is-invalid' : '' }}" type="text" name="nid" id="nid" value="{{ old('nid', $user->nid) }}" required>
                @if($errors->has('nid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.nid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="photo">{{ trans('cruds.user.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="block_name_id">{{ trans('cruds.user.fields.block_name') }}</label>
                <select class="form-control select2 {{ $errors->has('block_name') ? 'is-invalid' : '' }}" name="block_name_id" id="block_name_id" required>
                    @foreach($block_names as $id => $entry)
                        <option value="{{ $id }}" {{ (old('block_name_id') ? old('block_name_id') : $user->block_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('block_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('block_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.block_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="floor_name_id">{{ trans('cruds.user.fields.floor_name') }}</label>
                <select class="form-control select2 {{ $errors->has('floor_name') ? 'is-invalid' : '' }}" name="floor_name_id" id="floor_name_id" required>
                    @foreach($floor_names as $id => $entry)
                        <option value="{{ $id }}" {{ (old('floor_name_id') ? old('floor_name_id') : $user->floor_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('floor_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('floor_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.floor_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="units_id">{{ trans('cruds.user.fields.units') }}</label>
                <select class="form-control select2 {{ $errors->has('units') ? 'is-invalid' : '' }}" name="units_id" id="units_id" required>
                    @foreach($units as $id => $entry)
                        <option value="{{ $id }}" {{ (old('units_id') ? old('units_id') : $user->units->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('units'))
                    <div class="invalid-feedback">
                        {{ $errors->first('units') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.units_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="browse_file">{{ trans('cruds.user.fields.browse_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('browse_file') ? 'is-invalid' : '' }}" id="browse_file-dropzone">
                </div>
                @if($errors->has('browse_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('browse_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.browse_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_date">{{ trans('cruds.user.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $user->start_date) }}">
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.user.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $user->end_date) }}">
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.tenancy_status') }}</label>
                <select class="form-control {{ $errors->has('tenancy_status') ? 'is-invalid' : '' }}" name="tenancy_status" id="tenancy_status">
                    <option value disabled {{ old('tenancy_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\User::TENANCY_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tenancy_status', $user->tenancy_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tenancy_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tenancy_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.tenancy_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="team_id">{{ trans('cruds.user.fields.team') }}</label>
                <select class="form-control select2 {{ $errors->has('team') ? 'is-invalid' : '' }}" name="team_id" id="team_id">
                    @foreach($teams as $id => $entry)
                        <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $user->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('team'))
                    <div class="invalid-feedback">
                        {{ $errors->first('team') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.team_helper') }}</span>
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
    url: '{{ route('admin.users.storeMedia') }}',
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
@if(isset($user) && $user->photo)
      var file = {!! json_encode($user->photo) !!}
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
<script>
    var uploadedBrowseFileMap = {}
Dropzone.options.browseFileDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 10000, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10000
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="browse_file[]" value="' + response.name + '">')
      uploadedBrowseFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedBrowseFileMap[file.name]
      }
      $('form').find('input[name="browse_file[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($user) && $user->browse_file)
          var files =
            {!! json_encode($user->browse_file) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="browse_file[]" value="' + file.file_name + '">')
            }
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