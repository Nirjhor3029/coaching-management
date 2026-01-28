@extends('layouts.admin')
@section('content')
    <!-- Scrollable Content Area -->
    <div class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark p-4 md:p-8" style="margin-top: -2rem">
        <div class="max-w-5xl mx-auto flex flex-col gap-6 pb-12">
            <!-- Breadcrumbs -->
            <nav aria-label="Breadcrumb" class="flex">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-primary dark:text-slate-400 dark:hover:text-white"
                            href="#">
                            <span class="material-symbols-outlined text-[18px] mr-2">home</span>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <span class="material-symbols-outlined text-slate-400 text-[18px]">chevron_right</span>
                            <a class="ml-1 text-sm font-medium text-slate-500 hover:text-primary md:ml-2 dark:text-slate-400 dark:hover:text-white"
                                href="#">Students</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <span class="material-symbols-outlined text-slate-400 text-[18px]">chevron_right</span>
                            <span class="ml-1 text-sm font-medium text-slate-900 md:ml-2 dark:text-white">Add New
                                Student</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <!-- Page Header -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900 dark:text-white tracking-tight">Add New Student
                    </h1>
                    <p class="mt-1 text-slate-500 dark:text-slate-400">Fill in the details below to register a new
                        student to the database.</p>
                </div>
                <div class="flex gap-3">
                    <button
                        class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:bg-slate-800 dark:text-slate-300 dark:border-slate-600 dark:hover:bg-slate-700"
                        type="button">
                        Cancel
                    </button>
                    <button
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-lg shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                        type="button">
                        <span class="material-symbols-outlined text-[20px] mr-2">save</span>
                        Save Student
                    </button>
                </div>
            </div>
            <!-- Main Form Card -->
            <form
                class="bg-white dark:bg-[#1a2632] rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden">
                <!-- Personal Information -->
                <div class="p-6 md:p-8 border-b border-slate-200 dark:border-slate-700">
                    <div class="flex items-center gap-2 mb-6 text-primary">
                        <span class="material-symbols-outlined">person</span>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">Personal Information</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                        <!-- Photo Upload -->
                        <div class="md:col-span-4 flex flex-col gap-4">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300">Student
                                Photo</label>
                            <div id="drop-zone"
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 dark:border-slate-600 border-dashed rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors cursor-pointer group">
                                <div class="space-y-1 text-center">
                                    <div id="photo-preview"
                                        class="mx-auto h-24 w-24 rounded-full bg-slate-100 dark:bg-slate-700 flex items-center justify-center mb-4 group-hover:scale-105 transition-transform bg-cover bg-center">
                                        <span id="photo-placeholder-icon"
                                            class="material-symbols-outlined text-slate-400 text-4xl">add_a_photo</span>
                                    </div>
                                    <div class="flex text-sm text-slate-600 dark:text-slate-400 justify-center">
                                        <label
                                            class="relative cursor-pointer bg-white dark:bg-transparent rounded-md font-medium text-primary hover:text-blue-500 focus-within:outline-none"
                                            for="file-upload">
                                            <span>Upload a file</span>
                                            <input class="sr-only" id="file-upload" name="file-upload" type="file"
                                                accept="image/*" />
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-slate-500">PNG, JPG, GIF up to 5MB</p>
                                </div>
                            </div>
                        </div>
                        <!-- Inputs -->
                        <div class="md:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                    for="first-name">First Name</label>
                                <input
                                    class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                    id="first-name" name="first-name" placeholder="e.g. John" type="text" />
                            </div>
                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                    for="last-name">Last Name</label>
                                <input
                                    class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                    id="last-name" name="last-name" placeholder="e.g. Doe" type="text" />
                            </div>
                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                    for="dob">Date of Birth</label>
                                <input
                                    class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                    id="dob" name="dob" type="date" />
                            </div>
                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                    for="gender">Gender</label>
                                <select
                                    class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                    id="gender" name="gender">
                                    <option>Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                    for="blood-group">Blood Group</label>
                                <select
                                    class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                    id="blood-group" name="blood-group">
                                    <option>Select</option>
                                    <option>A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                </select>
                            </div>
                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                    for="religion">Religion</label>
                                <input
                                    class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                    id="religion" name="religion" placeholder="e.g. Christian" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Academic Details -->
                <div class="p-6 md:p-8 border-b border-slate-200 dark:border-slate-700">
                    <div class="flex items-center gap-2 mb-6 text-primary">
                        <span class="material-symbols-outlined">school</span>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">Academic Details</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                for="admission-id">Admission ID</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <span class="text-slate-500 sm:text-sm">#</span>
                                </div>
                                <input
                                    class="block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 text-slate-900 dark:text-white pl-7 shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                    id="admission-id" name="admission-id" readonly="" type="text"
                                    value="ST-2023-001" />
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                for="class">Class</label>
                            <select
                                class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                id="class" name="class">
                                <option>Select Class</option>
                                <option>Grade 1</option>
                                <option>Grade 2</option>
                                <option>Grade 3</option>
                                <option>Grade 4</option>
                                <option>Grade 5</option>
                                <option>Grade 6</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                for="section">Section</label>
                            <select
                                class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                id="section" name="section">
                                <option>Select Section</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                for="shift">Shift</label>
                            <select
                                class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                id="shift" name="shift">
                                <option>Morning</option>
                                <option>Afternoon</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                for="roll-no">Roll Number</label>
                            <input
                                class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                id="roll-no" name="roll-no" placeholder="e.g. 15" type="number" />
                        </div>
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                for="admission-date">Admission Date</label>
                            <input
                                class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                id="admission-date" name="admission-date" type="date" />
                        </div>
                    </div>
                </div>
                <!-- Guardian Information -->
                <div class="p-6 md:p-8">
                    <div class="flex items-center gap-2 mb-6 text-primary">
                        <span class="material-symbols-outlined">family_restroom</span>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">Guardian / Contact Info</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                for="guardian-name">Parent / Guardian Name</label>
                            <input
                                class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                id="guardian-name" name="guardian-name" placeholder="Full Name" type="text" />
                        </div>
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                for="email">Email Address</label>
                            <input
                                class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                id="email" name="email" placeholder="email@example.com" type="email" />
                        </div>
                        <div class="col-span-1">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                for="phone">Phone Number</label>
                            <input
                                class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                id="phone" name="phone" placeholder="+1 (555) 000-0000" type="tel" />
                        </div>
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300"
                                for="address">Current Address</label>
                            <textarea
                                class="mt-1 block w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm focus:border-primary focus:ring-primary sm:text-sm py-2.5 px-3"
                                id="address" name="address" placeholder="Enter full address..." rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <!-- Form Actions Footer -->
                <div
                    class="px-6 py-4 bg-slate-50 dark:bg-slate-800/50 border-t border-slate-200 dark:border-slate-700 flex items-center justify-end gap-3">
                    <button
                        class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:bg-slate-800 dark:text-slate-300 dark:border-slate-600 dark:hover:bg-slate-700"
                        type="reset">
                        Reset Form
                    </button>
                    <button
                        class="inline-flex items-center px-6 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-lg shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                        type="button">
                        Submit Registration
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeIcon = themeToggleBtn.querySelector('span');

        // Check for saved user preference, if any, on load of the website
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            themeIcon.textContent = 'light_mode';
        } else {
            document.documentElement.classList.remove('dark');
            themeIcon.textContent = 'dark_mode';
        }

        themeToggleBtn.addEventListener('click', function() {
            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                    themeIcon.textContent = 'light_mode';
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                    themeIcon.textContent = 'dark_mode';
                }
            } else {
                // if NOT set via local storage previously
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                    themeIcon.textContent = 'dark_mode';
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                    themeIcon.textContent = 'light_mode';
                }
            }
        });

        // Image Upload Logic
        const fileUpload = document.getElementById('file-upload');
        const dropZone = document.getElementById('drop-zone');
        const photoPreview = document.getElementById('photo-preview');
        const placeholderIcon = document.getElementById('photo-placeholder-icon');
        const studentForm = fileUpload.closest('form');

        function handleFile(file) {
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    photoPreview.style.backgroundImage = `url('${e.target.result}')`;
                    placeholderIcon.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        fileUpload.addEventListener('change', (e) => {
            handleFile(e.target.files[0]);
        });

        // Trigger file input when clicking the drop zone (except when clicking the label itself which is handled by 'for')
        dropZone.addEventListener('click', (e) => {
            if (e.target !== fileUpload && !fileUpload.contains(e.target)) {
                // fileUpload.click(); // Label 'for' already handles this for the 'Upload a file' text. 
                // However, clicking the icon or background should also trigger it.
                if (!e.target.closest('label')) {
                    fileUpload.click();
                }
            }
        });

        // Drag and Drop
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, (e) => {
                e.preventDefault();
                e.stopPropagation();
            }, false);
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.add('bg-slate-50', 'dark:bg-slate-800');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.remove('bg-slate-50', 'dark:bg-slate-800');
            }, false);
        });

        dropZone.addEventListener('drop', (e) => {
            const dt = e.dataTransfer;
            const file = dt.files[0];
            handleFile(file);
            // Also update the input element for form submission if needed (though usually done via FormData)
        });

        // Reset Photo Preview when form is reset
        studentForm.addEventListener('reset', () => {
            photoPreview.style.backgroundImage = 'none';
            placeholderIcon.classList.remove('hidden');
        });
    </script>




    {{-- Old Code --}}
    {{-- <script>
        Dropzone.options.imageDropzone = {
            url: '{{ route('admin.student-basic-infos.storeMedia') }}',
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
            success: function(file, response) {
                $('form').find('input[name="image"]').remove()
                $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($studentBasicInfo) && $studentBasicInfo->image)
                    var file = {!! json_encode($studentBasicInfo->image) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
    </script> --}}
@endsection
