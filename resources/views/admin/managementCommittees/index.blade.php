@extends('layouts.admin')
@section('content')
@can('management_committee_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.management-committees.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.managementCommittee.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.managementCommittee.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ManagementCommittee">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.member_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.present_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.permanent_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.aadhaar') }}
                        </th>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.designation') }}
                        </th>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.member_status') }}
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
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\ManagementCommittee::MEMBER_STATUS_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($managementCommittees as $key => $managementCommittee)
                        <tr data-entry-id="{{ $managementCommittee->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $managementCommittee->id ?? '' }}
                            </td>
                            <td>
                                {{ $managementCommittee->member_name ?? '' }}
                            </td>
                            <td>
                                {{ $managementCommittee->email ?? '' }}
                            </td>
                            <td>
                                {{ $managementCommittee->phone ?? '' }}
                            </td>
                            <td>
                                {{ $managementCommittee->present_address ?? '' }}
                            </td>
                            <td>
                                {{ $managementCommittee->permanent_address ?? '' }}
                            </td>
                            <td>
                                {{ $managementCommittee->aadhaar ?? '' }}
                            </td>
                            <td>
                                {{ $managementCommittee->designation->name ?? '' }}
                            </td>
                            <td>
                                {{ $managementCommittee->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $managementCommittee->end_date ?? '' }}
                            </td>
                            <td>
                                @if($managementCommittee->photo)
                                    <a href="{{ $managementCommittee->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $managementCommittee->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ App\Models\ManagementCommittee::MEMBER_STATUS_SELECT[$managementCommittee->member_status] ?? '' }}
                            </td>
                            <td>
                                @can('management_committee_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.management-committees.show', $managementCommittee->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('management_committee_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.management-committees.edit', $managementCommittee->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('management_committee_delete')
                                    <form action="{{ route('admin.management-committees.destroy', $managementCommittee->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('management_committee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.management-committees.massDestroy') }}",
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
  let table = $('.datatable-ManagementCommittee:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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