@extends('layouts.admin')
@section('content')
@can('renew_tenancy_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.renew-tenancies.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.renewTenancy.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.renewTenancy.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-RenewTenancy">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.block_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.floor_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.owner_unit') }}
                        </th>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.indemnity_document') }}
                        </th>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.tenancy_status') }}
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
                                @foreach($allot_units as $key => $item)
                                    <option value="{{ $item->unitnames }}">{{ $item->unitnames }}</option>
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
                                @foreach(App\Models\RenewTenancy::TENANCY_STATUS_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($renewTenancies as $key => $renewTenancy)
                        <tr data-entry-id="{{ $renewTenancy->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $renewTenancy->id ?? '' }}
                            </td>
                            <td>
                                {{ $renewTenancy->block_name->block_name ?? '' }}
                            </td>
                            <td>
                                {{ $renewTenancy->floor_name->floor_name ?? '' }}
                            </td>
                            <td>
                                {{ $renewTenancy->owner_unit->unitnames ?? '' }}
                            </td>
                            <td>
                                @if($renewTenancy->indemnity_document)
                                    <a href="{{ $renewTenancy->indemnity_document->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $renewTenancy->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $renewTenancy->end_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\RenewTenancy::TENANCY_STATUS_SELECT[$renewTenancy->tenancy_status] ?? '' }}
                            </td>
                            <td>
                                @can('renew_tenancy_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.renew-tenancies.show', $renewTenancy->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('renew_tenancy_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.renew-tenancies.edit', $renewTenancy->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('renew_tenancy_delete')
                                    <form action="{{ route('admin.renew-tenancies.destroy', $renewTenancy->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('renew_tenancy_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.renew-tenancies.massDestroy') }}",
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
  let table = $('.datatable-RenewTenancy:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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