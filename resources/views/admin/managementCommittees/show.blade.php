@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.managementCommittee.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.management-committees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.id') }}
                        </th>
                        <td>
                            {{ $managementCommittee->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.member_name') }}
                        </th>
                        <td>
                            {{ $managementCommittee->member_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.email') }}
                        </th>
                        <td>
                            {{ $managementCommittee->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.password') }}
                        </th>
                        <td>
                            ********
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.phone') }}
                        </th>
                        <td>
                            {{ $managementCommittee->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.present_address') }}
                        </th>
                        <td>
                            {{ $managementCommittee->present_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.permanent_address') }}
                        </th>
                        <td>
                            {{ $managementCommittee->permanent_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.aadhaar') }}
                        </th>
                        <td>
                            {{ $managementCommittee->aadhaar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.designation') }}
                        </th>
                        <td>
                            {{ $managementCommittee->designation->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.start_date') }}
                        </th>
                        <td>
                            {{ $managementCommittee->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.end_date') }}
                        </th>
                        <td>
                            {{ $managementCommittee->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.photo') }}
                        </th>
                        <td>
                            @if($managementCommittee->photo)
                                <a href="{{ $managementCommittee->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $managementCommittee->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managementCommittee.fields.member_status') }}
                        </th>
                        <td>
                            {{ App\Models\ManagementCommittee::MEMBER_STATUS_SELECT[$managementCommittee->member_status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.management-committees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection