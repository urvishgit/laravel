<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.includes.head')
<body>
    <div id="app">
        <header>
            @include('admin.includes.header')
        </header>
        <div class="container-fluid">
            <div class="row">
                @auth
                    <nav class="col-md-3 col-lg-2 d-none d-md-block bg-light sidebar">   
                        @include('admin.includes.admin_menu')
                    </nav>
                    <main class="col-md-9 col-lg-10 ml-sm-auto px-3 py-5">
                        @include('admin.includes.alert')
                        @yield('admin.content')
                    </main>
                @else
                    <main class="col-12 px-4 py-5">@yield('admin.content')</main>
                @endauth
            </div>
        </div>
        <footer>
            @include('admin.includes.footer')
        </footer>
    </div>
    @yield('scripts')
</body>
</html>
