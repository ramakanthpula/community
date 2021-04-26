@extends('layouts.admin')
@section('content')
@can('help_desk_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.help-desks.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.helpDesk.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.helpDesk.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-HelpDesk">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.helpDesk.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.helpDesk.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.helpDesk.fields.mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.helpDesk.fields.flat_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.helpDesk.fields.timestamp') }}
                        </th>
                        <th>
                            {{ trans('cruds.helpDesk.fields.enquiry_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.helpDesk.fields.details') }}
                        </th>
                        <th>
                            {{ trans('cruds.helpDesk.fields.description') }}
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
                                @foreach($enquiry_categories as $key => $item)
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
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($helpDesks as $key => $helpDesk)
                        <tr data-entry-id="{{ $helpDesk->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $helpDesk->id ?? '' }}
                            </td>
                            <td>
                                {{ $helpDesk->name ?? '' }}
                            </td>
                            <td>
                                {{ $helpDesk->mobile ?? '' }}
                            </td>
                            <td>
                                {{ $helpDesk->flat_no ?? '' }}
                            </td>
                            <td>
                                {{ $helpDesk->timestamp ?? '' }}
                            </td>
                            <td>
                                @foreach($helpDesk->enquiry_types as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $helpDesk->details ?? '' }}
                            </td>
                            <td>
                                {{ $helpDesk->description ?? '' }}
                            </td>
                            <td>
                                @can('help_desk_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.help-desks.show', $helpDesk->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('help_desk_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.help-desks.edit', $helpDesk->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('help_desk_delete')
                                    <form action="{{ route('admin.help-desks.destroy', $helpDesk->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('help_desk_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.help-desks.massDestroy') }}",
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
  let table = $('.datatable-HelpDesk:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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