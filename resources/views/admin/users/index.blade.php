@extends('layouts.admin')
@section('content')
@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.users.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.two_factor') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.approved') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.verified') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.contact') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.alternate_contact') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.age') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.profession') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.present_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.permanent_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.nid') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.block_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.floor_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.units') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.browse_file') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.tenancy_status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\User::TYPE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($roles as $key => $item)
                                    <option value="{{ $item->title }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($blocks as $key => $item)
                                    <option value="{{ $item->block_name }}">{{ $item->block_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($floors as $key => $item)
                                    <option value="{{ $item->floor_name }}">{{ $item->floor_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($units as $key => $item)
                                    <option value="{{ $item->unit_names }}">{{ $item->unit_names }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\User::TENANCY_STATUS_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $user->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\User::TYPE_SELECT[$user->type] ?? '' }}
                            </td>
                            <td>
                                {{ $user->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            <td>
                                {{ $user->email_verified_at ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $user->two_factor ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $user->two_factor ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $user->approved ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $user->approved ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $user->verified ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $user->verified ? 'checked' : '' }}>
                            </td>
                            <td>
                                @foreach($user->roles as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $user->contact ?? '' }}
                            </td>
                            <td>
                                {{ $user->alternate_contact ?? '' }}
                            </td>
                            <td>
                                {{ $user->age ?? '' }}
                            </td>
                            <td>
                                {{ $user->profession ?? '' }}
                            </td>
                            <td>
                                {{ $user->present_address ?? '' }}
                            </td>
                            <td>
                                {{ $user->permanent_address ?? '' }}
                            </td>
                            <td>
                                {{ $user->nid ?? '' }}
                            </td>
                            <td>
                                @if($user->photo)
                                    <a href="{{ $user->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $user->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $user->block_name->block_name ?? '' }}
                            </td>
                            <td>
                                {{ $user->floor_name->floor_name ?? '' }}
                            </td>
                            <td>
                                {{ $user->units->unit_names ?? '' }}
                            </td>
                            <td>
                                @foreach($user->browse_file as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $user->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $user->end_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\User::TENANCY_STATUS_SELECT[$user->tenancy_status] ?? '' }}
                            </td>
                            <td>
                                @can('user_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('user_delete')
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection