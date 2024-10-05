<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    {{-- @include('layouts.navigation') --}}
    @if (Route::has('login'))
        <x-navbar/>
    @endif
    <section class="container px-4 py-4 mx-auto">
        <header>
            @yield('header')
        </header>
        <div class="content">
            <x-messages/>
            @yield('content')
        </div>
        <footer>
        </footer>
    </section>
    <script src="https://cdn.usefathom.com/script.js" data-site="SOXJJCZQ" data-auto="false" defer=""></script>
    <script src={{ asset('js/app.js') }}></script>
</body>
</html>
