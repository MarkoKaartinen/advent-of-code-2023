<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=jetbrains-mono:400,400i,600,700,800" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-nord-0 text-nord-6 font-jetbrains-mono text-xl p-12">

    <header class="pb-8">
        <h1 class="text-5xl font-bold text-nord-8">Advent of Code 2023</h1>
    </header>

    <main>
        {{ $slot }}
    </main>
</body>
</html>
