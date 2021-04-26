@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.meeting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.meetings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.id') }}
                        </th>
                        <td>
                            {{ $meeting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.date') }}
                        </th>
                        <td>
                            {{ $meeting->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.from') }}
                        </th>
                        <td>
                            {{ $meeting->from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.to') }}
                        </th>
                        <td>
                            {{ $meeting->to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.venue') }}
                        </th>
                        <td>
                            {{ $meeting->venue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.title') }}
                        </th>
                        <td>
                            {{ $meeting->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.description') }}
                        </th>
                        <td>
                            {!! $meeting->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.attendees') }}
                        </th>
                        <td>
                            {{ App\Models\Meeting::ATTENDEES_RADIO[$meeting->attendees] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.select_user_group') }}
                        </th>
                        <td>
                            {{ $meeting->select_user_group->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.specific_users') }}
                        </th>
                        <td>
                            {{ $meeting->specific_users->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.meetings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection