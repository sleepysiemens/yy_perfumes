<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', __('Home page')) | Yanina Yakusheva Perfumes - Made in France</title>

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}"/>

    <!-- TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/64a2dc4faa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropdown-menu.css') }}">
</head>
<body class="antialiased">
<div class="">
    <header class="header container mx-auto">
        <div class="flex items-center justify-center py-8 w-100 mx-auto">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </div>
        <ul class="menu-nav flex items-center list-none">
            <li>
                <a href="">Home</a>
            </li>
            <li>
                <a href="">Philosophy</a>
            </li>
            <li class="with-sub">
                <a href="">Ravenna</a>

                <ul class="sub-menu">
                    <li>
                        <a href="">My universe</a>
                    </li>
                </ul>
            </li>
            <li class="with-sub">
                <a href="">William</a>

                <ul class="sub-menu">
                    <li>
                        <a href="">My universe</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="">Aron</a>
            </li>
            <li>
                <a href="">Gideon</a>
            </li>
            <li>
                <a href="">Shop</a>
            </li>
            <li>
                <a href="">Perfumer</a>
            </li>
            <li>
                <a href="">Store locator</a>
            </li>
        </ul>
    </header>

    <div class="container mx-auto">
        <div class="bg-white w-100 mx-auto">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
