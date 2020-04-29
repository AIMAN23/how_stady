@include('include.head')
    <div id="app">
            @include('include.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
@include('include.end')
