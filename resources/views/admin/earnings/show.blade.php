@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.earning.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.earnings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.id') }}
                        </th>
                        <td>
                            {{ $earning->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.earning_category') }}
                        </th>
                        <td>
                            {{ $earning->earning_category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.student') }}
                        </th>
                        <td>
                            {{ $earning->student->id_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.subject') }}
                        </th>
                        <td>
                            {{ $earning->subject->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.title') }}
                        </th>
                        <td>
                            {{ $earning->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.academic_background') }}
                        </th>
                        <td>
                            {{ $earning->academic_background }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.exam_year') }}
                        </th>
                        <td>
                            {{ $earning->exam_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.details') }}
                        </th>
                        <td>
                            {!! $earning->details !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.amount') }}
                        </th>
                        <td>
                            {{ $earning->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.earning_date') }}
                        </th>
                        <td>
                            {{ $earning->earning_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.earning_month') }}
                        </th>
                        <td>
                            {{ $earning->earning_month }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.earning_year') }}
                        </th>
                        <td>
                            {{ $earning->earning_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.earning_reference') }}
                        </th>
                        <td>
                            {{ $earning->earning_reference }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.payment_method') }}
                        </th>
                        <td>
                            {{ $earning->payment_method }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.payment_proof') }}
                        </th>
                        <td>
                            @foreach($earning->payment_proof as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.payment_proof_details') }}
                        </th>
                        <td>
                            {!! $earning->payment_proof_details !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.paid_by') }}
                        </th>
                        <td>
                            {{ $earning->paid_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.recieved_by') }}
                        </th>
                        <td>
                            {{ $earning->recieved_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.created_by') }}
                        </th>
                        <td>
                            {{ $earning->created_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earning.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $earning->updated_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.earnings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection