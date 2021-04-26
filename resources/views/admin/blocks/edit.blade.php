@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.block.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.blocks.update", [$block->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="block_name">{{ trans('cruds.block.fields.block_name') }}</label>
                <input class="form-control {{ $errors->has('block_name') ? 'is-invalid' : '' }}" type="text" name="block_name" id="block_name" value="{{ old('block_name', $block->block_name) }}" required>
                @if($errors->has('block_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('block_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.block.fields.block_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="block_admin_contact">{{ trans('cruds.block.fields.block_admin_contact') }}</label>
                <input class="form-control {{ $errors->has('block_admin_contact') ? 'is-invalid' : '' }}" type="text" name="block_admin_contact" id="block_admin_contact" value="{{ old('block_admin_contact', $block->block_admin_contact) }}" required>
                @if($errors->has('block_admin_contact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('block_admin_contact') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.block.fields.block_admin_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.block.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="text" name="password" id="password" value="{{ old('password', $block->password) }}" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.block.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="block_photo">{{ trans('cruds.block.fields.block_photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('block_photo') ? 'is-invalid' : '' }}" id="block_photo-dropzone">
                </div>
                @if($errors->has('block_photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('block_photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.block.fields.block_photo_helper') }}</span>
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
    var uploadedBlockPhotoMap = {}
Dropzone.options.blockPhotoDropzone = {
    url: '{{ route('admin.blocks.storeMedia') }}',
    maxFilesize: 200, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 200,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="block_photo[]" value="' + response.name + '">')
      uploadedBlockPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedBlockPhotoMap[file.name]
      }
      $('form').find('input[name="block_photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($block) && $block->block_photo)
      var files = {!! json_encode($block->block_photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="block_photo[]" value="' + file.file_name + '">')
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