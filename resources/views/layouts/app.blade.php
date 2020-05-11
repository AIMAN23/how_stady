<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('include.head')
    </head>
    <body>
        <div id="app">
                @include('include.nav')
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
    @include('include.end')
</html>
