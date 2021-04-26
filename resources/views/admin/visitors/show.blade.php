@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.visitor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.visitors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.id') }}
                        </th>
                        <td>
                            {{ $visitor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.check_in_type') }}
                        </th>
                        <td>
                            {{ App\Models\Visitor::CHECK_IN_TYPE_RADIO[$visitor->check_in_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.name') }}
                        </th>
                        <td>
                            {{ $visitor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Visitor::GENDER_SELECT[$visitor->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.address') }}
                        </th>
                        <td>
                            {{ $visitor->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.company') }}
                        </th>
                        <td>
                            {{ $visitor->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.unit_no') }}
                        </th>
                        <td>
                            {{ $visitor->unit_no->unitnames ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.photo') }}
                        </th>
                        <td>
                            {{ $visitor->photo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.in_time') }}
                        </th>
                        <td>
                            {{ $visitor->in_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.out_time') }}
                        </th>
                        <td>
                            {{ $visitor->out_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.whom_to_meet') }}
                        </th>
                        <td>
                            {{ $visitor->whom_to_meet }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visitor.fields.purpose_of_visit') }}
                        </th>
                        <td>
                            {{ $visitor->purpose_of_visit }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.visitors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection