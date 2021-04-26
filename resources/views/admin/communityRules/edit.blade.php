@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.communityRule.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.community-rules.update", [$communityRule->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="apartment_policies">{{ trans('cruds.communityRule.fields.apartment_policies') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('apartment_policies') ? 'is-invalid' : '' }}" name="apartment_policies" id="apartment_policies">{!! old('apartment_policies', $communityRule->apartment_policies) !!}</textarea>
                @if($errors->has('apartment_policies'))
                    <div class="invalid-feedback">
                        {{ $errors->first('apartment_policies') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.communityRule.fields.apartment_policies_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="code_of_conduct">{{ trans('cruds.communityRule.fields.code_of_conduct') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('code_of_conduct') ? 'is-invalid' : '' }}" name="code_of_conduct" id="code_of_conduct">{!! old('code_of_conduct', $communityRule->code_of_conduct) !!}</textarea>
                @if($errors->has('code_of_conduct'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code_of_conduct') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.communityRule.fields.code_of_conduct_helper') }}</span>
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
                xhr.open('POST', '/admin/community-rules/ckmedia', true);
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
                data.append('crud_id', '{{ $communityRule->id ?? 0 }}');
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