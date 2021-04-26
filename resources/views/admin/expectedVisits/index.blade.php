@extends('layouts.admin')
@section('content')
@can('expected_visit_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.expected-visits.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.expectedVisit.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.expectedVisit.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ExpectedVisit">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.visit_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.unit_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.no_of_persons') }}
                        </th>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.check_in_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.visiting_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.check_in_by') }}
                        </th>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.vehicle_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.expected_in_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.expected_in_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.purpose') }}
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
                                @foreach(App\Models\ExpectedVisit::VISIT_TYPE_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($allot_units as $key => $item)
                                    <option value="{{ $item->unitnames }}">{{ $item->unitnames }}</option>
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\ExpectedVisit::GENDER_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\ExpectedVisit::CHECK_IN_TYPE_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\ExpectedVisit::VISITING_TYPE_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\ExpectedVisit::CHECK_IN_BY_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\ExpectedVisit::VEHICLE_TYPE_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($purpose_of_visits as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expectedVisits as $key => $expectedVisit)
                        <tr data-entry-id="{{ $expectedVisit->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $expectedVisit->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ExpectedVisit::VISIT_TYPE_RADIO[$expectedVisit->visit_type] ?? '' }}
                            </td>
                            <td>
                                {{ $expectedVisit->unit_no->unitnames ?? '' }}
                            </td>
                            <td>
                                {{ $expectedVisit->name ?? '' }}
                            </td>
                            <td>
                                {{ $expectedVisit->no_of_persons ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ExpectedVisit::GENDER_SELECT[$expectedVisit->gender] ?? '' }}
                            </td>
                            <td>
                                {{ $expectedVisit->address ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ExpectedVisit::CHECK_IN_TYPE_RADIO[$expectedVisit->check_in_type] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ExpectedVisit::VISITING_TYPE_RADIO[$expectedVisit->visiting_type] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ExpectedVisit::CHECK_IN_BY_RADIO[$expectedVisit->check_in_by] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ExpectedVisit::VEHICLE_TYPE_RADIO[$expectedVisit->vehicle_type] ?? '' }}
                            </td>
                            <td>
                                {{ $expectedVisit->expected_in_date ?? '' }}
                            </td>
                            <td>
                                {{ $expectedVisit->expected_in_time ?? '' }}
                            </td>
                            <td>
                                @foreach($expectedVisit->purposes as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('expected_visit_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.expected-visits.show', $expectedVisit->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('expected_visit_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.expected-visits.edit', $expectedVisit->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('expected_visit_delete')
                                    <form action="{{ route('admin.expected-visits.destroy', $expectedVisit->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('expected_visit_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.expected-visits.massDestroy') }}",
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
  let table = $('.datatable-ExpectedVisit:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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