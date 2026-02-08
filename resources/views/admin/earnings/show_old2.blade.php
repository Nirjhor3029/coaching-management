@extends('layouts.admin')

@section('styles')
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .dark .glass-effect {
            background: rgba(15, 23, 42, 0.6);
        }

        .status-badge {
            position: relative;
            overflow: hidden;
        }

        .status-badge::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <main class="flex-1 flex flex-col h-full overflow-hidden bg-slate-50 dark:bg-[#0F172A] relative">
        <!-- Background Decoration -->
        <div
            class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-500/5 blur-[120px] rounded-full -translate-y-1/2 translate-x-1/2 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-500/5 blur-[120px] rounded-full translate-y-1/2 -translate-x-1/2 pointer-events-none">
        </div>

        <div class="flex-1 overflow-y-auto p-4 md:p-8 lg:px-12 relative z-10">
            <div class="max-w-4xl mx-auto space-y-8">
                <!-- Breadcrumbs & Actions -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="space-y-3">
                        <nav class="flex items-center gap-2 text-sm">
                            <a class="text-slate-500 hover:text-[#2563EB] dark:text-slate-400 dark:hover:text-[#60A5FA] transition-colors"
                                href="{{ route('admin.home') }}">Home</a>
                            <span class="text-slate-400">/</span>
                            <a class="text-slate-500 hover:text-[#2563EB] dark:text-slate-400 dark:hover:text-[#60A5FA] transition-colors"
                                href="{{ route('admin.earnings.index') }}">Finances</a>
                            <span class="text-slate-400">/</span>
                            <span class="text-[#1F2937] dark:text-[#F9FAFB] font-medium">Earning Details</span>
                        </nav>
                        <h1
                            class="text-3xl md:text-4xl font-extrabold text-[#1F2937] dark:text-[#F9FAFB] tracking-tight flex items-center gap-3">
                            Transaction Overview
                            <span
                                class="status-badge px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-[0.2em] bg-green-500/10 text-green-500 border border-green-500/20">
                                Verified
                            </span>
                        </h1>
                    </div>

                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.earnings.edit', $earning->id) }}"
                            class="flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700 hover:border-blue-500 dark:hover:border-blue-400 hover:text-blue-600 dark:hover:text-blue-400 transition-all shadow-sm font-semibold text-sm">
                            <span class="material-symbols-outlined text-[20px]">edit</span>
                            Edit
                        </a>
                        <button onclick="window.print()"
                            class="flex items-center gap-2 px-5 py-2.5 rounded-xl bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-700 dark:hover:bg-blue-600 transition-all shadow-lg shadow-blue-500/20 font-semibold text-sm">
                            <span class="material-symbols-outlined text-[20px]">print</span>
                            Print
                        </button>
                    </div>
                </div>

                <!-- Main Info Card -->
                <div
                    class="bg-white dark:bg-slate-800/50 rounded-3xl shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-200 dark:border-slate-700/50 overflow-hidden">
                    <!-- Card Header - Invoice Style -->
                    <div
                        class="p-8 md:p-10 border-b border-slate-100 dark:border-slate-700/50 bg-slate-50/50 dark:bg-slate-800/20 flex flex-col md:flex-row gap-8 justify-between items-start">
                        <div class="space-y-4">
                            <div
                                class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 text-xs font-bold uppercase tracking-wider">
                                {{ $earning->earning_category->name ?? 'Income' }}
                            </div>
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-800 dark:text-white leading-tight">
                                {{ $earning->title }}
                            </h2>
                            <div class="flex items-center gap-4 text-slate-500 dark:text-slate-400 text-sm">
                                <span class="flex items-center gap-1.5 font-mono">
                                    <span class="material-symbols-outlined text-[18px]">receipt</span>
                                    {{ $earning->earning_reference }}
                                </span>
                                <span class="w-1 h-1 rounded-full bg-slate-300 dark:bg-slate-600"></span>
                                <span class="flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-[18px]">calendar_today</span>
                                    {{ \Carbon\Carbon::parse($earning->earning_date)->format('d M, Y') }}
                                </span>
                            </div>
                        </div>

                        <div class="flex flex-col items-end gap-2">
                            <div class="text-right">
                                <p
                                    class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-1">
                                    Received Amount</p>
                                <div
                                    class="text-4xl md:text-5xl font-black text-slate-800 dark:text-white flex items-start gap-1">
                                    <span class="text-2xl mt-1.5 text-blue-500">$</span>
                                    {{ number_format($earning->amount, 2) }}
                                </div>
                            </div>
                            <div
                                class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-700">
                                <span class="material-symbols-outlined text-[18px] text-slate-500">payments</span>
                                <span
                                    class="text-sm font-semibold text-slate-600 dark:text-slate-300 capitalize">{{ str_replace('_', ' ', $earning->payment_method) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Info Sections -->
                    <div class="p-8 md:p-10 space-y-12">

                        @if ($earning->student_id)
                            <!-- Student/Academic Context - Only show if student exists -->
                            <div class="space-y-6">
                                <h3
                                    class="flex items-center gap-2 text-sm font-bold text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em]">
                                    <span class="material-symbols-outlined text-[20px]">school</span>
                                    Student Context
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div
                                        class="p-5 rounded-2xl bg-slate-50 dark:bg-slate-900/50 border border-slate-100 dark:border-slate-700/30 group">
                                        <p class="text-xs font-medium text-slate-400 dark:text-slate-500 mb-2">Student Name
                                            & ID</p>
                                        <p class="text-base font-bold text-slate-800 dark:text-slate-100">
                                            {{ $earning->student->first_name ?? '' }}
                                            {{ $earning->student->last_name ?? '' }}</p>
                                        <p class="text-xs font-mono text-blue-500 mt-1">
                                            #{{ $earning->student->id_no ?? 'N/A' }}</p>
                                    </div>

                                    @if ($earning->subject)
                                        <div
                                            class="p-5 rounded-2xl bg-slate-50 dark:bg-slate-900/50 border border-slate-100 dark:border-slate-700/30">
                                            <p class="text-xs font-medium text-slate-400 dark:text-slate-500 mb-2">Enrolled
                                                Batch/Subject</p>
                                            <p class="text-base font-bold text-slate-800 dark:text-slate-100">
                                                {{ $earning->subject->name ?? 'N/A' }}</p>
                                        </div>
                                    @endif

                                    <div
                                        class="p-5 rounded-2xl bg-slate-50 dark:bg-slate-900/50 border border-slate-100 dark:border-slate-700/30">
                                        <p class="text-xs font-medium text-slate-400 dark:text-slate-500 mb-2">Academic
                                            Details</p>
                                        <div class="flex flex-wrap gap-2 mt-1">
                                            @if ($earning->academic_background)
                                                <span
                                                    class="px-2 py-0.5 rounded-md bg-white dark:bg-slate-800 text-[10px] font-bold border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 capitalize">{{ $earning->academic_background }}</span>
                                            @endif
                                            @if ($earning->exam_year)
                                                <span
                                                    class="px-2 py-0.5 rounded-md bg-white dark:bg-slate-800 text-[10px] font-bold border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300">Exam:
                                                    {{ $earning->exam_year }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Payer Information -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <div class="space-y-6">
                                <h3
                                    class="flex items-center gap-2 text-sm font-bold text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em]">
                                    <span class="material-symbols-outlined text-[20px]">person_check</span>
                                    Participant Details
                                </h3>
                                <div class="space-y-4">
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl border border-dashed border-slate-200 dark:border-slate-700">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-900 flex items-center justify-center text-slate-400">
                                                <span class="material-symbols-outlined">person</span>
                                            </div>
                                            <div>
                                                <p class="text-xs font-medium text-slate-400 dark:text-slate-500">Paid By
                                                </p>
                                                <p class="text-sm font-bold text-slate-700 dark:text-slate-200">
                                                    {{ $earning->paid_by ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                        <span
                                            class="text-[10px] px-2 py-0.5 rounded-full bg-blue-50 dark:bg-blue-500/10 text-blue-500 font-black tracking-tight">PAYER</span>
                                    </div>

                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl border border-dashed border-slate-200 dark:border-slate-700">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-900 flex items-center justify-center text-slate-400">
                                                @if ($earning->created_by->photo)
                                                    <img src="{{ $earning->created_by->photo->getUrl('thumb') }}"
                                                        class="w-full h-full rounded-full object-cover">
                                                @else
                                                    <span class="material-symbols-outlined">assignment_ind</span>
                                                @endif
                                            </div>
                                            <div>
                                                <p class="text-xs font-medium text-slate-400 dark:text-slate-500">Received
                                                    By</p>
                                                <p class="text-sm font-bold text-slate-700 dark:text-slate-200">
                                                    {{ $earning->created_by->name ?? 'System' }}</p>
                                            </div>
                                        </div>
                                        <span
                                            class="text-[10px] px-2 py-0.5 rounded-full bg-emerald-50 dark:bg-emerald-500/10 text-emerald-500 font-black tracking-tight">OFFICER</span>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <h3
                                    class="flex items-center gap-2 text-sm font-bold text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em]">
                                    <span class="material-symbols-outlined text-[20px]">description</span>
                                    Additional Notes
                                </h3>
                                <div
                                    class="p-6 rounded-2xl bg-indigo-50/30 dark:bg-slate-900/50 border border-indigo-100/50 dark:border-slate-700/50 min-h-[140px]">
                                    @if ($earning->details || $earning->payment_proof_details)
                                        <div class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed space-y-4">
                                            @if ($earning->details)
                                                <div class="prose dark:prose-invert prose-sm max-w-none">
                                                    {!! $earning->details !!}
                                                </div>
                                            @endif
                                            @if ($earning->payment_proof_details)
                                                <div class="pt-2 border-t border-slate-200 dark:border-slate-700">
                                                    <p
                                                        class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase mb-1">
                                                        Payment Proof Info</p>
                                                    <p class="italic text-slate-500 dark:text-slate-400">
                                                        {{ $earning->payment_proof_details }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <div
                                            class="h-full flex flex-col items-center justify-center text-slate-400 dark:text-slate-600 gap-2">
                                            <span class="material-symbols-outlined text-4xl">notes</span>
                                            <p class="text-xs italic">No additional notes provided for this transaction.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Media Assets -->
                        @if ($earning->payment_proof->count() > 0)
                            <div class="space-y-6 pt-6 border-t border-slate-100 dark:border-slate-700/50">
                                <h3
                                    class="flex items-center gap-2 text-sm font-bold text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em]">
                                    <span class="material-symbols-outlined text-[20px]">attach_file</span>
                                    Verification Attachments ({{ $earning->payment_proof->count() }})
                                </h3>
                                <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-5 gap-4">
                                    @foreach ($earning->payment_proof as $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank"
                                            class="group block relative aspect-square rounded-2xl overflow-hidden bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 hover:border-blue-500 transition-all shadow-sm">
                                            <img src="{{ $media->getUrl('thumb') }}" alt="Proof"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center p-3">
                                                <div
                                                    class="flex items-center gap-1.5 text-white text-[10px] font-bold uppercase tracking-tighter">
                                                    <span class="material-symbols-outlined text-sm">visibility</span>
                                                    View Original
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Footer / Audit -->
                    <div
                        class="px-8 py-5 bg-slate-50/80 dark:bg-slate-900 border-t border-slate-100 dark:border-slate-700/50 flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm text-slate-400">update</span>
                                <p
                                    class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">
                                    Last Activity: {{ $earning->updated_at->diffForHumans() }}
                                </p>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm text-slate-400">person_edit</span>
                                <p
                                    class="text-[10px] font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">
                                    Processor: {{ $earning->updated_by->name ?? 'System' }}
                                </p>
                            </div>
                        </div>
                        <p class="text-[10px] text-slate-400 dark:text-slate-600 font-mono">
                            {{ $earning->updated_at->format('Y-m-d H:i:s') }} UTC
                        </p>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="flex justify-center pt-4 pb-12">
                    <a href="{{ route('admin.earnings.index') }}"
                        class="inline-flex items-center gap-2 text-slate-400 hover:text-blue-500 dark:text-slate-500 dark:hover:text-blue-400 font-bold text-xs uppercase tracking-[0.2em] transition-all group">
                        <span
                            class="material-symbols-outlined text-[18px] transition-transform group-hover:-translate-x-1">arrow_back</span>
                        Return to Revenue Stream
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
