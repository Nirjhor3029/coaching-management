@extends('layouts.admin')
@section('content')
<div class="content">
    <!-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> -->
    <!-- Scrollable Content -->
    <main class="flex-1 overflow-y-auto p-4 md:p-8 bg-[#101622]">
        {{-- <div class="mx-auto max-w-7xl flex flex-col gap-8"> --}}
        <div class="mx-auto max-w-none flex flex-col gap-8">
            <!-- Level 1: Hero Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Total Transaction -->
                <div
                    class="flex flex-col justify-between gap-4 rounded-xl p-5 bg-[#1a202c] border border-[#282e39] hover:border-[#3d4655] transition-colors">
                    <div class="flex justify-between items-start">
                        <div class="flex flex-col gap-1">
                            <p class="text-[#9da6b9] text-sm font-medium">Total Transaction</p>
                            <h3 class="text-white text-2xl font-bold">$124,500</h3>
                        </div>
                        <div class="p-2 bg-green-500/10 rounded-lg">
                            <span
                                class="material-symbols-outlined text-green-500 text-xl">account_balance_wallet</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <!-- Sparkline placeholder using CSS gradients -->
                        <div class="h-8 w-full flex items-end gap-1">
                            <div class="w-1/6 bg-green-500/20 rounded-t h-[40%]"></div>
                            <div class="w-1/6 bg-green-500/30 rounded-t h-[60%]"></div>
                            <div class="w-1/6 bg-green-500/40 rounded-t h-[30%]"></div>
                            <div class="w-1/6 bg-green-500/50 rounded-t h-[80%]"></div>
                            <div class="w-1/6 bg-green-500/60 rounded-t h-[50%]"></div>
                            <div class="w-1/6 bg-green-500 rounded-t h-[90%]"></div>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-green-500 text-sm">trending_up</span>
                            <span class="text-green-500 text-xs font-semibold">+12%</span>
                            <span class="text-[#9da6b9] text-xs ml-1">vs last month</span>
                        </div>
                    </div>
                </div>
                <!-- Yearly Earning -->
                <div
                    class="flex flex-col justify-between gap-4 rounded-xl p-5 bg-[#1a202c] border border-[#282e39] hover:border-[#3d4655] transition-colors">
                    <div class="flex justify-between items-start">
                        <div class="flex flex-col gap-1">
                            <p class="text-[#9da6b9] text-sm font-medium">Yearly Earning</p>
                            <h3 class="text-white text-2xl font-bold">$84,000</h3>
                        </div>
                        <div class="p-2 bg-blue-500/10 rounded-lg">
                            <span class="material-symbols-outlined text-blue-500 text-xl">monetization_on</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="w-full bg-[#282e39] rounded-full h-2">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: 80%"></div>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-[#9da6b9] text-xs">Goal Progress</span>
                            <span class="text-blue-500 text-xs font-semibold">80%</span>
                        </div>
                    </div>
                </div>
                <!-- Yearly Cost -->
                <div
                    class="flex flex-col justify-between gap-4 rounded-xl p-5 bg-[#1a202c] border border-[#282e39] hover:border-[#3d4655] transition-colors">
                    <div class="flex justify-between items-start">
                        <div class="flex flex-col gap-1">
                            <p class="text-[#9da6b9] text-sm font-medium">Yearly Cost</p>
                            <h3 class="text-white text-2xl font-bold">$32,000</h3>
                        </div>
                        <div class="p-2 bg-orange-500/10 rounded-lg">
                            <span class="material-symbols-outlined text-orange-500 text-xl">shopping_cart</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="w-full bg-[#282e39] rounded-full h-2">
                            <div class="bg-orange-500 h-2 rounded-full" style="width: 60%"></div>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-[#9da6b9] text-xs">Budget Used</span>
                            <span class="text-orange-500 text-xs font-semibold">60%</span>
                        </div>
                    </div>
                </div>
                <!-- Yearly Profit -->
                <div
                    class="flex flex-col justify-between gap-4 rounded-xl p-5 bg-[#1a202c] border border-[#282e39] hover:border-[#3d4655] transition-colors">
                    <div class="flex justify-between items-start">
                        <div class="flex flex-col gap-1">
                            <p class="text-[#9da6b9] text-sm font-medium">Yearly Profit</p>
                            <h3 class="text-white text-2xl font-bold">$52,000</h3>
                        </div>
                        <div class="p-2 bg-green-500/10 rounded-lg">
                            <span class="material-symbols-outlined text-green-500 text-xl">savings</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 mt-auto">
                        <div class="flex items-center gap-2 mt-2">
                            <span
                                class="px-2 py-0.5 rounded-full bg-green-500/20 text-green-500 text-xs font-medium">Healthy</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-green-500 text-sm">trending_up</span>
                            <span class="text-green-500 text-xs font-semibold">+18% margin</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Level 2: Alert Zone -->
            <div class="flex flex-col gap-4">
                <h3 class="text-white text-lg font-bold leading-tight px-1">Priority Alerts</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Student Due Alert -->
                    <div
                        class="flex items-center gap-4 p-4 rounded-xl bg-red-500/10 border border-red-500/20 relative overflow-hidden group">
                        <div class="absolute inset-y-0 left-0 w-1 bg-red-500"></div>
                        <div class="p-3 bg-red-500/20 rounded-full">
                            <span class="material-symbols-outlined text-red-500">warning</span>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-white font-semibold">Student Due Alert</h4>
                            <p class="text-[#9da6b9] text-sm">5 Students have overdue payments &gt; 30 days.</p>
                        </div>
                        <button
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors">View
                            List</button>
                    </div>
                    <!-- Teacher Payment Pending -->
                    <div
                        class="flex items-center gap-4 p-4 rounded-xl bg-orange-500/10 border border-orange-500/20 relative overflow-hidden group">
                        <div class="absolute inset-y-0 left-0 w-1 bg-orange-500"></div>
                        <div class="p-3 bg-orange-500/20 rounded-full">
                            <span class="material-symbols-outlined text-orange-500">pending_actions</span>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-white font-semibold">Teacher Payment Pending</h4>
                            <p class="text-[#9da6b9] text-sm">3 Teachers pending payment for October.</p>
                        </div>
                        <button
                            class="px-4 py-2 text-sm font-medium text-white bg-orange-600 rounded-lg hover:bg-orange-700 transition-colors">Review</button>
                    </div>
                </div>
            </div>
            <!-- Level 3: Charts & Financial Overview -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column: Revenue Breakdown Chart -->
                <div
                    class="lg:col-span-2 flex flex-col gap-4 bg-[#1a202c] p-6 rounded-xl border border-[#282e39]">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-white text-lg font-bold">Monthly Revenue Breakdown</h3>
                        <select
                            class="bg-[#282e39] border-none text-white text-sm rounded-lg py-1 px-3 focus:ring-0 cursor-pointer">
                            <option>Last 6 Months</option>
                            <option>This Year</option>
                        </select>
                    </div>
                    <!-- Chart Placeholder (CSS Visual Representation) -->
                    <div class="w-full h-64 flex items-end gap-4 pt-8 relative">
                        <!-- Background Grid Lines -->
                        <div class="absolute inset-0 flex flex-col justify-between pointer-events-none pb-8">
                            <div class="w-full h-px bg-[#282e39] border-t border-dashed border-gray-700/50">
                            </div>
                            <div class="w-full h-px bg-[#282e39] border-t border-dashed border-gray-700/50">
                            </div>
                            <div class="w-full h-px bg-[#282e39] border-t border-dashed border-gray-700/50">
                            </div>
                            <div class="w-full h-px bg-[#282e39] border-t border-dashed border-gray-700/50">
                            </div>
                            <div class="w-full h-px bg-[#282e39]"></div>
                        </div>
                        <!-- Bars & Target Line Simulation -->
                        <div class="flex flex-1 items-end justify-between h-full z-10 px-2">
                            <!-- Month Item -->
                            <div class="flex flex-col items-center gap-2 group w-full">
                                <div
                                    class="w-8 bg-blue-600 rounded-t-sm h-[40%] group-hover:bg-blue-500 transition-all relative">
                                    <div
                                        class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                        $12k</div>
                                </div>
                                <span class="text-[#9da6b9] text-xs">Jan</span>
                            </div>
                            <div class="flex flex-col items-center gap-2 group w-full">
                                <div
                                    class="w-8 bg-blue-600 rounded-t-sm h-[55%] group-hover:bg-blue-500 transition-all relative">
                                    <div
                                        class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                        $18k</div>
                                </div>
                                <span class="text-[#9da6b9] text-xs">Feb</span>
                            </div>
                            <div class="flex flex-col items-center gap-2 group w-full">
                                <div
                                    class="w-8 bg-blue-600 rounded-t-sm h-[35%] group-hover:bg-blue-500 transition-all relative">
                                    <div
                                        class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                        $10k</div>
                                </div>
                                <span class="text-[#9da6b9] text-xs">Mar</span>
                            </div>
                            <div class="flex flex-col items-center gap-2 group w-full">
                                <div
                                    class="w-8 bg-blue-600 rounded-t-sm h-[70%] group-hover:bg-blue-500 transition-all relative">
                                    <div
                                        class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                        $24k</div>
                                </div>
                                <span class="text-[#9da6b9] text-xs">Apr</span>
                            </div>
                            <div class="flex flex-col items-center gap-2 group w-full">
                                <div
                                    class="w-8 bg-blue-600 rounded-t-sm h-[60%] group-hover:bg-blue-500 transition-all relative">
                                    <div
                                        class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                        $20k</div>
                                </div>
                                <span class="text-[#9da6b9] text-xs">May</span>
                            </div>
                            <div class="flex flex-col items-center gap-2 group w-full">
                                <div
                                    class="w-8 bg-blue-600 rounded-t-sm h-[85%] group-hover:bg-blue-500 transition-all relative">
                                    <div
                                        class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 whitespace-nowrap">
                                        $28k</div>
                                </div>
                                <span class="text-[#9da6b9] text-xs">Jun</span>
                            </div>
                        </div>
                        <!-- Target Line (Simulated with absolute positioned svg) -->
                        <svg class="absolute inset-0 w-full h-full pointer-events-none pb-8 pl-4 pr-4"
                            preserveaspectratio="none">
                            <path d="M0,180 L80,140 L160,190 L240,100 L320,130 L400,60" fill="none"
                                stroke="#fbbf24" stroke-dasharray="4 4" stroke-width="2"></path>
                        </svg>
                    </div>
                    <div class="flex gap-4 justify-center mt-2">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 bg-blue-600 rounded-sm"></span>
                            <span class="text-[#9da6b9] text-xs">Actual Revenue</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-1 bg-[#fbbf24] border-t border-dashed border-[#fbbf24]"></span>
                            <span class="text-[#9da6b9] text-xs">Target Goal</span>
                        </div>
                    </div>
                </div>
                <!-- Right Column: Financial Overview -->
                <div class="flex flex-col gap-4 bg-[#1a202c] p-6 rounded-xl border border-[#282e39]">
                    <h3 class="text-white text-lg font-bold mb-2">Financial Overview</h3>
                    <!-- Assets Pie Chart -->
                    <div class="flex items-center justify-center py-4 relative">
                        <!-- Simple CSS Conic Gradient Pie Chart -->
                        <div class="size-40 rounded-full"
                            style="background: conic-gradient(#135bec 0% 65%, #10b981 65% 85%, #f59e0b 85% 100%);">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="size-28 rounded-full bg-[#1a202c] flex flex-col items-center justify-center">
                                <span class="text-[#9da6b9] text-xs">Total Assets</span>
                                <span class="text-white font-bold text-lg">$47k</span>
                            </div>
                        </div>
                    </div>
                    <!-- Cash Position List -->
                    <div class="flex flex-col gap-3 mt-2">
                        <div
                            class="flex items-center justify-between p-3 rounded-lg bg-[#282e39]/50 hover:bg-[#282e39] transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="p-2 rounded bg-blue-500/20 text-blue-500">
                                    <span class="material-symbols-outlined text-sm">account_balance</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-white text-sm font-medium">Bank</span>
                                    <span class="text-[#9da6b9] text-xs">City Bank Ltd.</span>
                                </div>
                            </div>
                            <span class="text-white font-bold text-sm">$40,000</span>
                        </div>
                        <div
                            class="flex items-center justify-between p-3 rounded-lg bg-[#282e39]/50 hover:bg-[#282e39] transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="p-2 rounded bg-pink-500/20 text-pink-500">
                                    <span class="material-symbols-outlined text-sm">qr_code_2</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-white text-sm font-medium">bKash</span>
                                    <span class="text-[#9da6b9] text-xs">Merchant Acc</span>
                                </div>
                            </div>
                            <span class="text-white font-bold text-sm">$5,000</span>
                        </div>
                        <div
                            class="flex items-center justify-between p-3 rounded-lg bg-[#282e39]/50 hover:bg-[#282e39] transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="p-2 rounded bg-yellow-500/20 text-yellow-500">
                                    <span class="material-symbols-outlined text-sm">point_of_sale</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-white text-sm font-medium">Office</span>
                                    <span class="text-[#9da6b9] text-xs">Petty Cash</span>
                                </div>
                            </div>
                            <span class="text-white font-bold text-sm">$2,000</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Level 4: Subject-wise Earning Table -->
            <div class="flex flex-col gap-4 bg-[#1a202c] rounded-xl border border-[#282e39] overflow-hidden">
                <div class="flex items-center justify-between p-6 border-b border-[#282e39]">
                    <h3 class="text-white text-lg font-bold">Subject-wise Earnings</h3>
                    <div class="flex gap-2">
                        <button
                            class="flex items-center gap-2 px-3 py-2 bg-[#282e39] hover:bg-[#374151] rounded-lg text-white text-sm transition-colors">
                            <span class="material-symbols-outlined text-sm">filter_list</span>
                            Filter
                        </button>
                        <button
                            class="flex items-center gap-2 px-3 py-2 bg-primary hover:bg-blue-700 rounded-lg text-white text-sm transition-colors">
                            <span class="material-symbols-outlined text-sm">download</span>
                            Export
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#282e39]/50 text-[#9da6b9] text-sm uppercase tracking-wider">
                                <th class="p-4 font-medium border-b border-[#282e39]">Subject Name</th>
                                <th class="p-4 font-medium border-b border-[#282e39]">Teacher</th>
                                <th class="p-4 font-medium border-b border-[#282e39]">Students Count</th>
                                <th class="p-4 font-medium border-b border-[#282e39]">Earning (Oct)</th>
                                <th class="p-4 font-medium border-b border-[#282e39]">Status</th>
                                <th class="p-4 font-medium border-b border-[#282e39] text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-white text-sm divide-y divide-[#282e39]">
                            <tr class="hover:bg-[#282e39]/30 transition-colors group">
                                <td class="p-4 flex items-center gap-3">
                                    <div
                                        class="size-8 rounded-full bg-purple-500/20 flex items-center justify-center text-purple-400 font-bold text-xs">
                                        PH</div>
                                    <span class="font-medium">Physics</span>
                                </td>
                                <td class="p-4 text-[#9da6b9]">Mr. Rahman</td>
                                <td class="p-4">40 Students</td>
                                <td class="p-4 font-medium">$4,000</td>
                                <td class="p-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-500/10 text-green-500">
                                        <span class="size-1.5 rounded-full bg-green-500"></span>
                                        Active
                                    </span>
                                </td>
                                <td class="p-4 text-right">
                                    <button
                                        class="text-[#9da6b9] hover:text-white p-2 hover:bg-[#282e39] rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-base">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-[#282e39]/30 transition-colors group">
                                <td class="p-4 flex items-center gap-3">
                                    <div
                                        class="size-8 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-400 font-bold text-xs">
                                        MA</div>
                                    <span class="font-medium">Mathematics</span>
                                </td>
                                <td class="p-4 text-[#9da6b9]">Mrs. Akter</td>
                                <td class="p-4">55 Students</td>
                                <td class="p-4 font-medium">$5,500</td>
                                <td class="p-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-500/10 text-green-500">
                                        <span class="size-1.5 rounded-full bg-green-500"></span>
                                        Active
                                    </span>
                                </td>
                                <td class="p-4 text-right">
                                    <button
                                        class="text-[#9da6b9] hover:text-white p-2 hover:bg-[#282e39] rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-base">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-[#282e39]/30 transition-colors group">
                                <td class="p-4 flex items-center gap-3">
                                    <div
                                        class="size-8 rounded-full bg-yellow-500/20 flex items-center justify-center text-yellow-400 font-bold text-xs">
                                        CH</div>
                                    <span class="font-medium">Chemistry</span>
                                </td>
                                <td class="p-4 text-[#9da6b9]">Mr. Hasan</td>
                                <td class="p-4">25 Students</td>
                                <td class="p-4 font-medium">$2,800</td>
                                <td class="p-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-500/10 text-yellow-500">
                                        <span class="size-1.5 rounded-full bg-yellow-500"></span>
                                        On Hold
                                    </span>
                                </td>
                                <td class="p-4 text-right">
                                    <button
                                        class="text-[#9da6b9] hover:text-white p-2 hover:bg-[#282e39] rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-base">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-[#282e39]/30 transition-colors group">
                                <td class="p-4 flex items-center gap-3">
                                    <div
                                        class="size-8 rounded-full bg-green-500/20 flex items-center justify-center text-green-400 font-bold text-xs">
                                        BI</div>
                                    <span class="font-medium">Biology</span>
                                </td>
                                <td class="p-4 text-[#9da6b9]">Dr. Karim</td>
                                <td class="p-4">60 Students</td>
                                <td class="p-4 font-medium">$6,200</td>
                                <td class="p-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-500/10 text-green-500">
                                        <span class="size-1.5 rounded-full bg-green-500"></span>
                                        Active
                                    </span>
                                </td>
                                <td class="p-4 text-right">
                                    <button
                                        class="text-[#9da6b9] hover:text-white p-2 hover:bg-[#282e39] rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-base">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
@section('scripts')
@parent

@endsection