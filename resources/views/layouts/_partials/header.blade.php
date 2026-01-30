<header
    class="c-header c-header-fixed px-3 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-700 transition-colors duration-300">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
        data-class="c-sidebar-show">
        <i class="fas fa-fw fa-bars"></i>
    </button>

    <a class="c-header-brand d-lg-none" href="#">{{ trans('panel.site_title') }}</a>

    <button class="c-header-toggler mfs-3 d-md-down-none" type="button" responsive="true">
        <i class="fas fa-fw fa-bars"></i>
    </button>


    <ul class="c-header-nav ml-auto">
        @if (count(config('panel.available_languages', [])) > 1)
            <li class="c-header-nav-item dropdown d-md-down-none">
                <a class="c-header-nav-link text-slate-700 dark:text-slate-300" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="true" aria-expanded="false">
                    {{ strtoupper(app()->getLocale()) }}
                </a>
                <div
                    class="dropdown-menu dropdown-menu-right bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700">
                    @foreach (config('panel.available_languages') as $langLocale => $langName)
                        <a class="dropdown-item text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700"
                            href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }}
                            ({{ $langName }})
                        </a>
                    @endforeach
                </div>
            </li>
        @endif
    </ul>

    <div class="flex items-center gap-4 w-full max-w-md mx-4 hidden md:flex">
        <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="material-symbols-outlined text-slate-400 text-[20px]">search</span>
            </div>
            <input
                class="block w-full pl-10 pr-3 py-2 border border-slate-200 dark:border-slate-600 rounded-lg leading-5 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm"
                placeholder="Search students, teachers, records..." type="text" />
        </div>
    </div>

    <div class="flex items-center gap-4">
        <button
            class="relative p-2 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-full transition-colors">
            <span class="material-symbols-outlined">notifications</span>
            <span
                class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white dark:border-slate-900"></span>
        </button>
        <button id="theme-toggle"
            class="p-2 text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 rounded-full transition-colors">
            <span class="material-symbols-outlined">dark_mode</span>
        </button>


    </div>
</header>
