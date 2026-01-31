<!DOCTYPE html>
<html>

<head>
    @include('layouts._partials.head')
    @yield('styles')
</head>

<body class="c-app">
    @include('partials.menu')


    <div class="c-wrapper bg-slate-50 dark:bg-background-dark transition-colors duration-300">

        @include('layouts._partials.header')

        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    @include('layouts._partials.global_alerts')


                    {{-- all page's content goes here --}}
                    @yield('content')


                </div>
            </main>
            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>

        <!-- Footer Copyright -->
        <div class="mt-12 border-t border-slate-200 py-6 text-center dark:border-slate-800">
            <p class="text-sm text-slate-500 dark:text-slate-400">© {{ date('Y') }} {{ config('app.name') }}. All
                rights reserved.
            </p>
        </div>
    </div>



    {{-- All the layout scripts --}}
    @include('layouts._partials.footer_scripts')



    {{-- Page specific scripts --}}
    @yield('scripts')
</body>

</html>
