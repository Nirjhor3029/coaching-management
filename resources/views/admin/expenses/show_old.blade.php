@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.expense.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.expenses.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.id') }}
                            </th>
                            <td>
                                {{ $expense->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.expense_category') }}
                            </th>
                            <td>
                                {{ $expense->expense_category->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.title') }}
                            </th>
                            <td>
                                {{ $expense->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.details') }}
                            </th>
                            <td>
                                {!! $expense->details !!}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.amount') }}
                            </th>
                            <td>
                                {{ $expense->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.expense_date') }}
                            </th>
                            <td>
                                {{ $expense->expense_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.expense_month') }}
                            </th>
                            <td>
                                {{ $expense->expense_month }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.expense_year') }}
                            </th>
                            <td>
                                {{ $expense->expense_year }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.expense_reference') }}
                            </th>
                            <td>
                                {{ $expense->expense_reference }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.payment_method') }}
                            </th>
                            <td>
                                {{ $expense->payment_method }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.payment_proof') }}
                            </th>
                            <td>
                                @foreach($expense->payment_proof as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.payment_proof_details') }}
                            </th>
                            <td>
                                {!! $expense->payment_proof_details !!}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.paid_by') }}
                            </th>
                            <td>
                                {{ $expense->paid_by }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.created_by') }}
                            </th>
                            <td>
                                {{ $expense->created_by->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.updated_by') }}
                            </th>
                            <td>
                                {{ $expense->updated_by->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.teacher') }}
                            </th>
                            <td>
                                {{ $expense->teacher->name ?? '' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.expenses.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection