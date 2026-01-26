@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.teachersPayment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.teachers-payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.teachersPayment.fields.id') }}
                        </th>
                        <td>
                            {{ $teachersPayment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teachersPayment.fields.teacher') }}
                        </th>
                        <td>
                            {{ $teachersPayment->teacher->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teachersPayment.fields.payment_details') }}
                        </th>
                        <td>
                            {{ $teachersPayment->payment_details }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teachersPayment.fields.month') }}
                        </th>
                        <td>
                            {{ $teachersPayment->month }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teachersPayment.fields.year') }}
                        </th>
                        <td>
                            {{ $teachersPayment->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teachersPayment.fields.payment_status') }}
                        </th>
                        <td>
                            {{ App\Models\TeachersPayment::PAYMENT_STATUS_SELECT[$teachersPayment->payment_status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.teachers-payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection