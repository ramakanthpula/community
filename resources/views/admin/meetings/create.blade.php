@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.meeting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.meetings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.meeting.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="from">{{ trans('cruds.meeting.fields.from') }}</label>
                <input class="form-control timepicker {{ $errors->has('from') ? 'is-invalid' : '' }}" type="text" name="from" id="from" value="{{ old('from') }}" required>
                @if($errors->has('from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.from_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="to">{{ trans('cruds.meeting.fields.to') }}</label>
                <input class="form-control timepicker {{ $errors->has('to') ? 'is-invalid' : '' }}" type="text" name="to" id="to" value="{{ old('to') }}" required>
                @if($errors->has('to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('to') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.to_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="venue">{{ trans('cruds.meeting.fields.venue') }}</label>
                <input class="form-control {{ $errors->has('venue') ? 'is-invalid' : '' }}" type="text" name="venue" id="venue" value="{{ old('venue', '') }}" required>
                @if($errors->has('venue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('venue') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.venue_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.meeting.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.meeting.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.meeting.fields.attendees') }}</label>
                @foreach(App\Models\Meeting::ATTENDEES_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('attendees') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="attendees_{{ $key }}" name="attendees" value="{{ $key }}" {{ old('attendees', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="attendees_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('attendees'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attendees') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.attendees_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="select_user_group_id">{{ trans('cruds.meeting.fields.select_user_group') }}</label>
                <select class="form-control select2 {{ $errors->has('select_user_group') ? 'is-invalid' : '' }}" name="select_user_group_id" id="select_user_group_id">
                    @foreach($select_user_groups as $id => $entry)
                        <option value="{{ $id }}" {{ old('select_user_group_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('select_user_group'))
                    <div class="invalid-feedback">
                        {{ $errors->first('select_user_group') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.select_user_group_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="specific_users_id">{{ trans('cruds.meeting.fields.specific_users') }}</label>
                <select class="form-control select2 {{ $errors->has('specific_users') ? 'is-invalid' : '' }}" name="specific_users_id" id="specific_users_id">
                    @foreach($specific_users as $id => $entry)
                        <option value="{{ $id }}" {{ old('specific_users_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('specific_users'))
                    <div class="invalid-feedback">
                        {{ $errors->first('specific_users') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.specific_users_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.meetings.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $meeting->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection