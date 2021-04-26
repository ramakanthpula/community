@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.communityInformation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.community-informations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.communityInformation.fields.id') }}
                        </th>
                        <td>
                            {{ $communityInformation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityInformation.fields.name') }}
                        </th>
                        <td>
                            {{ $communityInformation->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityInformation.fields.email') }}
                        </th>
                        <td>
                            {{ $communityInformation->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityInformation.fields.security_office_mobile_no') }}
                        </th>
                        <td>
                            {{ $communityInformation->security_office_mobile_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityInformation.fields.secretary_mobile_no') }}
                        </th>
                        <td>
                            {{ $communityInformation->secretary_mobile_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityInformation.fields.moderator_mobile_no') }}
                        </th>
                        <td>
                            {{ $communityInformation->moderator_mobile_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityInformation.fields.construction_year') }}
                        </th>
                        <td>
                            {{ $communityInformation->construction_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityInformation.fields.address') }}
                        </th>
                        <td>
                            {{ $communityInformation->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityInformation.fields.browse_file') }}
                        </th>
                        <td>
                            @if($communityInformation->browse_file)
                                <a href="{{ $communityInformation->browse_file->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $communityInformation->browse_file->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.communityInformation.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\CommunityInformation::STATUS_SELECT[$communityInformation->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.community-informations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection