@extends('layouts.admin')
@section('content')
@can('defect_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.defects.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.defect.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.defect.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Defect">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.defect.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.defect.fields.users') }}
                        </th>
                        <th>
                            {{ trans('cruds.defect.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.defect.fields.mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.defect.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.defect.fields.flat_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.defect.fields.incident_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.defect.fields.defect_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.defect.fields.defect_sub_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.defect.fields.incident_location') }}
                        </th>
                        <th>
                            {{ trans('cruds.defect.fields.defect_details') }}
                        </th>
                        <th>
                            {{ trans('cruds.defect.fields.problem_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.defect.fields.convenient_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.defect.fields.desired_outcome') }}
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
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($users as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
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
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($defect_categories as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($defect_sub_categories as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($defects as $key => $defect)
                        <tr data-entry-id="{{ $defect->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $defect->id ?? '' }}
                            </td>
                            <td>
                                {{ $defect->users->name ?? '' }}
                            </td>
                            <td>
                                {{ $defect->name ?? '' }}
                            </td>
                            <td>
                                {{ $defect->mobile ?? '' }}
                            </td>
                            <td>
                                {{ $defect->email ?? '' }}
                            </td>
                            <td>
                                {{ $defect->flat_no ?? '' }}
                            </td>
                            <td>
                                {{ $defect->incident_date ?? '' }}
                            </td>
                            <td>
                                {{ $defect->defect_type->name ?? '' }}
                            </td>
                            <td>
                                {{ $defect->defect_sub_type->name ?? '' }}
                            </td>
                            <td>
                                {{ $defect->incident_location ?? '' }}
                            </td>
                            <td>
                                {{ $defect->defect_details ?? '' }}
                            </td>
                            <td>
                                {{ $defect->problem_description ?? '' }}
                            </td>
                            <td>
                                {{ $defect->convenient_time ?? '' }}
                            </td>
                            <td>
                                {{ $defect->desired_outcome ?? '' }}
                            </td>
                            <td>
                                @can('defect_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.defects.show', $defect->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('defect_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.defects.edit', $defect->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('defect_delete')
                                    <form action="{{ route('admin.defects.destroy', $defect->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('defect_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.defects.massDestroy') }}",
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
  let table = $('.datatable-Defect:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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