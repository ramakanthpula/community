@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.renewTenancy.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.renew-tenancies.update", [$renewTenancy->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="block_name_id">{{ trans('cruds.renewTenancy.fields.block_name') }}</label>
                <select class="form-control select2 {{ $errors->has('block_name') ? 'is-invalid' : '' }}" name="block_name_id" id="block_name_id" required>
                    @foreach($block_names as $id => $block_name)
                        <option value="{{ $id }}" {{ (old('block_name_id') ? old('block_name_id') : $renewTenancy->block_name->id ?? '') == $id ? 'selected' : '' }}>{{ $block_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('block_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('block_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.renewTenancy.fields.block_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="floor_name_id">{{ trans('cruds.renewTenancy.fields.floor_name') }}</label>
                <select class="form-control select2 {{ $errors->has('floor_name') ? 'is-invalid' : '' }}" name="floor_name_id" id="floor_name_id" required>
                    @foreach($floor_names as $id => $floor_name)
                        <option value="{{ $id }}" {{ (old('floor_name_id') ? old('floor_name_id') : $renewTenancy->floor_name->id ?? '') == $id ? 'selected' : '' }}>{{ $floor_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('floor_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('floor_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.renewTenancy.fields.floor_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="owner_unit_id">{{ trans('cruds.renewTenancy.fields.owner_unit') }}</label>
                <select class="form-control select2 {{ $errors->has('owner_unit') ? 'is-invalid' : '' }}" name="owner_unit_id" id="owner_unit_id" required>
                    @foreach($owner_units as $id => $owner_unit)
                        <option value="{{ $id }}" {{ (old('owner_unit_id') ? old('owner_unit_id') : $renewTenancy->owner_unit->id ?? '') == $id ? 'selected' : '' }}>{{ $owner_unit }}</option>
                    @endforeach
                </select>
                @if($errors->has('owner_unit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('owner_unit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.renewTenancy.fields.owner_unit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="indemnity_document">{{ trans('cruds.renewTenancy.fields.indemnity_document') }}</label>
                <div class="needsclick dropzone {{ $errors->has('indemnity_document') ? 'is-invalid' : '' }}" id="indemnity_document-dropzone">
                </div>
                @if($errors->has('indemnity_document'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indemnity_document') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.renewTenancy.fields.indemnity_document_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.renewTenancy.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $renewTenancy->start_date) }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.renewTenancy.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.renewTenancy.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $renewTenancy->end_date) }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.renewTenancy.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.renewTenancy.fields.tenancy_status') }}</label>
                <select class="form-control {{ $errors->has('tenancy_status') ? 'is-invalid' : '' }}" name="tenancy_status" id="tenancy_status">
                    <option value disabled {{ old('tenancy_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\RenewTenancy::TENANCY_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tenancy_status', $renewTenancy->tenancy_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tenancy_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tenancy_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.renewTenancy.fields.tenancy_status_helper') }}</span>
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
    Dropzone.options.indemnityDocumentDropzone = {
    url: '{{ route('admin.renew-tenancies.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="indemnity_document"]').remove()
      $('form').append('<input type="hidden" name="indemnity_document" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="indemnity_document"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($renewTenancy) && $renewTenancy->indemnity_document)
      var file = {!! json_encode($renewTenancy->indemnity_document) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="indemnity_document" value="' + file.file_name + '">')
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