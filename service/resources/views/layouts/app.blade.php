<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ secure_asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('/css/app.css') }}">
</head>

<body>
    <header>
        <nav>
            <!-- Navigation links here -->
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Footer content here -->
    </footer>

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>

</html>
