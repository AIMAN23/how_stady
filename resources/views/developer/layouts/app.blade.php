<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('include.head')
    </head>
    <body>
        {{-- @include('include.nav') --}}
            <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
            <div id="app">
            <!-- Header -->
                <header id="header">
                    {{-- <a href="index.html" class="">Binary</strong> by TEMPLATED</a> --}}
                    <a class="logo" href="{{ url('/') }}"><strong>  {{ __('lang.namepro') }}  </strong></a>
                    <nav>
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                        </a>
                        @endforeach
                        {{-- <a href="#menu">Menu</a> --}}
                    </nav>
                </header>
    
            <!-- Nav -->
                <nav id="menu">
                    <ul class="links">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="generic.html">Generic</a></li>
                        <li><a href="elements.html">Elements</a></li>
                    </ul>
                </nav>
    
            <!-- Banner -->
                <section id="banner">
                    <div class="inner">
                        <h1>This is Binary, a free and fully responsive<br />
                        website template by <a href="https://templated.co">TEMPLATED</a></h1>
                        <ul class="actions">
                            <li><a href="#one" class="abutton alt scrolly big">Continue</a></li>
                        </ul>
                    </div>
                </section>
    
            <!-- One -->
                <article id="one" class="container">
                    <div class="image">
                        <img src="images/pic14.jpg" alt="" data-position="75% center" />
                    </div>
                    
                    
                           
                        <main class="">
                            @yield('content')
                        </main>
                    
                    
                </article>
    
            <!-- Footer -->
                <br>
                <footer id="footer">
                    <ul class="icons">
                        {{-- <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li> --}}
                    </ul>
                    <div class="copyright">
                        &copy;HowStady: <a href="https://aimanz.herokuapp.com">by Aiman Alyosofi</a>.
                    </div>
                </footer>
    
            <!-- Scripts -->
                <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
                <script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
                <script src="{{ asset('assets/js/skel.min.js') }}"></script>
                <script src="{{ asset('assets/js/util.js') }}"></script>
                <script src="{{ asset('assets/js/main.js') }}"></script>
            </div>
    </body>
    @include('include.end')
</html>
