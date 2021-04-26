@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.noticeBoard.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.notice-boards.update", [$noticeBoard->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.noticeBoard.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $noticeBoard->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.noticeBoard.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.noticeBoard.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $noticeBoard->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.noticeBoard.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="recipients_id">{{ trans('cruds.noticeBoard.fields.recipients') }}</label>
                <select class="form-control select2 {{ $errors->has('recipients') ? 'is-invalid' : '' }}" name="recipients_id" id="recipients_id">
                    @foreach($recipients as $id => $recipients)
                        <option value="{{ $id }}" {{ (old('recipients_id') ? old('recipients_id') : $noticeBoard->recipients->id ?? '') == $id ? 'selected' : '' }}>{{ $recipients }}</option>
                    @endforeach
                </select>
                @if($errors->has('recipients'))
                    <div class="invalid-feedback">
                        {{ $errors->first('recipients') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.noticeBoard.fields.recipients_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.noticeBoard.fields.publish') }}</label>
                @foreach(App\Models\NoticeBoard::PUBLISH_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('publish') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="publish_{{ $key }}" name="publish" value="{{ $key }}" {{ old('publish', $noticeBoard->publish) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="publish_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('publish'))
                    <div class="invalid-feedback">
                        {{ $errors->first('publish') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.noticeBoard.fields.publish_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.notice-boards.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $noticeBoard->id ?? 0 }}');
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