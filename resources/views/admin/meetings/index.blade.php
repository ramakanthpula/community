@extends('layouts.admin')
@section('content')
@can('meeting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.meetings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.meeting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.meeting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Meeting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.meeting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.meeting.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.meeting.fields.from') }}
                        </th>
                        <th>
                            {{ trans('cruds.meeting.fields.to') }}
                        </th>
                        <th>
                            {{ trans('cruds.meeting.fields.venue') }}
                        </th>
                        <th>
                            {{ trans('cruds.meeting.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.meeting.fields.attendees') }}
                        </th>
                        <th>
                            {{ trans('cruds.meeting.fields.select_user_group') }}
                        </th>
                        <th>
                            {{ trans('cruds.meeting.fields.specific_users') }}
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Meeting::ATTENDEES_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($teams as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
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
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($meetings as $key => $meeting)
                        <tr data-entry-id="{{ $meeting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $meeting->id ?? '' }}
                            </td>
                            <td>
                                {{ $meeting->date ?? '' }}
                            </td>
                            <td>
                                {{ $meeting->from ?? '' }}
                            </td>
                            <td>
                                {{ $meeting->to ?? '' }}
                            </td>
                            <td>
                                {{ $meeting->venue ?? '' }}
                            </td>
                            <td>
                                {{ $meeting->title ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Meeting::ATTENDEES_RADIO[$meeting->attendees] ?? '' }}
                            </td>
                            <td>
                                {{ $meeting->select_user_group->name ?? '' }}
                            </td>
                            <td>
                                {{ $meeting->specific_users->name ?? '' }}
                            </td>
                            <td>
                                @can('meeting_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.meetings.show', $meeting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('meeting_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.meetings.edit', $meeting->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('meeting_delete')
                                    <form action="{{ route('admin.meetings.destroy', $meeting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('meeting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.meetings.massDestroy') }}",
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
  let table = $('.datatable-Meeting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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