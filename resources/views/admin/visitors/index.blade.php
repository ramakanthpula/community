@extends('layouts.admin')
@section('content')
@can('visitor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.visitors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.visitor.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.visitor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Visitor">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.check_in_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.company') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.unit_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.in_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.out_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.whom_to_meet') }}
                        </th>
                        <th>
                            {{ trans('cruds.visitor.fields.purpose_of_visit') }}
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
                                @foreach(App\Models\Visitor::CHECK_IN_TYPE_RADIO as $key => $item)
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
                                @foreach(App\Models\Visitor::GENDER_SELECT as $key => $item)
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
                        </td>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($visitors as $key => $visitor)
                        <tr data-entry-id="{{ $visitor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $visitor->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Visitor::CHECK_IN_TYPE_RADIO[$visitor->check_in_type] ?? '' }}
                            </td>
                            <td>
                                {{ $visitor->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Visitor::GENDER_SELECT[$visitor->gender] ?? '' }}
                            </td>
                            <td>
                                {{ $visitor->address ?? '' }}
                            </td>
                            <td>
                                {{ $visitor->company ?? '' }}
                            </td>
                            <td>
                                {{ $visitor->unit_no->unitnames ?? '' }}
                            </td>
                            <td>
                                {{ $visitor->photo ?? '' }}
                            </td>
                            <td>
                                {{ $visitor->in_time ?? '' }}
                            </td>
                            <td>
                                {{ $visitor->out_time ?? '' }}
                            </td>
                            <td>
                                {{ $visitor->whom_to_meet ?? '' }}
                            </td>
                            <td>
                                {{ $visitor->purpose_of_visit ?? '' }}
                            </td>
                            <td>
                                @can('visitor_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.visitors.show', $visitor->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('visitor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.visitors.edit', $visitor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('visitor_delete')
                                    <form action="{{ route('admin.visitors.destroy', $visitor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('visitor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.visitors.massDestroy') }}",
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
  let table = $('.datatable-Visitor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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