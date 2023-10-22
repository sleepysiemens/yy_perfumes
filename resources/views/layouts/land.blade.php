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


    <script src="//code.jivo.ru/widget/fRpVeuWvii" async></script>


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropdown-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/land-style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/64a2dc4faa.js" crossorigin="anonymous"></script>
</head>
<body class="antialiased bg-white">
<div class="">
    @include('components.preheader')

{{--    <div class="mobile-header justify-between items-center px-4 py-4 sm:hidden flex">--}}
{{--        <div class="flex">--}}
{{--            <a href="/" class="flex items-center">--}}
{{--                <img src="{{ asset('images/logo.png') }}" alt="" class="mt-[-5px]">--}}
{{--                <h2 class="font-bold italic text-lg w-2/3">{{ __('Yanina Yakusheva Perfumes') }}</h2>--}}
{{--            </a>--}}
{{--        </div>--}}

{{--        <a href="javascript:openMobileMenu();" class="burger-menu">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 24 24" fill="none">--}}
{{--                <path d="M4 18H10" stroke="#000000" stroke-width="2" stroke-linecap="round"/>--}}
{{--                <path d="M4 12L16 12" stroke="#000000" stroke-width="2" stroke-linecap="round"/>--}}
{{--                <path d="M4 6L20 6" stroke="#000000" stroke-width="2" stroke-linecap="round"/>--}}
{{--            </svg>--}}
{{--        </a>--}}
{{--    </div>--}}



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
