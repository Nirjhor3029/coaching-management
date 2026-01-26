@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.teachersPayment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.teachers-payments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="teacher_id">{{ trans('cruds.teachersPayment.fields.teacher') }}</label>
                <select class="form-control select2 {{ $errors->has('teacher') ? 'is-invalid' : '' }}" name="teacher_id" id="teacher_id">
                    @foreach($teachers as $id => $entry)
                        <option value="{{ $id }}" {{ old('teacher_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('teacher'))
                    <div class="invalid-feedback">
                        {{ $errors->first('teacher') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teachersPayment.fields.teacher_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_details">{{ trans('cruds.teachersPayment.fields.payment_details') }}</label>
                <textarea class="form-control {{ $errors->has('payment_details') ? 'is-invalid' : '' }}" name="payment_details" id="payment_details">{{ old('payment_details') }}</textarea>
                @if($errors->has('payment_details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teachersPayment.fields.payment_details_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="month">{{ trans('cruds.teachersPayment.fields.month') }}</label>
                <input class="form-control {{ $errors->has('month') ? 'is-invalid' : '' }}" type="number" name="month" id="month" value="{{ old('month', '') }}" step="1">
                @if($errors->has('month'))
                    <div class="invalid-feedback">
                        {{ $errors->first('month') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teachersPayment.fields.month_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="year">{{ trans('cruds.teachersPayment.fields.year') }}</label>
                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" type="number" name="year" id="year" value="{{ old('year', '') }}" step="1">
                @if($errors->has('year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teachersPayment.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.teachersPayment.fields.payment_status') }}</label>
                <select class="form-control {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" name="payment_status" id="payment_status">
                    <option value disabled {{ old('payment_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TeachersPayment::PAYMENT_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_status', 'due') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teachersPayment.fields.payment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection