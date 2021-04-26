@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.assignWorkman.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assign-workmen.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assignWorkman.fields.id') }}
                        </th>
                        <td>
                            {{ $assignWorkman->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignWorkman.fields.unit_assignment') }}
                        </th>
                        <td>
                            {{ App\Models\AssignWorkman::UNIT_ASSIGNMENT_RADIO[$assignWorkman->unit_assignment] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignWorkman.fields.working_area') }}
                        </th>
                        <td>
                            {{ $assignWorkman->working_area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignWorkman.fields.weekly_off') }}
                        </th>
                        <td>
                            {{ App\Models\AssignWorkman::WEEKLY_OFF_RADIO[$assignWorkman->weekly_off] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignWorkman.fields.contract_effective_date') }}
                        </th>
                        <td>
                            {{ $assignWorkman->contract_effective_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignWorkman.fields.from_date') }}
                        </th>
                        <td>
                            {{ $assignWorkman->from_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignWorkman.fields.to_date') }}
                        </th>
                        <td>
                            {{ $assignWorkman->to_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignWorkman.fields.gate_pass_status') }}
                        </th>
                        <td>
                            {{ App\Models\AssignWorkman::GATE_PASS_STATUS_SELECT[$assignWorkman->gate_pass_status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assign-workmen.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection