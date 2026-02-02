@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.teacher.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.teachers.update", [$teacher->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="emloyee_code">{{ trans('cruds.teacher.fields.emloyee_code') }}</label>
                <input class="form-control {{ $errors->has('emloyee_code') ? 'is-invalid' : '' }}" type="text" name="emloyee_code" id="emloyee_code" value="{{ old('emloyee_code', $teacher->emloyee_code) }}" required>
                @if($errors->has('emloyee_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('emloyee_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacher.fields.emloyee_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.teacher.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $teacher->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacher.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.teacher.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $teacher->phone) }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacher.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.teacher.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $teacher->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacher.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.teacher.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $teacher->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacher.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profile_img">{{ trans('cruds.teacher.fields.profile_img') }}</label>
                <div class="needsclick dropzone {{ $errors->has('profile_img') ? 'is-invalid' : '' }}" id="profile_img-dropzone">
                </div>
                @if($errors->has('profile_img'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profile_img') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacher.fields.profile_img_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.teacher.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $teacher->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacher.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.teacher.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Teacher::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', $teacher->gender) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacher.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="joining_date">{{ trans('cruds.teacher.fields.joining_date') }}</label>
                <input class="form-control datetime {{ $errors->has('joining_date') ? 'is-invalid' : '' }}" type="text" name="joining_date" id="joining_date" value="{{ old('joining_date', $teacher->joining_date) }}">
                @if($errors->has('joining_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('joining_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacher.fields.joining_date_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ $teacher->status || old('status', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="status">{{ trans('cruds.teacher.fields.status') }}</label>
                </div>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacher.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.teacher.fields.salary_type') }}</label>
                <select class="form-control {{ $errors->has('salary_type') ? 'is-invalid' : '' }}" name="salary_type" id="salary_type">
                    <option value disabled {{ old('salary_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Teacher::SALARY_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('salary_type', $teacher->salary_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('salary_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacher.fields.salary_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salary_amount">{{ trans('cruds.teacher.fields.salary_amount') }}</label>
                <input class="form-control {{ $errors->has('salary_amount') ? 'is-invalid' : '' }}" type="number" name="salary_amount" id="salary_amount" value="{{ old('salary_amount', $teacher->salary_amount) }}" step="0.01" required>
                @if($errors->has('salary_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacher.fields.salary_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subjects">{{ trans('cruds.teacher.fields.subject') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('subjects') ? 'is-invalid' : '' }}" name="subjects[]" id="subjects" multiple>
                    @foreach($subjects as $id => $subject)
                        <option value="{{ $id }}" {{ (in_array($id, old('subjects', [])) || $teacher->subjects->contains($id)) ? 'selected' : '' }}>{{ $subject }}</option>
                    @endforeach
                </select>
                @if($errors->has('subjects'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subjects') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacher.fields.subject_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.profileImgDropzone = {
    url: '{{ route('admin.teachers.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="profile_img"]').remove()
      $('form').append('<input type="hidden" name="profile_img" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="profile_img"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($teacher) && $teacher->profile_img)
      var file = {!! json_encode($teacher->profile_img) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="profile_img" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection