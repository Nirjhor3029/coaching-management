@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.studentBasicInfo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.student-basic-infos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.id') }}
                        </th>
                        <td>
                            {{ $studentBasicInfo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.roll') }}
                        </th>
                        <td>
                            {{ $studentBasicInfo->roll }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.id_no') }}
                        </th>
                        <td>
                            {{ $studentBasicInfo->id_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.first_name') }}
                        </th>
                        <td>
                            {{ $studentBasicInfo->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.last_name') }}
                        </th>
                        <td>
                            {{ $studentBasicInfo->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\StudentBasicInfo::GENDER_RADIO[$studentBasicInfo->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.contact_number') }}
                        </th>
                        <td>
                            {{ $studentBasicInfo->contact_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.email') }}
                        </th>
                        <td>
                            {{ $studentBasicInfo->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.dob') }}
                        </th>
                        <td>
                            {{ $studentBasicInfo->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\StudentBasicInfo::STATUS_SELECT[$studentBasicInfo->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.joining_date') }}
                        </th>
                        <td>
                            {{ $studentBasicInfo->joining_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.image') }}
                        </th>
                        <td>
                            @if($studentBasicInfo->image)
                                <a href="{{ $studentBasicInfo->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $studentBasicInfo->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.class') }}
                        </th>
                        <td>
                            {{ $studentBasicInfo->class->class_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.section') }}
                        </th>
                        <td>
                            {{ $studentBasicInfo->section->section_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.shift') }}
                        </th>
                        <td>
                            {{ $studentBasicInfo->shift->shift_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.user') }}
                        </th>
                        <td>
                            {{ $studentBasicInfo->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentBasicInfo.fields.subject') }}
                        </th>
                        <td>
                            @foreach($studentBasicInfo->subjects as $key => $subject)
                                <span class="label label-info">{{ $subject->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.student-basic-infos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#student_earnings" role="tab" data-toggle="tab">
                {{ trans('cruds.earning.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="student_earnings">
            @includeIf('admin.studentBasicInfos.relationships.studentEarnings', ['earnings' => $studentBasicInfo->studentEarnings])
        </div>
    </div>
</div>

@endsection