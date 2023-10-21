<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', __('Home page')) | Yanina Yakusheva Perfumes - Made in France</title>

    <meta name="description" content="@yield('seo-description', 'Основательница бренда – парфюмер Янина Якушева. Основная идея ее бренда - продемонстрировать индивидуальность каждого человека с помощью духов, раскрыть духи не только как предмет личного пользования, но и как художественное творение, способное взаимодействовать с другими объектами, обществом и вами.')"/>
    <meta name="keywords" content="@yield('seo-keywords', 'парфюм, парфюмерия, купить парфюм, yyperfumes')"/>

    <meta name="og:url" content="@yield('og-url', config('app.url'))" />
    <meta name="og:title" content="@yield('og-title', __('Home page') | __('Yanina Yakusheva Perfumes - Made in France'))" />
    <meta name="og:description" content="@yield('og-description')" />
    <meta name="og:type" content="@yield('og-type', 'article')" />
    <meta name="og:image" content="@yield('og-image', asset('images/logo.png'))" />

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}"/>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <!-- TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/64a2dc4faa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/avgrund.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropdown-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/land-style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap" rel="stylesheet">
</head>
<body class="antialiased bg-white">
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

    <div class="mobile-header justify-between items-center px-4 py-4 sm:hidden flex">
        <div class="flex">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="" class="mt-[-5px]">
                <h2 class="font-bold italic text-lg w-2/3">{{ __('Yanina Yakusheva Perfumes') }}</h2>
            </a>
        </div>

        <a href="javascript:openMobileMenu();" class="burger-menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 24 24" fill="none">
                <path d="M4 18H10" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
                <path d="M4 12L16 12" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
                <path d="M4 6L20 6" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </a>
    </div>

    <header class="header container sm:flex justify-center items-center mx-auto py-8 text-md hidden">
        <div class="w-1/2 flex justify-end">
            <a href="/" class="mr-4" rel="nofollow">{{ __('Home') }}</a>
            <a href="{{ route('catalogue.index') }}" class="mr-4">{{ __('Shop') }}</a>
            <a href="{{ route('ravenna.my-universe') }}" class="mr-4">{{ __('Ravenna') }}</a>
            <a href="{{ route('william.my-universe') }}" class="">{{ __('William') }}</a>
        </div>
        <div class="w-fit mx-5 mt-[-10px] flex justify-center items-start">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </div>
        <div class="w-1/2 flex justify-start">
            <a href="{{ route('gideon.my-universe') }}" class="mr-4">{{ __('Gideon') }}</a>
            <a href="{{ route('aron.my-universe') }}" class="mr-4">{{ __('Aron') }}</a>
            <a href="{{ route('perfumer') }}" class="mr-4">{{ __('Perfumer') }}</a>
            <a href="{{ route('philosophy') }}" class="mr-4">{{ __('Philosophy') }}</a>
            <a href="javascript:void(0);" rel="nofollow"
               class="modal-open"
               data-modal="change-language">
                <div class="fixed right-0 mr-20 top-0 mt-0 py-3 px-5 bg-[rgba(0,0,0,.03)] hover:bg-[rgba(0,0,0,.08)] duration-200 z-[9999999] flex flex-row">
                        <img src="{{ \App\Services\Content\FlagService::get(\Illuminate\Support\Facades\App::getLocale()) }}"
                             width="17px" class="mr-2 mt-[-2px]" alt="">
                        {{ \Illuminate\Support\Str::upper((\Illuminate\Support\Facades\App::getLocale())) }}
                </div>
            </a>
        </div>
    </header>

    <div class="mx-auto">
        <div class="bg-white w-100 mx-auto">
            @yield('content')

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

    @include('components.modals')


    <!-- JS -->
    <script src="{{ asset('js/scripts.js') }}"></script>
</div>
</body>
</html>
