@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.noticeBoard.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.notice-boards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.noticeBoard.fields.id') }}
                        </th>
                        <td>
                            {{ $noticeBoard->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticeBoard.fields.title') }}
                        </th>
                        <td>
                            {{ $noticeBoard->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticeBoard.fields.description') }}
                        </th>
                        <td>
                            {!! $noticeBoard->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticeBoard.fields.recipients') }}
                        </th>
                        <td>
                            {{ $noticeBoard->recipients->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticeBoard.fields.publish') }}
                        </th>
                        <td>
                            {{ App\Models\NoticeBoard::PUBLISH_RADIO[$noticeBoard->publish] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.notice-boards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection