<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TechFinder</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
        </style>
    @endif
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<header class="w-full items-center gap-2">
<nav class="w-full bg-green-700 py-2 text-white px-4 text-3xl">
    {{config('app.name')}}
</nav>
</header>

<main class="mt-6 px-4">
    <div class="">
@yield('content')
    </div>
</main>

<footer class="py-16 text-center text-sm text-black dark:text-white/70">
</footer>
</body>
</html>
