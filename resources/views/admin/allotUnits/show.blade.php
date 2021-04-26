@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.allotUnit.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.allot-units.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.allotUnit.fields.id') }}
                        </th>
                        <td>
                            {{ $allotUnit->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.allotUnit.fields.users') }}
                        </th>
                        <td>
                            {{ $allotUnit->users->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.allotUnit.fields.units') }}
                        </th>
                        <td>
                            {{ $allotUnit->units->no_of_units ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.allotUnit.fields.unitnames') }}
                        </th>
                        <td>
                            {{ $allotUnit->unitnames }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.allot-units.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection