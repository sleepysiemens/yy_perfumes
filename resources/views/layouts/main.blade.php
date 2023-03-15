<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', __('Home page')) | Yanina Yakusheva Perfumes - Made in France</title>

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300&family=Montserrat:wght@300;400;500;600;700;800&family=Open+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">

    <!-- TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/64a2dc4faa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- SLICK -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropdown-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
</head>
<body class="antialiased">
<div class="">
    <div class="drop-header bg-white" id="drop-header">
        <div class="inner flex sm:justify-between items-center">
            <img src="{{ asset('images/logo.png') }}" alt="">
            @include('components.header-links')
        </div>
    </div>

    <header class="header container mx-auto">
        <div class="flex items-center justify-center py-8 w-100 mx-auto">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </div>
        @include('components.header-links')
    </header>

    <div class="container bg-white mx-auto" id="app-container">
        <div class="w-100 mx-auto py-5 px-8 container-body">
            @yield('content')
        </div>
    </div>


    <!-- JS -->
    <script src="{{ asset('js/scripts.js') }}"></script>


    @stack('scripts')
</div>
</body>
</html>
