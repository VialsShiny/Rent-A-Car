@props(['title'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(135deg, #5937E0 25%, #ffffff 25%, #ffffff 50%, #5937E0 50%, #5937E0 75%, #ffffff 75%, #ffffff 100%);
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen px-24 py-6 space-y-12">

        <!-- #Main -->
        <main class="w-full">
            {{ $slot }}
        </main>

        <x-footer />
    </div>

    <x-script />
</body>

</html>
