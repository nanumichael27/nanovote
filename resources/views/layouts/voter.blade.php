<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased h-full bg-gray-100">
        <div class="min-h-screen flex sm:justify-center  w-full h-full pt-12 sm:pt-0 bg-gray-100">
            <div class="w-full mx-auto w-11/12 px-6 py-4 sm:rounded-lg bg-gray-100">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
