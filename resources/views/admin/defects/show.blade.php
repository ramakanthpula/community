@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.defect.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.defects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.defect.fields.id') }}
                        </th>
                        <td>
                            {{ $defect->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.defect.fields.users') }}
                        </th>
                        <td>
                            {{ $defect->users->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.defect.fields.name') }}
                        </th>
                        <td>
                            {{ $defect->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.defect.fields.mobile') }}
                        </th>
                        <td>
                            {{ $defect->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.defect.fields.email') }}
                        </th>
                        <td>
                            {{ $defect->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.defect.fields.flat_no') }}
                        </th>
                        <td>
                            {{ $defect->flat_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.defect.fields.incident_date') }}
                        </th>
                        <td>
                            {{ $defect->incident_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.defect.fields.defect_type') }}
                        </th>
                        <td>
                            {{ $defect->defect_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.defect.fields.defect_sub_type') }}
                        </th>
                        <td>
                            {{ $defect->defect_sub_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.defect.fields.incident_location') }}
                        </th>
                        <td>
                            {{ $defect->incident_location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.defect.fields.defect_details') }}
                        </th>
                        <td>
                            {{ $defect->defect_details }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.defect.fields.problem_description') }}
                        </th>
                        <td>
                            {{ $defect->problem_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.defect.fields.convenient_time') }}
                        </th>
                        <td>
                            {{ $defect->convenient_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.defect.fields.desired_outcome') }}
                        </th>
                        <td>
                            {{ $defect->desired_outcome }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.defects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection