<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <meta name="theme-color" content="#f7f3e9">
    <title>@yield('title', $siteName ?? 'Tristan James Torres') — {{ $siteTagline ?? 'Artist & Web Designer' }}</title>
    <meta name="description" content="@yield('description', 'The art, ideas, and digital work of Tristan James Torres — artist, student, and web designer from San Pablo City, Laguna.')">

    <script>
        (function () {
            try {
                var savedTheme = localStorage.getItem('tj-theme');
                var systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                document.documentElement.dataset.theme = savedTheme || (systemPrefersDark ? 'dark' : 'light');
            } catch (error) {
                document.documentElement.dataset.theme = 'light';
            }
        }());
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/tj-logo.svg') }}">
</head>
<body id="top">
    <a href="#main" class="skip-link">Skip to content</a>

    @include('partials.header')

    <main id="main">
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
