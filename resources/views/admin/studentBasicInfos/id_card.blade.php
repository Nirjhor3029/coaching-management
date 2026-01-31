@extends('layouts.admin')

@section('title', 'Student ID Card Print Preview')

@section('styles')
    <style>
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background-color: white !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .print-container {
                padding: 0 !important;
                margin: 0 !important;
                box-shadow: none !important;
            }

            .card-preview {
                box-shadow: none !important;
                border: 1px solid #e2e8f0 !important;
                break-inside: avoid;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }

        .id-card-size {
            width: 338px;
            height: 213px;
        }
    </style>
@endsection

@section('content')
    <main class="layout-container flex flex-col max-w-5xl mx-auto px-4 py-8">
        <!-- Breadcrumbs -->
        <div class="no-print flex flex-wrap gap-2 mb-4">
            <a class="text-primary text-sm font-medium leading-normal" href="#">Management</a>
            <span class="text-slate-400 text-sm font-medium leading-normal">/</span>
            <a class="text-primary text-sm font-medium leading-normal" href="#">Students</a>
            <span class="text-slate-400 text-sm font-medium leading-normal">/</span>
            <span class="text-slate-500 text-sm font-medium leading-normal">ID Card Print Preview</span>
        </div>
        <!-- Page Heading -->
        <div class="no-print flex justify-between gap-3 mb-8">
            <div>
                <h1 class="text-3xl font-black leading-tight tracking-tight text-slate-500 dark:text-slate-200">Student ID
                    Card
                    Print Preview</h1>
                <p class="text-slate-500 dark:text-slate-400 text-base">
                    Review the physical card dimensions and layout
                    before sending to the PVC card printer. Ensure all information matches official records.
                </p>
            </div>

            <div class="flex gap-2">
                {{-- <button id="theme-toggle"
                    class="flex size-10 cursor-pointer items-center justify-center rounded-lg bg-slate-200 dark:bg-slate-800 text-slate-900 dark:text-white hover:text-primary transition-colors">
                    <span class="material-symbols-outlined dark:hidden">dark_mode</span>
                    <span class="material-symbols-outlined hidden dark:block">light_mode</span>
                </button> --}}
                <button
                    class="flex min-w-[84px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal gap-2"
                    onclick="window.print()">
                    <span class="material-symbols-outlined text-sm">print</span>
                    <span class="truncate">Print Card</span>
                </button>
                <button
                    class="flex min-w-[84px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-slate-200 dark:bg-slate-800 text-slate-900 dark:text-white text-sm font-bold leading-normal gap-2">
                    <span class="material-symbols-outlined text-sm">picture_as_pdf</span>
                    <span class="truncate">PDF</span>
                </button>
            </div>
        </div>
        <div
            class="print-container bg-white dark:bg-slate-900 rounded-xl shadow-sm border border-slate-200 dark:border-slate-800 p-8 mb-8">
            <h2 class="text-lg font-bold mb-6 text-slate-800 dark:text-slate-200 flex items-center gap-2">
                <span class="material-symbols-outlined">badge</span>
                PVC Card Dimensions (85.6mm x 53.98mm)
            </h2>
            <!-- Card Grid -->
            <div class="flex flex-col lg:flex-row gap-12 justify-center items-center">
                <!-- Front Side -->
                <div class="flex flex-col items-center gap-4">
                    <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Front Side</span>
                    <div
                        class="id-card-size card-preview bg-white rounded-[12px] shadow-2xl relative overflow-hidden flex flex-col border border-slate-100">
                        <!-- Card Header -->
                        <div class="bg-primary h-12 flex items-center px-4 gap-2">
                            <div class="bg-white p-1 rounded-sm">
                                <svg class="size-5 text-primary" fill="currentColor" viewbox="0 0 48 48">
                                    <path d="M24 4H42V17.3333V30.6667H24V44H6V30.6667V17.3333H24V4Z"></path>
                                </svg>
                            </div>
                            <span class="text-white font-bold text-xs uppercase tracking-tight">Horizon International
                                School</span>
                        </div>
                        <!-- Card Body -->
                        <div class="flex p-4 gap-4 flex-1">
                            <div class="flex flex-col gap-2">
                                <div class="size-24 rounded-lg bg-slate-100 border-2 border-slate-200 overflow-hidden">
                                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuChnpyrsjpapDHdKq577ODVKp4stjdqbmVE3q0K6CTHQhMxFGDhOUc0nRZzmBy95PmJ_BeyVyGmOcjt1Ixd4d709Xs0D6G6spye7JwPGUDnHLYIbw0jGwHEs59UnOLZIC8FZKbupvSjz3cEL258CwsbDV69aZAL5vhqmeAvSUNbjD3IB9yyh0mWTWTrA9xVxpxXNklucSnlEPzBk2ykqGhiEiSeez5_Vg7sSdNL5oUzfk6hX0frCQ0rMx0MySY2C0M-nWN3wlFlrr7O"
                                        alt="Student portrait photo" class="w-full h-full object-cover">
                                </div>
                                <div
                                    class="bg-primary/10 text-primary text-[10px] font-bold py-1 px-2 rounded-full text-center">
                                    STUDENT</div>
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <h3 class="text-primary font-black text-lg leading-tight uppercase">Johnathan Doe</h3>
                                <div class="grid grid-cols-2 gap-x-4 gap-y-1 mt-1">
                                    <div>
                                        <p class="text-[8px] text-slate-400 font-bold uppercase">Roll Number</p>
                                        <p class="text-[11px] font-bold text-slate-700">2023-HIS-045</p>
                                    </div>
                                    <div>
                                        <p class="text-[8px] text-slate-400 font-bold uppercase">Class</p>
                                        <p class="text-[11px] font-bold text-slate-700">10th Grade</p>
                                    </div>
                                    <div>
                                        <p class="text-[8px] text-slate-400 font-bold uppercase">Section</p>
                                        <p class="text-[11px] font-bold text-slate-700">A (Science)</p>
                                    </div>
                                    <div>
                                        <p class="text-[8px] text-slate-400 font-bold uppercase">Validity</p>
                                        <p class="text-[11px] font-bold text-slate-700">2024-25</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-primary/5 h-1 w-full"></div>
                    </div>
                </div>
                <!-- Back Side -->
                <div class="flex flex-col items-center gap-4">
                    <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Back Side</span>
                    <div
                        class="id-card-size card-preview bg-white rounded-[12px] shadow-2xl relative overflow-hidden flex flex-col border border-slate-100">
                        <div class="p-4 flex flex-1">
                            <!-- Details Section -->
                            <div class="flex-1 flex flex-col gap-2">
                                <div>
                                    <p class="text-[8px] text-slate-400 font-bold uppercase mb-0.5">Permanent Address
                                    </p>
                                    <p class="text-[9px] font-medium text-slate-600 leading-tight">123 Education Lane,
                                        Knowledge Park, Academic District, NY 10021</p>
                                </div>

                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <p class="text-[8px] text-slate-400 font-bold uppercase mb-0.5">Student Contact
                                        </p>
                                        <div class="flex flex-col gap-0.5">
                                            <p class="text-[9px] font-bold text-slate-700 flex items-center gap-1">
                                                <span class="material-symbols-outlined text-[10px] text-primary">call</span>
                                                +1 555-0100
                                            </p>
                                            <p class="text-[8px] text-slate-600 flex items-center gap-1">
                                                <span class="material-symbols-outlined text-[10px] text-primary">mail</span>
                                                j.doe@school.edu
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-[8px] text-slate-400 font-bold uppercase mb-0.5">Blood Group</p>
                                        <p class="text-xs font-black text-red-600">O+</p>
                                    </div>
                                </div>

                                <div>
                                    <p class="text-[8px] text-slate-400 font-bold uppercase mb-0.5">Guardian / Emergency
                                        Contact</p>
                                    <div class="bg-slate-50 p-1.5 rounded border border-slate-100">
                                        <p class="text-[9px] font-bold text-slate-700">Jane Doe (Mother)</p>
                                        <p class="text-[9px] text-slate-700 font-medium">+1 555-0199</p>
                                    </div>
                                </div>

                                <div class="mt-auto flex items-end justify-between pt-1">
                                    <div class="flex flex-col items-center gap-1">
                                        <div class="w-24 h-[1px] bg-slate-400"></div>
                                        <p class="text-[7px] font-bold uppercase text-slate-500">Principal Signature</p>
                                    </div>
                                    <div class="text-[7px] text-slate-400 italic text-right max-w-[100px]">
                                        If found, please return to the school administration office.
                                    </div>
                                </div>
                            </div>
                            <!-- Verification Section -->
                            <div
                                class="w-1/4 flex flex-col items-center justify-center gap-2 border-l border-slate-100 pl-4">
                                <div class="size-16 bg-white p-1 border border-slate-200"
                                    data-alt="QR Code for digital student verification">
                                    <img alt="QR Code" class="w-full h-full"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCMWKLQtvfBTLdreszEK3zy509YvWr2gv1NG7Dq_yV9a2uljDgpVQ233RYf1arlT3RK_MrjKnOtoFrMXXFBexmQg9N2KAEeUWDu7RGZfHy81hRieNJM4tXHdQ5QCWWXn_Y6GZFujwX1YiSxp7at0sqADhGlt5ZmS7xt6r76abmfWTJ3MFdyZZhC2liIjhL6qPgn0vOdGCWDWfGzOlDn1aqm5ZflWc6KoVsqIB5EHta4oHHbS3W8ygggVyqv0mJ2J3o4Vf37i2CLRuJD" />
                                </div>
                                <p class="text-[6px] font-bold text-center text-slate-400 uppercase">Scan to Verify</p>
                            </div>
                        </div>
                        <div class="bg-primary h-2 w-full"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Print Instructions -->
        <div class="no-print grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="p-5 bg-primary/5 rounded-xl border border-primary/20">
                <span class="material-symbols-outlined text-primary mb-3">settings_overscan</span>
                <h4 class="font-bold mb-2">Printing Size</h4>
                <p class="text-sm text-slate-600 dark:text-slate-400">Set paper size to CR80 or Custom (85.6mm x 54mm)
                    for direct PVC printing.</p>
            </div>
            <div class="p-5 bg-primary/5 rounded-xl border border-primary/20">
                <span class="material-symbols-outlined text-primary mb-3">palette</span>
                <h4 class="font-bold mb-2">Color Profile</h4>
                <p class="text-sm text-slate-600 dark:text-slate-400">Use CMYK color mode for more accurate
                    representation of the school blue.</p>
            </div>
            <div class="p-5 bg-primary/5 rounded-xl border border-primary/20">
                <span class="material-symbols-outlined text-primary mb-3">high_res</span>
                <h4 class="font-bold mb-2">Resolution</h4>
                <p class="text-sm text-slate-600 dark:text-slate-400">Ensure your printer is set to at least 300 DPI for
                    sharp text and QR codes.</p>
            </div>
        </div>
    </main>
@endsection
