@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.expectedVisit.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.expected-visits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.id') }}
                        </th>
                        <td>
                            {{ $expectedVisit->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.visit_type') }}
                        </th>
                        <td>
                            {{ App\Models\ExpectedVisit::VISIT_TYPE_RADIO[$expectedVisit->visit_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.unit_no') }}
                        </th>
                        <td>
                            {{ $expectedVisit->unit_no->unitnames ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.name') }}
                        </th>
                        <td>
                            {{ $expectedVisit->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.no_of_persons') }}
                        </th>
                        <td>
                            {{ $expectedVisit->no_of_persons }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\ExpectedVisit::GENDER_SELECT[$expectedVisit->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.address') }}
                        </th>
                        <td>
                            {{ $expectedVisit->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.check_in_type') }}
                        </th>
                        <td>
                            {{ App\Models\ExpectedVisit::CHECK_IN_TYPE_RADIO[$expectedVisit->check_in_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.visiting_type') }}
                        </th>
                        <td>
                            {{ App\Models\ExpectedVisit::VISITING_TYPE_RADIO[$expectedVisit->visiting_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.check_in_by') }}
                        </th>
                        <td>
                            {{ App\Models\ExpectedVisit::CHECK_IN_BY_RADIO[$expectedVisit->check_in_by] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.vehicle_type') }}
                        </th>
                        <td>
                            {{ App\Models\ExpectedVisit::VEHICLE_TYPE_RADIO[$expectedVisit->vehicle_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.expected_in_date') }}
                        </th>
                        <td>
                            {{ $expectedVisit->expected_in_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.expected_in_time') }}
                        </th>
                        <td>
                            {{ $expectedVisit->expected_in_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expectedVisit.fields.purpose') }}
                        </th>
                        <td>
                            @foreach($expectedVisit->purposes as $key => $purpose)
                                <span class="label label-info">{{ $purpose->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.expected-visits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection