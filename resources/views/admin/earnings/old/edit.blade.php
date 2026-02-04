@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.earning.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.earnings.update", [$earning->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="earning_category_id">{{ trans('cruds.earning.fields.earning_category') }}</label>
                <select class="form-control select2 {{ $errors->has('earning_category') ? 'is-invalid' : '' }}" name="earning_category_id" id="earning_category_id">
                    @foreach($earning_categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('earning_category_id') ? old('earning_category_id') : $earning->earning_category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('earning_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('earning_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.earning_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="student_id">{{ trans('cruds.earning.fields.student') }}</label>
                <select class="form-control select2 {{ $errors->has('student') ? 'is-invalid' : '' }}" name="student_id" id="student_id">
                    @foreach($students as $id => $entry)
                        <option value="{{ $id }}" {{ (old('student_id') ? old('student_id') : $earning->student->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('student'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.student_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subject_id">{{ trans('cruds.earning.fields.subject') }}</label>
                <select class="form-control select2 {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject_id" id="subject_id">
                    @foreach($subjects as $id => $entry)
                        <option value="{{ $id }}" {{ (old('subject_id') ? old('subject_id') : $earning->subject->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('subject'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subject') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.earning.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $earning->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="academic_background">{{ trans('cruds.earning.fields.academic_background') }}</label>
                <input class="form-control {{ $errors->has('academic_background') ? 'is-invalid' : '' }}" type="text" name="academic_background" id="academic_background" value="{{ old('academic_background', $earning->academic_background) }}">
                @if($errors->has('academic_background'))
                    <div class="invalid-feedback">
                        {{ $errors->first('academic_background') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.academic_background_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="exam_year">{{ trans('cruds.earning.fields.exam_year') }}</label>
                <input class="form-control {{ $errors->has('exam_year') ? 'is-invalid' : '' }}" type="text" name="exam_year" id="exam_year" value="{{ old('exam_year', $earning->exam_year) }}">
                @if($errors->has('exam_year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exam_year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.exam_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="details">{{ trans('cruds.earning.fields.details') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details" id="details">{!! old('details', $earning->details) !!}</textarea>
                @if($errors->has('details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.details_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.earning.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $earning->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="earning_date">{{ trans('cruds.earning.fields.earning_date') }}</label>
                <input class="form-control datetime {{ $errors->has('earning_date') ? 'is-invalid' : '' }}" type="text" name="earning_date" id="earning_date" value="{{ old('earning_date', $earning->earning_date) }}">
                @if($errors->has('earning_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('earning_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.earning_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="earning_month">{{ trans('cruds.earning.fields.earning_month') }}</label>
                <input class="form-control {{ $errors->has('earning_month') ? 'is-invalid' : '' }}" type="number" name="earning_month" id="earning_month" value="{{ old('earning_month', $earning->earning_month) }}" step="1">
                @if($errors->has('earning_month'))
                    <div class="invalid-feedback">
                        {{ $errors->first('earning_month') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.earning_month_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="earning_year">{{ trans('cruds.earning.fields.earning_year') }}</label>
                <input class="form-control {{ $errors->has('earning_year') ? 'is-invalid' : '' }}" type="number" name="earning_year" id="earning_year" value="{{ old('earning_year', $earning->earning_year) }}" step="1">
                @if($errors->has('earning_year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('earning_year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.earning_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="earning_reference">{{ trans('cruds.earning.fields.earning_reference') }}</label>
                <input class="form-control {{ $errors->has('earning_reference') ? 'is-invalid' : '' }}" type="text" name="earning_reference" id="earning_reference" value="{{ old('earning_reference', $earning->earning_reference) }}">
                @if($errors->has('earning_reference'))
                    <div class="invalid-feedback">
                        {{ $errors->first('earning_reference') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.earning_reference_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_method">{{ trans('cruds.earning.fields.payment_method') }}</label>
                <input class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" type="text" name="payment_method" id="payment_method" value="{{ old('payment_method', $earning->payment_method) }}">
                @if($errors->has('payment_method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_proof">{{ trans('cruds.earning.fields.payment_proof') }}</label>
                <div class="needsclick dropzone {{ $errors->has('payment_proof') ? 'is-invalid' : '' }}" id="payment_proof-dropzone">
                </div>
                @if($errors->has('payment_proof'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_proof') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.payment_proof_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_proof_details">{{ trans('cruds.earning.fields.payment_proof_details') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('payment_proof_details') ? 'is-invalid' : '' }}" name="payment_proof_details" id="payment_proof_details">{!! old('payment_proof_details', $earning->payment_proof_details) !!}</textarea>
                @if($errors->has('payment_proof_details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_proof_details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.payment_proof_details_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paid_by">{{ trans('cruds.earning.fields.paid_by') }}</label>
                <input class="form-control {{ $errors->has('paid_by') ? 'is-invalid' : '' }}" type="text" name="paid_by" id="paid_by" value="{{ old('paid_by', $earning->paid_by) }}">
                @if($errors->has('paid_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.paid_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="recieved_by">{{ trans('cruds.earning.fields.recieved_by') }}</label>
                <input class="form-control {{ $errors->has('recieved_by') ? 'is-invalid' : '' }}" type="text" name="recieved_by" id="recieved_by" value="{{ old('recieved_by', $earning->recieved_by) }}">
                @if($errors->has('recieved_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('recieved_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.recieved_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="created_by_id">{{ trans('cruds.earning.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id">
                    @foreach($created_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('created_by_id') ? old('created_by_id') : $earning->created_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('created_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.created_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="updated_by_id">{{ trans('cruds.earning.fields.updated_by') }}</label>
                <select class="form-control select2 {{ $errors->has('updated_by') ? 'is-invalid' : '' }}" name="updated_by_id" id="updated_by_id">
                    @foreach($updated_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('updated_by_id') ? old('updated_by_id') : $earning->updated_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('updated_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('updated_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.earning.fields.updated_by_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.earnings.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $earning->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    var uploadedPaymentProofMap = {}
Dropzone.options.paymentProofDropzone = {
    url: '{{ route('admin.earnings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
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
      $('form').append('<input type="hidden" name="payment_proof[]" value="' + response.name + '">')
      uploadedPaymentProofMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPaymentProofMap[file.name]
      }
      $('form').find('input[name="payment_proof[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($earning) && $earning->payment_proof)
      var files = {!! json_encode($earning->payment_proof) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="payment_proof[]" value="' + file.file_name + '">')
        }
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