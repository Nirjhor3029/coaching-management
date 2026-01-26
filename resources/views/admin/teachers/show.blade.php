@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.teacher.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.teachers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.teacher.fields.id') }}
                        </th>
                        <td>
                            {{ $teacher->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacher.fields.emloyee_code') }}
                        </th>
                        <td>
                            {{ $teacher->emloyee_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacher.fields.name') }}
                        </th>
                        <td>
                            {{ $teacher->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacher.fields.phone') }}
                        </th>
                        <td>
                            {{ $teacher->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacher.fields.email') }}
                        </th>
                        <td>
                            {{ $teacher->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacher.fields.address') }}
                        </th>
                        <td>
                            {{ $teacher->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacher.fields.profile_img') }}
                        </th>
                        <td>
                            @if($teacher->profile_img)
                                <a href="{{ $teacher->profile_img->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $teacher->profile_img->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacher.fields.user') }}
                        </th>
                        <td>
                            {{ $teacher->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacher.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Teacher::GENDER_SELECT[$teacher->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacher.fields.joining_date') }}
                        </th>
                        <td>
                            {{ $teacher->joining_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacher.fields.status') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $teacher->status ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacher.fields.salary_type') }}
                        </th>
                        <td>
                            {{ App\Models\Teacher::SALARY_TYPE_SELECT[$teacher->salary_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacher.fields.salary_amount') }}
                        </th>
                        <td>
                            {{ $teacher->salary_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacher.fields.subject') }}
                        </th>
                        <td>
                            @foreach($teacher->subjects as $key => $subject)
                                <span class="label label-info">{{ $subject->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.teachers.index') }}">
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
            <a class="nav-link" href="#teacher_expenses" role="tab" data-toggle="tab">
                {{ trans('cruds.expense.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#teacher_teachers_payments" role="tab" data-toggle="tab">
                {{ trans('cruds.teachersPayment.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="teacher_expenses">
            @includeIf('admin.teachers.relationships.teacherExpenses', ['expenses' => $teacher->teacherExpenses])
        </div>
        <div class="tab-pane" role="tabpanel" id="teacher_teachers_payments">
            @includeIf('admin.teachers.relationships.teacherTeachersPayments', ['teachersPayments' => $teacher->teacherTeachersPayments])
        </div>
    </div>
</div>

@endsection