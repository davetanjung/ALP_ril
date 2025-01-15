<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/home.css">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>

    <div class="w-full min-h-screen p-12 flex flex-col justify-center font-['Poppins'] bg-[#F3F4F8]">
        @if ($showNavigation ?? true)
            <x-navigation></x-navigation>
        @endif
        {{ $slot }}
    </div>
    @if ($showFooter ?? true)
        <x-footer></x-footer>
    @endif
</body>
<script src="{{ asset('js/navigation.js') }}"></script>
<script src="{{ asset('js/register.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>
</html>
