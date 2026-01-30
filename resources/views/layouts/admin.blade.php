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
    </div>


    @include('layouts._partials.footer_scripts')

    @yield('scripts')
</body>

</html>
