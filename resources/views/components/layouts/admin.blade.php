<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>{{ $title ?? 'Page Title' }}</title>
    @livewireStyles
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="selection:bg-primary-green selection:text-white font-sans min-h-screen">
    @if (session('success'))
        <x-layouts.sucess />
    @endif
   <x-layouts.admin.sidebar />

    <main class="p-10 ml-10 lg:ml-56 mx-auto bg-gray-100/75">
       {{ $slot }}
    </main>
    @livewireScripts
</body>
</html>
