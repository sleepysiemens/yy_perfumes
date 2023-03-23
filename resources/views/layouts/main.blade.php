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

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/64a2dc4faa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- SLICK -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/avgrund.css') }}">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropdown-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">

    <!-- TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
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
        <div class="flex justify-end" style="transform: translateY(100px)">
            <ul class="mr-3">
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" fill="none">
                        <path d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.271 18.3457C4.271 18.3457 6.50002 15.5 12 15.5C17.5 15.5 19.7291 18.3457 19.7291 18.3457" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </li>
            </ul>
            <ul>
                <li class="" style="transform: translateY(-6px);">
                    <a href="">
                        <span class="cart-container">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="40px" height="40px" viewBox="0 0 32 32"><title/>
                                <path d="M22,8H10a1,1,0,0,0-.983.816l-3,16A1,1,0,0,0,7,26H25a1,1,0,0,0,.983-1.184l-3-16A1,1,0,0,0,22,8ZM8.205,24,10.83,10H21.17l2.625,14ZM20,12.5a4,4,0,0,1-8,0,1,1,0,0,1,2,0,2,2,0,0,0,4,0,1,1,0,0,1,2,0Z"/></svg>
                            <span id="cart-count">0</span>
                        </span>
                    </a>
                    <ul class="sub-menu" style="margin-top: 2px;margin-left: -70px;">

                    </ul>
                </li>
            </ul>
        </div>
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
    <script src="{{ asset('js/avgrund.js') }}"></script>

    <script>
        // MODALS OPEN SCRIPT
        $('.modal-open').on('click', function () {
            let modal = $(this).attr('data-modal');
            Avgrund.show("#" + modal);
        });

        function closeDialog() {
            Avgrund.hide();
        }
    </script>

    @stack('scripts')

    <script src="{{ asset('js/cart.js') }}"></script>
</div>
@include('components.modals')

</body>
</html>
