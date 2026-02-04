@extends('layouts.admin')
@section('content')

    <div class="flex-1 overflow-y-auto bg-[#f8fafc] dark:bg-[#0f172a] transition-colors duration-300">
        <div class="max-w-5xl mx-auto p-4 md:p-8 lg:p-12">
            <!-- Breadcrumbs & Header -->
            <div class="mb-10 animate-in fade-in slide-in-from-top-4 duration-700">
                <nav
                    class="flex items-center gap-2 text-xs font-medium uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-4">
                    <a href="{{ route('admin.home') }}" class="hover:text-primary transition-colors">Dashboard</a>
                    <span class="material-symbols-outlined !text-[14px]">chevron_right</span>
                    <a href="{{ route('admin.earnings.index') }}" class="hover:text-primary transition-colors">Earnings</a>
                    <span class="material-symbols-outlined !text-[14px]">chevron_right</span>
                    <span class="text-slate-900 dark:text-white">Record New Earning</span>
                </nav>

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                            Record <span class="text-primary">Earning</span>
                        </h1>
                        <p class="mt-2 text-slate-600 dark:text-slate-400 text-lg">
                            Log tuition fees, exam charges, and other revenue sources.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <form action="{{ route('admin.earnings.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-8 animate-in fade-in slide-in-from-bottom-6 duration-1000 delay-200">
                @csrf

                <!-- Section: Core Details -->
                <div class="relative group">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-primary/20 to-blue-500/20 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000">
                    </div>
                    <div
                        class="relative bg-white dark:bg-slate-800/50 backdrop-blur-xl rounded-2xl shadow-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                        <div
                            class="p-6 md:p-8 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/80">
                            <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary">analytics</span>
                                </div>
                                Core Information
                            </h2>
                        </div>

                        <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Category -->
                            <div class="space-y-2">
                                <label
                                    class="text-sm font-semibold text-slate-700 dark:text-slate-300 flex items-center gap-2"
                                    for="earning_category_id">
                                    {{ trans('cruds.earning.fields.earning_category') }}
                                </label>
                                <select
                                    class="form-control select2 block w-full {{ $errors->has('earning_category') ? 'ring-2 ring-red-500' : '' }}"
                                    name="earning_category_id" id="earning_category_id">
                                    @foreach($earning_categories as $id => $entry)
                                        <option value="{{ $id }}" {{ old('earning_category_id') == $id ? 'selected' : '' }}>
                                            {{ $entry }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('earning_category'))
                                    <p class="text-xs font-medium text-red-500 flex items-center gap-1">
                                        <span class="material-symbols-outlined !text-[14px]">error</span>
                                        {{ $errors->first('earning_category') }}
                                    </p>
                                @endif
                            </div>

                            <!-- Title -->
                            <div class="space-y-2">
                                <label
                                    class="text-sm font-semibold text-slate-700 dark:text-slate-300 flex items-center gap-2"
                                    for="title">
                                    {{ trans('cruds.earning.fields.title') }} <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input
                                        class="w-full bg-slate-50 dark:bg-slate-900/50 border-slate-200 dark:border-slate-700 rounded-xl py-3 px-4 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent transition-all {{ $errors->has('title') ? 'ring-2 ring-red-500 border-transparent' : '' }}"
                                        type="text" name="title" id="title" value="{{ old('title', '') }}"
                                        placeholder="e.g. Monthly Tuition Fee" required>
                                </div>
                                @if($errors->has('title'))
                                    <p class="text-xs font-medium text-red-500 flex items-center gap-1">
                                        <span class="material-symbols-outlined !text-[14px]">error</span>
                                        {{ $errors->first('title') }}
                                    </p>
                                @endif
                            </div>

                            <!-- Student -->
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300" for="student_id">
                                    {{ trans('cruds.earning.fields.student') }}
                                </label>
                                <select
                                    class="form-control select2 block w-full {{ $errors->has('student') ? 'ring-2 ring-red-500' : '' }}"
                                    name="student_id" id="student_id">
                                    @foreach($students as $id => $entry)
                                        <option value="{{ $id }}" {{ old('student_id') == $id ? 'selected' : '' }}>{{ $entry }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('student'))
                                    <p class="text-xs font-medium text-red-500 flex items-center gap-1">
                                        <span class="material-symbols-outlined !text-[14px]">error</span>
                                        {{ $errors->first('student') }}
                                    </p>
                                @endif
                            </div>

                            <!-- Subject -->
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300" for="subject_id">
                                    {{ trans('cruds.earning.fields.subject') }}
                                </label>
                                <select
                                    class="form-control select2 block w-full {{ $errors->has('subject') ? 'ring-2 ring-red-500' : '' }}"
                                    name="subject_id" id="subject_id">
                                    @foreach($subjects as $id => $entry)
                                        <option value="{{ $id }}" {{ old('subject_id') == $id ? 'selected' : '' }}>{{ $entry }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('subject'))
                                    <p class="text-xs font-medium text-red-500 flex items-center gap-1">
                                        <span class="material-symbols-outlined !text-[14px]">error</span>
                                        {{ $errors->first('subject') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Financial & Academic Details -->
                <div
                    class="bg-white dark:bg-slate-800/50 backdrop-blur-xl rounded-2xl shadow-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                    <div
                        class="p-6 md:p-8 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/80">
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-orange-500/10 flex items-center justify-center">
                                <span class="material-symbols-outlined text-orange-500">payments</span>
                            </div>
                            Financial & Academic Details
                        </h2>
                    </div>

                    <div class="p-6 md:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Amount -->
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300" for="amount">
                                    {{ trans('cruds.earning.fields.amount') }} <span class="text-red-500">*</span>
                                </label>
                                <div class="relative group/input">
                                    <div
                                        class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold group-focus-within/input:text-primary transition-colors">
                                        $</div>
                                    <input
                                        class="w-full bg-slate-50 dark:bg-slate-900/50 border-slate-200 dark:border-slate-700 rounded-xl py-3 pl-8 pr-4 text-slate-900 dark:text-white font-bold focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                        type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01"
                                        required>
                                </div>
                                @if($errors->has('amount'))
                                    <p class="text-xs font-medium text-red-500">{{ $errors->first('amount') }}</p>
                                @endif
                            </div>

                            <!-- Date -->
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300" for="earning_date">
                                    {{ trans('cruds.earning.fields.earning_date') }}
                                </label>
                                <div class="relative group/input">
                                    <span
                                        class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-400 !text-[20px] group-focus-within/input:text-primary transition-colors">calendar_today</span>
                                    <input
                                        class="w-full bg-slate-50 dark:bg-slate-900/50 border-slate-200 dark:border-slate-700 rounded-xl py-3 pl-12 pr-4 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent transition-all datetime"
                                        type="text" name="earning_date" id="earning_date" value="{{ old('earning_date') }}">
                                </div>
                            </div>

                            <!-- Reference -->
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300"
                                    for="earning_reference">
                                    {{ trans('cruds.earning.fields.earning_reference') }}
                                </label>
                                <input
                                    class="w-full bg-slate-50 dark:bg-slate-900/50 border-slate-200 dark:border-slate-700 rounded-xl py-3 px-4 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                    type="text" name="earning_reference" id="earning_reference"
                                    value="{{ old('earning_reference', '') }}" placeholder="REF-0000">
                            </div>

                            <!-- Academic Background -->
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300"
                                    for="academic_background">
                                    {{ trans('cruds.earning.fields.academic_background') }}
                                </label>
                                <input
                                    class="w-full bg-slate-50 dark:bg-slate-900/50 border-slate-200 dark:border-slate-700 rounded-xl py-3 px-4 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                    type="text" name="academic_background" id="academic_background"
                                    value="{{ old('academic_background', '') }}" placeholder="e.g. Science">
                            </div>

                            <!-- Exam Year -->
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300" for="exam_year">
                                    {{ trans('cruds.earning.fields.exam_year') }}
                                </label>
                                <input
                                    class="w-full bg-slate-50 dark:bg-slate-900/50 border-slate-200 dark:border-slate-700 rounded-xl py-3 px-4 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                    type="text" name="exam_year" id="exam_year" value="{{ old('exam_year', '') }}"
                                    placeholder="2024">
                            </div>

                            <!-- Payment Method -->
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300"
                                    for="payment_method">
                                    {{ trans('cruds.earning.fields.payment_method') }}
                                </label>
                                <input
                                    class="w-full bg-slate-50 dark:bg-slate-900/50 border-slate-200 dark:border-slate-700 rounded-xl py-3 px-4 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                    type="text" name="payment_method" id="payment_method"
                                    value="{{ old('payment_method', '') }}" placeholder="Cash, Card, Transfer">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                            <!-- Month -->
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300" for="earning_month">
                                    {{ trans('cruds.earning.fields.earning_month') }}
                                </label>
                                <input
                                    class="w-full bg-slate-50 dark:bg-slate-900/50 border-slate-200 dark:border-slate-700 rounded-xl py-3 px-4 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                    type="number" name="earning_month" id="earning_month"
                                    value="{{ old('earning_month', date('n')) }}" step="1">
                            </div>

                            <!-- Year -->
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300" for="earning_year">
                                    {{ trans('cruds.earning.fields.earning_year') }}
                                </label>
                                <input
                                    class="w-full bg-slate-50 dark:bg-slate-900/50 border-slate-200 dark:border-slate-700 rounded-xl py-3 px-4 text-slate-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                    type="number" name="earning_year" id="earning_year"
                                    value="{{ old('earning_year', date('Y')) }}" step="1">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Documentation & Administrative -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Proof & Details -->
                    <div class="lg:col-span-2 space-y-8">
                        <div
                            class="bg-white dark:bg-slate-800/50 backdrop-blur-xl rounded-2xl shadow-xl border border-slate-200 dark:border-slate-700 p-6 md:p-8">
                            <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">description</span>
                                Supporting Documents
                            </h2>

                            <div class="space-y-6">
                                <div>
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2 block"
                                        for="details">
                                        {{ trans('cruds.earning.fields.details') }}
                                    </label>
                                    <div class="prose max-w-none">
                                        <textarea class="form-control ckeditor" name="details"
                                            id="details">{!! old('details') !!}</textarea>
                                    </div>
                                </div>

                                <div>
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2 block">
                                        {{ trans('cruds.earning.fields.payment_proof') }}
                                    </label>
                                    <div class="needsclick dropzone bg-slate-50 dark:bg-slate-900/50 border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-xl hover:border-primary transition-colors duration-300"
                                        id="payment_proof-dropzone">
                                        <div class="dz-message" data-dz-message>
                                            <span
                                                class="material-symbols-outlined !text-4xl text-slate-400">cloud_upload</span>
                                            <p class="text-sm text-slate-500 mt-2">Drop receipt or click to upload</p>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2 block"
                                        for="payment_proof_details">
                                        {{ trans('cruds.earning.fields.payment_proof_details') }}
                                    </label>
                                    <textarea class="form-control ckeditor" name="payment_proof_details"
                                        id="payment_proof_details">{!! old('payment_proof_details') !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payer/Receiver Info -->
                    <div class="lg:col-span-1">
                        <div
                            class="sticky top-8 bg-white dark:bg-slate-800/50 backdrop-blur-xl rounded-2xl shadow-xl border border-slate-200 dark:border-slate-700 p-6 md:p-8">
                            <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-3">
                                <span class="material-symbols-outlined text-emerald-500">assignment_ind</span>
                                Assignment
                            </h2>

                            <div class="space-y-6">
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300" for="paid_by">
                                        {{ trans('cruds.earning.fields.paid_by') }}
                                    </label>
                                    <input
                                        class="w-full bg-slate-50 dark:bg-slate-900/50 border-slate-200 dark:border-slate-700 rounded-xl py-3 px-4 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all"
                                        type="text" name="paid_by" id="paid_by" value="{{ old('paid_by', '') }}"
                                        placeholder="Full Name">
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300"
                                        for="recieved_by">
                                        {{ trans('cruds.earning.fields.recieved_by') }}
                                    </label>
                                    <input
                                        class="w-full bg-slate-50 dark:bg-slate-900/50 border-slate-200 dark:border-slate-700 rounded-xl py-3 px-4 text-slate-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all"
                                        type="text" name="recieved_by" id="recieved_by" value="{{ old('recieved_by', '') }}"
                                        placeholder="Receiver Name">
                                </div>

                                <div
                                    class="p-4 bg-emerald-50 dark:bg-emerald-500/10 rounded-xl border border-emerald-100 dark:border-emerald-500/20 mt-8">
                                    <p class="text-xs text-emerald-700 dark:text-emerald-400 font-medium leading-relaxed">
                                        <span class="material-symbols-outlined !text-[14px] align-middle mr-1">info</span>
                                        Log entries are automatically time-stamped and linked to your account for auditing.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-end gap-4 pb-12">
                    <a href="{{ route('admin.earnings.index') }}"
                        class="w-full sm:w-auto px-8 py-3.5 rounded-xl text-sm font-bold text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all text-center">
                        Discard Changes
                    </a>
                    <button
                        class="w-full sm:w-auto px-10 py-3.5 rounded-xl text-sm font-bold text-white bg-primary hover:bg-primary-hover shadow-lg shadow-primary/25 transition-all transform active:scale-95 flex items-center justify-center gap-3"
                        type="submit">
                        <span class="material-symbols-outlined">save</span>
                        Confirm & Record
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            // Enhanced Select2 for better mobile experience
            $('.select2').select2({
                width: '100%',
                containerCssClass: 'modern-select2'
            });

            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function (loader) {
                    return {
                        upload: function () {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function (resolve, reject) {
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '{{ route('admin.earnings.storeCKEditorImages') }}', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        xhr.addEventListener('error', function () { reject(`Couldn't upload file: ${file.name}.`) });
                                        xhr.addEventListener('abort', function () { reject() });
                                        xhr.addEventListener('load', function () {
                                            var response = xhr.response;
                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response.message ? `${response.message}` : `${xhr.status} ${xhr.statusText}`);
                                            }
                                            $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');
                                            resolve({ default: response.url });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function (e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

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
                ClassicEditor.create(allEditors[i], {
                    extraPlugins: [SimpleUploadAdapter]
                });
            }
        });

        var uploadedPaymentProofMap = {}
        Dropzone.options.paymentProofDropzone = {
            url: '{{ route('admin.earnings.storeMedia') }}',
            maxFilesize: 5, // Increased to 5MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.pdf', // Added PDF support
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="payment_proof[]" value="' + response.name + '">')
                uploadedPaymentProofMap[file.name] = response.name
            },
            removedfile: function (file) {
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
                    var message = response
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

    <style>
        .modern-select2+.select2-container .select2-selection {
            @apply bg-slate-50 dark:bg-slate-900/50 border-slate-200 dark:border-slate-700 rounded-xl h-[48px] flex items-center px-2;
        }

        .modern-select2+.select2-container--default .select2-selection--single .select2-selection__arrow {
            @apply h-[48px] top-0;
        }

        .modern-select2+.select2-container--default .select2-selection--single .select2-selection__rendered {
            @apply text-slate-900 dark:text-white font-medium;
        }

        .ck-editor__素质 {
            @apply border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm;
        }
    </style>
@endsection