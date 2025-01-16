<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/js/app.js' , 'resources/css/app.css'])
</head>
<body>
<nav class="bg-primary flex flex-row items-center justify-between text-white py-4">
    <p class="text-lg font-bold"> Logo </p>

    <ul class="flex flex-row gap-8">
        <li class="relative py-2 px-4 transition duration-300 cursor-pointer  group">
            Home
            <span class="absolute left-0 -bottom-4 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
        </li>
        <li class="relative py-2 px-4 transition duration-300 cursor-pointer  group">
            Categories
            <span class="absolute left-0 -bottom-4 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
        </li>
        <li class="relative py-2 px-4 transition duration-300 cursor-pointer  group">
            About
            <span class="absolute left-0 -bottom-4 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
        </li>
        <li class="relative py-2 px-4 transition duration-300 cursor-pointer  group">
            Contact Us
            <span class="absolute left-0 -bottom-4 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
        </li>
    </ul>
    <p class="cursor-pointer hover:underline">Signup</p>
</nav>

<main>
    {{ $slot }}
</main>
<footer class="bg-secondary text-white text-center py-4">
    footer
</footer>
</body>
</html>
