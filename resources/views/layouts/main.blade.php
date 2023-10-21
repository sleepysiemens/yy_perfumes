<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', __('Home page')) | {{ __('Yanina Yakusheva Perfumes - Made in France') }}</title>

    <meta name="description" content="@yield('seo-description', 'Основательница бренда – парфюмер Янина Якушева. Основная идея ее бренда - продемонстрировать индивидуальность каждого человека с помощью духов, раскрыть духи не только как предмет личного пользования, но и как художественное творение, способное взаимодействовать с другими объектами, обществом и вами.')"/>
    <meta name="keywords" content="@yield('seo-keywords', 'парфюм, парфюмерия, купить парфюм, yyperfumes')"/>

    <meta name="og:url" content="@yield('og-url', config('app.url'))" />
    <meta name="og:title" content="@yield('og-title', __('Home page') | __('Yanina Yakusheva Perfumes - Made in France'))" />
    <meta name="og:description" content="@yield('og-description')" />
    <meta name="og:type" content="@yield('og-type', 'article')" />
    <meta name="og:image" content="@yield('og-image', asset('images/logo.png'))" />

    <script src="//code.jivo.ru/widget/fRpVeuWvii" async></script>

    @yield('seo')

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

    @vite('resources/sass/styles.scss')

    <script>
        localStorage.setItem('lang', '{{ \Illuminate\Support\Facades\App::getLocale() }}');
    </script>

    <!-- TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased">
<div class="">
    <div class="mobile-menu-nav">
        <div class="absolute mr-5 mt-5" style="right:0;">
            <a href="javascript:openMobileMenu();">
                <i class="fa fa-times text-2xl"></i>
            </a>
        </div>
        <div class="flex justify-center mb-5 mt-3">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </a>
        </div>
        <ul>
            @include('components.links')
        </ul>
        <p class="mt-5 font-medium">+359879891667</p>
        <p class="mb-3 font-medium">+79054070065</p>
        <p class="my-3 font-medium">2a1@yandex.ru</p>

        <div class="flex items-center mt-5">
            <a class="facebook social-icon mr-5" href="https://www.facebook.com/profile.php?id=100004700704305" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
            <a class="instagram social-icon" href="https://www.instagram.com/yaninayakusheva/" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
        </div>
    </div>

    <div class="drop-header" id="drop-header">
        <div class="inner flex sm:justify-between items-center">
            <a href="/"><img src="{{ asset('images/logo.png') }}" alt=""></a>
            @include('components.header-links')
        </div>
    </div>

    <header class="header container mx-auto">
        <div class="top-menu" style="transform: translateY(100px);position: relative;z-index: 100000;">
            <a href="javascript:openMobileMenu();" class="burger-menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 24 24" fill="none">
                    <path d="M4 18H10" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
                    <path d="M4 12L16 12" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
                    <path d="M4 6L20 6" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </a>
            <div class="flex items-start">
                <ul class="mr-3">
                    <li>
                        <a href="{{ route('login') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4.271 18.3457C4.271 18.3457 6.50002 15.5 12 15.5C17.5 15.5 19.7291 18.3457 19.7291 18.3457" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li class="" style="transform: translateY(-6px);">
                        <a href="{{ route('cart.view') }}">
                        <span class="cart-container">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="40px" height="40px" viewBox="0 0 32 32"><title/>
                                <path d="M22,8H10a1,1,0,0,0-.983.816l-3,16A1,1,0,0,0,7,26H25a1,1,0,0,0,.983-1.184l-3-16A1,1,0,0,0,22,8ZM8.205,24,10.83,10H21.17l2.625,14ZM20,12.5a4,4,0,0,1-8,0,1,1,0,0,1,2,0,2,2,0,0,0,4,0,1,1,0,0,1,2,0Z"/></svg>
                            <span id="cart-count">0</span>
                        </span>
                        </a>
                        <ul class="sub-menu px-5 py-5" style="margin-top: 2px;margin-left: -200px;">
                            <div id="cart-container">
                                <p class="font-semibold">В корзине еще нет товаров</p>
                            </div>
                            <div id="cart-totals"></div>
                            <div class="flex flex-row justify-between mt-3 w-100">
                                <a href="{{ route('cart.view') }}" class="whitespace-nowrap p-3 px-6 bg-slate-100 hover:bg-slate-200 active:scale-95 mr-3 rounded-md duration-200">
                                    {{ __('To cart') }}
                                </a>
                                <a href="{{ route('checkout') }}" class="whitespace-nowrap p-3 px-6 bg-slate-900 hover:bg-slate-700 active:scale-95 text-white rounded-md duration-200">
                                    {{ __('Checkout') }}
                                </a>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex items-center logo-block justify-center py-8 pt-0 w-100 mx-auto relative">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </a>
        </div>
        <div class="bottom-menu">
            @include('components.header-links')
        </div>
    </header>

    <div class="container bg-white mx-auto min-h-[500px]" id="app-container">
        <div class="w-100 mx-auto py-5 px-8 container-body">
            @yield('content')
        </div>


        <footer class="w-100 bg-[#D2CCC3] mt-[250px] relative pb-[100px]">
            <div class="container mx-auto relative block">
                <div class="flex justify-between w-[90%] mx-auto translate-y-[-80px]">
                    <div class="h-[148px] w-[150px]"
                         style="background: url('{{ asset('images/posters/dsc09904-scaled.jpg') }}');
                        background-size: cover;background-position: center center;"></div>
                    <div class="h-[148px] w-[150px] sm:block hidden"
                         style="background: url('{{ asset('images/posters/dsc09915-scaled.jpg') }}');
                        background-size: cover;background-position: center center;"></div>
                    <div class="h-[148px] w-[150px]"
                         style="background: url('{{ asset('images/posters/dsc09961-scaled.jpg') }}');
                        background-size: cover;background-position: center center;"></div>
                    <div class="h-[148px] w-[150px] sm:block hidden"
                         style="background: url('{{ asset('images/posters/dsc_5544.jpg') }}');
                        background-size: cover;background-position: center center;"></div>
                    <div class="h-[148px] w-[150px]"
                         style="background: url('{{ asset('images/posters/img_20201007_075234_213.jpg') }}');
                        background-size: cover;background-position: center center;"></div>
                    <div class="h-[148px] w-[150px] sm:block hidden"
                         style="background: url('{{ asset('images/posters/dsc01890.jpg') }}');
                        background-size: cover;background-position: center center;"></div>
                </div>
                <div class="flex justify-between w-[90%] mx-auto">
                    <div class="flex justify-between sm:flex-row flex-col">
                        <div class="md:w-1/2 w-full mr-5 md:order-1 order-2">
                            <p class="text-2xl mb-3">{{ __('Yanina Yakusheva Perfumes') }}</p>
                            <p class="text-base mt-3 md:w-2/3 w-full">
                                {{ __("Fragrance is a silent and invisible companion. In the era of loneliness and imaginary communication, fantasies become more material.") }}
                            </p>
                            <ul class="social-icons flex items-center mt-4">
                                <li>
                                    <a class="facebook social-icon" href="https://www.facebook.com/profile.php?id=100004700704305" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="ml-4">
                                    <a class="instagram social-icon" href="https://www.instagram.com/yaninayakusheva/" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="flex md:w-2/4 w-full md:order-2 order-1 md:mb-0 mb-12 sm:flex-row flex-col">
                            <div class="sm:w-1/2 w-full flex flex-col">
                                <p class="text-2xl mb-3">{{ __('Information') }}</p>
                                <a href="{{ route('privacy-policy') }}" class="mb-2 hover:underline w-fit">{{ __('Privacy Policy') }}</a>
                                <a href="{{ route('terms') }}" class="mb-2 hover:underline w-fit">{{ __('Terms and conditions') }}</a>
                                <a href="{{ route('contact') }}" class="mb-2 hover:underline w-fit">{{ __('Contacts') }}</a>
                            </div>
                            <div class="sm:w-1/2 w-full flex flex-col sm:mt-0 mt-4">
                                <p class="text-2xl mb-3">{{ __('Our Offers') }}</p>
                                <a href="{{ route('news.index') }}" class="mb-2 hover:underline w-fit">{{ __('News') }}</a>
                                <a href="{{ route('catalogue.index') }}" class="mb-2 hover:underline w-fit">{{ __('Shop') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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
