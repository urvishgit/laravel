<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')
<body>
    <div id="app">
        <header>
            @include('includes.header')
        </header>
        <div class="container-fluid">
            <div class="row">
                @auth
                    <nav class="col-md-2 d-none d-md-block bg-light sidebar">   
                        
                    </nav>
                    <main class="col-md-9 ml-sm-auto col-lg-10 px-4 py-5">
                        @include('includes.alert')
                        @yield('content')
                    </main>
                @else
                    <main class="col-12 px-4 py-5">@yield('content')</main>
                @endauth
            </div>
        </div>
        <footer>
            @include('includes.footer')
        </footer>
    </div>
    @yield('scripts')
</body>
</html>
