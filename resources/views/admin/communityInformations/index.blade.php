@extends('layouts.admin')
@section('content')
@can('community_information_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.community-informations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.communityInformation.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.communityInformation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CommunityInformation">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.communityInformation.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.communityInformation.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.communityInformation.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.communityInformation.fields.security_office_mobile_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.communityInformation.fields.secretary_mobile_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.communityInformation.fields.moderator_mobile_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.communityInformation.fields.construction_year') }}
                        </th>
                        <th>
                            {{ trans('cruds.communityInformation.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.communityInformation.fields.browse_file') }}
                        </th>
                        <th>
                            {{ trans('cruds.communityInformation.fields.status') }}
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\CommunityInformation::STATUS_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($communityInformations as $key => $communityInformation)
                        <tr data-entry-id="{{ $communityInformation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $communityInformation->id ?? '' }}
                            </td>
                            <td>
                                {{ $communityInformation->name ?? '' }}
                            </td>
                            <td>
                                {{ $communityInformation->email ?? '' }}
                            </td>
                            <td>
                                {{ $communityInformation->security_office_mobile_no ?? '' }}
                            </td>
                            <td>
                                {{ $communityInformation->secretary_mobile_no ?? '' }}
                            </td>
                            <td>
                                {{ $communityInformation->moderator_mobile_no ?? '' }}
                            </td>
                            <td>
                                {{ $communityInformation->construction_year ?? '' }}
                            </td>
                            <td>
                                {{ $communityInformation->address ?? '' }}
                            </td>
                            <td>
                                @if($communityInformation->browse_file)
                                    <a href="{{ $communityInformation->browse_file->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $communityInformation->browse_file->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ App\Models\CommunityInformation::STATUS_SELECT[$communityInformation->status] ?? '' }}
                            </td>
                            <td>
                                @can('community_information_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.community-informations.show', $communityInformation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('community_information_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.community-informations.edit', $communityInformation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('community_information_delete')
                                    <form action="{{ route('admin.community-informations.destroy', $communityInformation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('community_information_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.community-informations.massDestroy') }}",
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
  let table = $('.datatable-CommunityInformation:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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