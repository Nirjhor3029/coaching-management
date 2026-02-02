@extends('layouts.admin')
@section('content')

    <!-- Page Scroll Container -->
    <div
        class="flex-1 overflow-y-auto p-6 lg:px-10 lg:py-8 bg-background-light dark:bg-background-dark transition-colors duration-200">
        <div class="max-w-[800px] mx-auto flex flex-col gap-8">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-sm">
                <a class="text-text-secondary dark:text-gray-400 hover:text-primary transition-colors"
                    href="{{ route('admin.home') }}">Dashboard</a>
                <span class="text-text-secondary dark:text-gray-500">/</span>
                <a class="text-text-secondary dark:text-gray-400 hover:text-primary transition-colors"
                    href="{{ route('admin.teachers-payments.index') }}">Teachers Payments</a>
                <span class="text-text-secondary dark:text-gray-500">/</span>
                <span class="text-text-main dark:text-white font-medium">Payment Details</span>
            </nav>

            <!-- Page Heading -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex flex-col gap-1">
                    <h1 class="text-3xl font-bold text-text-main dark:text-white tracking-tight">
                        {{ trans('global.show') }} {{ trans('cruds.teachersPayment.title_singular') }}
                    </h1>
                    <p class="text-text-secondary dark:text-gray-400">
                        Detailed information for transaction record #{{ $teachersPayment->id }}
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.teachers-payments.edit', $teachersPayment->id) }}"
                        class="px-4 py-2 rounded-lg text-sm font-medium text-white bg-primary hover:bg-primary-hover shadow-lg shadow-primary/30 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined !text-[18px]">edit</span>
                        Edit
                    </a>
                </div>
            </div>

            <!-- Content Card -->
            <div
                class="bg-card-light dark:bg-card-dark rounded-xl shadow-sm border border-border-light dark:border-border-dark overflow-hidden">
                <!-- Header with Status -->
                <div
                    class="p-6 border-b border-border-light dark:border-border-dark flex items-center justify-between bg-background-light/30 dark:bg-black/10">
                    <div class="flex items-center gap-4">
                        <div class="size-12 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-2xl">payments</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-text-main dark:text-white">Transaction Record</h3>
                            <p class="text-xs text-text-secondary">ID: #{{ $teachersPayment->id }}</p>
                        </div>
                    </div>
                    <div>
                        @php
                            $status = $teachersPayment->payment_status;
                            $statusLabel = App\Models\TeachersPayment::PAYMENT_STATUS_SELECT[$status] ?? $status;
                            $colorClass = match ($status) {
                                'paid' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400',
                                'due' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400',
                                default => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
                            };
                        @endphp
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $colorClass }}">
                            {{ $statusLabel }}
                        </span>
                    </div>
                </div>

                <!-- Info Grid -->
                <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                    <!-- Teacher -->
                    <div class="flex flex-col gap-1.5">
                        <span class="text-xs font-semibold text-text-secondary uppercase tracking-wider">Teacher Name</span>
                        <div class="flex items-center gap-2 text-text-main dark:text-white font-medium">
                            <span class="material-symbols-outlined text-primary text-[20px]">person</span>
                            {{ $teachersPayment->teacher->name ?? 'N/A' }}
                        </div>
                    </div>

                    <!-- Period -->
                    <div class="flex flex-col gap-1.5">
                        <span class="text-xs font-semibold text-text-secondary uppercase tracking-wider">Payment
                            Period</span>
                        <div class="flex items-center gap-2 text-text-main dark:text-white font-medium">
                            <span class="material-symbols-outlined text-primary text-[20px]">calendar_today</span>
                            {{ DateTime::createFromFormat('!m', $teachersPayment->month)->format('F') }},
                            {{ $teachersPayment->year }}
                        </div>
                    </div>

                    <!-- Payment Status (Redundant but consistent) -->
                    <div class="flex flex-col gap-1.5">
                        <span class="text-xs font-semibold text-text-secondary uppercase tracking-wider">Status
                            Details</span>
                        <div class="flex items-center gap-2 text-text-main dark:text-white font-medium">
                            @if($status === 'paid')
                                <span class="material-symbols-outlined text-green-500 text-[20px]">check_circle</span>
                            @elseif($status === 'due')
                                <span class="material-symbols-outlined text-yellow-500 text-[20px]">pending</span>
                            @else
                                <span class="material-symbols-outlined text-red-500 text-[20px]">error</span>
                            @endif
                            {{ $statusLabel }}
                        </div>
                    </div>

                    <!-- Timestamp -->
                    <div class="flex flex-col gap-1.5">
                        <span class="text-xs font-semibold text-text-secondary uppercase tracking-wider">Record
                            Created</span>
                        <div class="flex items-center gap-2 text-text-main dark:text-white font-medium">
                            <span class="material-symbols-outlined text-primary text-[20px]">schedule</span>
                            {{ $teachersPayment->created_at->format('M d, Y - h:i A') }}
                        </div>
                    </div>

                    <!-- Details (Full width) -->
                    <div class="col-span-1 md:col-span-2 flex flex-col gap-2">
                        <span class="text-xs font-semibold text-text-secondary uppercase tracking-wider">Transaction Details
                            / Notes</span>
                        <div
                            class="bg-background-light dark:bg-background-dark rounded-lg p-4 text-text-main dark:text-gray-300 min-h-[100px] border border-border-light dark:border-border-dark italic">
                            {{ $teachersPayment->payment_details ?: 'No additional details provided for this record.' }}
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div
                    class="p-6 bg-background-light/50 dark:bg-black/20 border-t border-border-light dark:border-border-dark flex items-center justify-between">
                    <a href="{{ route('admin.teachers-payments.index') }}"
                        class="px-6 py-2.5 rounded-lg text-sm font-medium text-text-secondary dark:text-gray-300 hover:text-text-main hover:bg-white dark:hover:bg-white/5 transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined !text-[20px]">arrow_back</span>
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection