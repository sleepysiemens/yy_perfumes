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
<body class="antialiased bg-white">
<div class="">
    <header class="header container flex justify-center items-center mx-auto py-8 text-md">
        <div class="w-1/2 flex justify-end">
            <a href="" class="mr-4">Home</a>
            <a href="" class="mr-4">Shop</a>
            <a href="" class="mr-4">Ravenna</a>
            <a href="" class="">William</a>
        </div>
        <div class="w-fit mx-5 mt-[-10px] flex justify-center items-start">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </div>
        <div class="w-1/2 flex justify-start">
            <a href="" class="mr-4">Gideon</a>
            <a href="" class="mr-4">Aron</a>
            <a href="" class="mr-4">Perfumer</a>
            <a href="" class="">Philosophy</a>
        </div>
    </header>

    <div class="mx-auto">
        <div class="bg-white w-100 mx-auto">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
