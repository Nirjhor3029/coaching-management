@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.subject.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subjects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.subject.fields.id') }}
                        </th>
                        <td>
                            {{ $subject->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subject.fields.name') }}
                        </th>
                        <td>
                            {{ $subject->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subject.fields.code') }}
                        </th>
                        <td>
                            {{ $subject->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subject.fields.monthly_fee') }}
                        </th>
                        <td>
                            {{ $subject->monthly_fee }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subjects.index') }}">
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
            <a class="nav-link" href="#subject_earnings" role="tab" data-toggle="tab">
                {{ trans('cruds.earning.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#subject_teachers" role="tab" data-toggle="tab">
                {{ trans('cruds.teacher.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#subject_student_basic_infos" role="tab" data-toggle="tab">
                {{ trans('cruds.studentBasicInfo.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="subject_earnings">
            @includeIf('admin.subjects.relationships.subjectEarnings', ['earnings' => $subject->subjectEarnings])
        </div>
        <div class="tab-pane" role="tabpanel" id="subject_teachers">
            @includeIf('admin.subjects.relationships.subjectTeachers', ['teachers' => $subject->subjectTeachers])
        </div>
        <div class="tab-pane" role="tabpanel" id="subject_student_basic_infos">
            @includeIf('admin.subjects.relationships.subjectStudentBasicInfos', ['studentBasicInfos' => $subject->subjectStudentBasicInfos])
        </div>
    </div>
</div>

@endsection