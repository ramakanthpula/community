@extends('layouts.admin')
@section('content')
@can('add_workman_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.add-workmen.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.addWorkman.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.addWorkman.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AddWorkman">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.addWorkman.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.addWorkman.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.addWorkman.fields.date_of_birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.addWorkman.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.addWorkman.fields.skilled') }}
                        </th>
                        <th>
                            {{ trans('cruds.addWorkman.fields.address_line_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.addWorkman.fields.address_line_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.addWorkman.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.addWorkman.fields.father_husband') }}
                        </th>
                        <th>
                            {{ trans('cruds.addWorkman.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.addWorkman.fields.pin_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.addWorkman.fields.date_of_joining') }}
                        </th>
                        <th>
                            {{ trans('cruds.addWorkman.fields.aadhaar_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.addWorkman.fields.blood_group') }}
                        </th>
                        <th>
                            {{ trans('cruds.addWorkman.fields.photo') }}
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\AddWorkman::CATEGORY_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($skilled_workers as $key => $item)
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\AddWorkman::GENDER_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\AddWorkman::BLOOD_GROUP_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addWorkmen as $key => $addWorkman)
                        <tr data-entry-id="{{ $addWorkman->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $addWorkman->id ?? '' }}
                            </td>
                            <td>
                                {{ $addWorkman->name ?? '' }}
                            </td>
                            <td>
                                {{ $addWorkman->date_of_birth ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\AddWorkman::CATEGORY_RADIO[$addWorkman->category] ?? '' }}
                            </td>
                            <td>
                                {{ $addWorkman->skilled->name ?? '' }}
                            </td>
                            <td>
                                {{ $addWorkman->address_line_1 ?? '' }}
                            </td>
                            <td>
                                {{ $addWorkman->address_line_2 ?? '' }}
                            </td>
                            <td>
                                {{ $addWorkman->city ?? '' }}
                            </td>
                            <td>
                                {{ $addWorkman->father_husband ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\AddWorkman::GENDER_SELECT[$addWorkman->gender] ?? '' }}
                            </td>
                            <td>
                                {{ $addWorkman->pin_code ?? '' }}
                            </td>
                            <td>
                                {{ $addWorkman->date_of_joining ?? '' }}
                            </td>
                            <td>
                                {{ $addWorkman->aadhaar_number ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\AddWorkman::BLOOD_GROUP_SELECT[$addWorkman->blood_group] ?? '' }}
                            </td>
                            <td>
                                {{ $addWorkman->photo ?? '' }}
                            </td>
                            <td>
                                @can('add_workman_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.add-workmen.show', $addWorkman->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('add_workman_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.add-workmen.edit', $addWorkman->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('add_workman_delete')
                                    <form action="{{ route('admin.add-workmen.destroy', $addWorkman->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('add_workman_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.add-workmen.massDestroy') }}",
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
  let table = $('.datatable-AddWorkman:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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