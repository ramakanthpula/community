@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.unit.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.units.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.unit.fields.id') }}
                        </th>
                        <td>
                            {{ $unit->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unit.fields.block_name') }}
                        </th>
                        <td>
                            {{ $unit->block_name->block_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unit.fields.floor_name') }}
                        </th>
                        <td>
                            {{ $unit->floor_name->floor_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unit.fields.no_of_units') }}
                        </th>
                        <td>
                            {{ $unit->no_of_units }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unit.fields.unit_names') }}
                        </th>
                        <td>
                            {{ $unit->unit_names }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unit.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Unit::STATUS_SELECT[$unit->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.units.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection