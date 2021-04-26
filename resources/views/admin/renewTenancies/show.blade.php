@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.renewTenancy.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.renew-tenancies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.id') }}
                        </th>
                        <td>
                            {{ $renewTenancy->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.block_name') }}
                        </th>
                        <td>
                            {{ $renewTenancy->block_name->block_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.floor_name') }}
                        </th>
                        <td>
                            {{ $renewTenancy->floor_name->floor_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.owner_unit') }}
                        </th>
                        <td>
                            {{ $renewTenancy->owner_unit->unitnames ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.indemnity_document') }}
                        </th>
                        <td>
                            @if($renewTenancy->indemnity_document)
                                <a href="{{ $renewTenancy->indemnity_document->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.start_date') }}
                        </th>
                        <td>
                            {{ $renewTenancy->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.end_date') }}
                        </th>
                        <td>
                            {{ $renewTenancy->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.renewTenancy.fields.tenancy_status') }}
                        </th>
                        <td>
                            {{ App\Models\RenewTenancy::TENANCY_STATUS_SELECT[$renewTenancy->tenancy_status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.renew-tenancies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection