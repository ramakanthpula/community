@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.floor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.floors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.floor.fields.id') }}
                        </th>
                        <td>
                            {{ $floor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.floor.fields.floor_name') }}
                        </th>
                        <td>
                            {{ $floor->floor_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.floor.fields.block_name') }}
                        </th>
                        <td>
                            {{ $floor->block_name->block_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.floor.fields.no_of_units') }}
                        </th>
                        <td>
                            {{ $floor->no_of_units }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.floors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection