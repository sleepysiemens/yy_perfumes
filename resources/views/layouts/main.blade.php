<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', __('Home page')) | {{ __('Yanina Yakusheva Perfumes - Made in France') }}</title>

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

    <script>
        localStorage.setItem('lang', '{{ \Illuminate\Support\Facades\App::getLocale() }}');
    </script>

    <!-- TAILWIND CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased">
<div class="">
    <div class="drop-header bg-white" id="drop-header">
        <div class="inner flex sm:justify-between items-center">
            <a href="/"><img src="{{ asset('images/logo.png') }}" alt=""></a>
            @include('components.header-links')
        </div>
    </div>

    <header class="header container mx-auto">
        <div class="flex justify-end" style="transform: translateY(100px);position: relative;z-index: 100000;">
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
                    @if (count(\Illuminate\Support\Facades\Session::get('cart', [])) > 0)
                        <ul class="sub-menu px-5 py-5" style="margin-top: 2px;margin-left: -200px;">
                            <div id="cart-container">
                                <!-- Cart items -->
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
                    @endif
                </li>
            </ul>
        </div>
        <div class="flex items-center justify-center py-8 w-100 mx-auto">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </div>
        @include('components.header-links')
    </header>

    <div class="container bg-white mx-auto min-h-[500px]" id="app-container">
        <div class="w-100 mx-auto py-5 px-8 container-body">
            @yield('content')
        </div>

        <div class="bg-black mx-auto mt-[300px]" id="app-container">
            <div class="w-100 mx-auto flex items-start py-5 px-8 container-body text-white">
                <div class="w-1/3">
                    <a href="" class="text-white" rel="nofollow">Made by
                        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="40" viewBox="0 0 120 14" fill="none" style="margin-top: -13px;">
                            <g clip-path="url(#clip0_2_181)">
                                <path d="M12.56 13V14H13.9562L13.5068 12.6781L12.56 13ZM9.585 13L8.63207 13.3032L8.85378 14H9.585V13ZM8.99 11.13L9.94293 10.8268L9.72122 10.13H8.99V11.13ZM4.57 11.13V10.13H3.83878L3.61707 10.8268L4.57 11.13ZM3.975 13V14H4.70622L4.92793 13.3032L3.975 13ZM1 13L0.0532273 12.6781L-0.39622 14H1V13ZM5.046 1.1V0.0999992H4.32978L4.09923 0.778096L5.046 1.1ZM8.514 1.1L9.46077 0.778097L9.23022 0.0999992H8.514V1.1ZM6.78 4.211L7.73268 3.90703L6.78 0.921186L5.82732 3.90703L6.78 4.211ZM5.386 8.58L4.43332 8.27603L4.01727 9.58H5.386V8.58ZM8.174 8.58V9.58H9.54273L9.12668 8.27603L8.174 8.58ZM12.56 12H9.585V14H12.56V12ZM10.5379 12.6968L9.94293 10.8268L8.03707 11.4332L8.63207 13.3032L10.5379 12.6968ZM8.99 10.13H4.57V12.13H8.99V10.13ZM3.61707 10.8268L3.02207 12.6968L4.92793 13.3032L5.52293 11.4332L3.61707 10.8268ZM3.975 12H1V14H3.975V12ZM1.94677 13.3219L5.99277 1.4219L4.09923 0.778096L0.0532273 12.6781L1.94677 13.3219ZM5.046 2.1H8.514V0.0999992H5.046V2.1ZM7.56723 1.4219L11.6132 13.3219L13.5068 12.6781L9.46077 0.778097L7.56723 1.4219ZM5.82732 3.90703L4.43332 8.27603L6.33868 8.88397L7.73268 4.51497L5.82732 3.90703ZM5.386 9.58H8.174V7.58H5.386V9.58ZM9.12668 8.27603L7.73268 3.90703L5.82732 4.51497L7.22132 8.88397L9.12668 8.27603ZM20.7317 5.197L20.005 5.88404L20.0118 5.89114L20.7317 5.197ZM21.6497 13V14H22.6497V13H21.6497ZM19.0997 13H18.0997V14H19.0997V13ZM18.6917 7.016L19.3988 6.30889L19.3988 6.30889L18.6917 7.016ZM16.4477 7.067L15.7139 6.38759L15.7129 6.38872L16.4477 7.067ZM16.0397 13V14H17.0397V13H16.0397ZM13.4897 13H12.4897V14H13.4897V13ZM13.4897 4.5V3.5H12.4897V4.5H13.4897ZM16.0397 4.5H17.0397V3.5H16.0397V4.5ZM16.0397 5.299H15.0397V8.33905L16.8444 5.89265L16.0397 5.299ZM18.4707 5.262C19.1353 5.262 19.6189 5.4756 20.005 5.88401L21.4583 4.50999C20.6658 3.67173 19.6421 3.262 18.4707 3.262V5.262ZM20.0118 5.89114C20.4042 6.29799 20.6497 6.88801 20.6497 7.781H22.6497C22.6497 6.49799 22.2832 5.36535 21.4515 4.50286L20.0118 5.89114ZM20.6497 7.781V13H22.6497V7.781H20.6497ZM21.6497 12H19.0997V14H21.6497V12ZM20.0997 13V8.155H18.0997V13H20.0997ZM20.0997 8.155C20.0997 7.47688 19.9051 6.81521 19.3988 6.30889L17.9846 7.72311C18.0223 7.76079 18.0997 7.85845 18.0997 8.155H20.0997ZM19.3988 6.30889C18.911 5.82107 18.285 5.608 17.6207 5.608V7.608C17.8404 7.608 17.9284 7.66693 17.9846 7.72311L19.3988 6.30889ZM17.6207 5.608C16.9026 5.608 16.2233 5.83749 15.7139 6.38759L17.1814 7.74641C17.2388 7.68451 17.3414 7.608 17.6207 7.608V5.608ZM15.7129 6.38872C15.2111 6.93235 15.0397 7.64472 15.0397 8.359H17.0397C17.0397 7.93994 17.1403 7.79098 17.1825 7.74528L15.7129 6.38872ZM15.0397 8.359V13H17.0397V8.359H15.0397ZM16.0397 12H13.4897V14H16.0397V12ZM14.4897 13V4.5H12.4897V13H14.4897ZM13.4897 5.5H16.0397V3.5H13.4897V5.5ZM15.0397 4.5V5.299H17.0397V4.5H15.0397ZM16.8444 5.89265C17.1125 5.52927 17.5753 5.262 18.4707 5.262V3.262C17.1447 3.262 15.9869 3.68606 15.235 4.70535L16.8444 5.89265ZM28.3818 4.5H29.3818V3.5H28.3818V4.5ZM28.3818 6.948V7.948H29.3818V6.948H28.3818ZM26.6308 6.948V5.948H25.6308V6.948H26.6308ZM27.0218 10.603L26.6574 11.5342L26.6752 11.5412L26.6933 11.5475L27.0218 10.603ZM28.3818 10.688H29.3818V9.63398L28.3293 9.68938L28.3818 10.688ZM28.3818 13L28.4869 13.9945L29.3818 13.8999V13H28.3818ZM25.0158 12.541L24.3999 13.3288L24.4078 13.335L24.4158 13.341L25.0158 12.541ZM24.0808 6.948H25.0808V5.948H24.0808V6.948ZM22.7208 6.948H21.7208V7.948H22.7208V6.948ZM22.7208 4.5V3.5H21.7208V4.5H22.7208ZM24.0808 4.5V5.5H25.0808V4.5H24.0808ZM24.0808 2.885L23.7935 1.92717L23.0808 2.14097V2.885H24.0808ZM26.6308 2.12H27.6308V0.775968L26.3435 1.16217L26.6308 2.12ZM26.6308 4.5H25.6308V5.5H26.6308V4.5ZM27.3818 4.5V6.948H29.3818V4.5H27.3818ZM28.3818 5.948H26.6308V7.948H28.3818V5.948ZM25.6308 6.948V9.957H27.6308V6.948H25.6308ZM25.6308 9.957C25.6308 10.2493 25.6886 10.5781 25.8731 10.8828C26.0648 11.1996 26.3466 11.4126 26.6574 11.5342L27.3862 9.67176C27.4065 9.67968 27.4413 9.69665 27.4809 9.72879C27.5215 9.7617 27.557 9.80244 27.5841 9.8472C27.6382 9.9366 27.6308 9.99336 27.6308 9.957H25.6308ZM26.6933 11.5475C27.1569 11.7087 27.7871 11.7207 28.4344 11.6866L28.3293 9.68938C28.0299 9.70514 27.7958 9.70521 27.6197 9.6942C27.5324 9.68874 27.4661 9.68096 27.4178 9.67292C27.3683 9.66465 27.3486 9.65789 27.3503 9.6585L26.6933 11.5475ZM27.3818 10.688V13H29.3818V10.688H27.3818ZM28.2768 12.0055C26.6965 12.1725 25.9218 11.9705 25.6158 11.741L24.4158 13.341C25.3792 14.0635 26.8485 14.1675 28.4869 13.9945L28.2768 12.0055ZM25.6317 11.7532C25.3614 11.5418 25.0808 11.0594 25.0808 9.957H23.0808C23.0808 11.3252 23.4236 12.5655 24.3999 13.3288L25.6317 11.7532ZM25.0808 9.957V6.948H23.0808V9.957H25.0808ZM24.0808 5.948H22.7208V7.948H24.0808V5.948ZM23.7208 6.948V4.5H21.7208V6.948H23.7208ZM22.7208 5.5H24.0808V3.5H22.7208V5.5ZM25.0808 4.5V2.885H23.0808V4.5H25.0808ZM24.3682 3.84283L26.9182 3.07783L26.3435 1.16217L23.7935 1.92717L24.3682 3.84283ZM25.6308 2.12V4.5H27.6308V2.12H25.6308ZM26.6308 5.5H28.3818V3.5H26.6308V5.5ZM37.9726 9.77V10.77H38.781L38.9504 9.97953L37.9726 9.77ZM31.9376 9.77V8.77H30.5186L30.9959 10.1063L31.9376 9.77ZM35.6096 10.314L36.1081 9.44709L35.4154 9.0488L34.8741 9.63652L35.6096 10.314ZM37.6496 11.487L38.4655 12.0652L39.1013 11.1682L38.1481 10.6201L37.6496 11.487ZM30.5096 11.963L29.8024 12.6702L29.8119 12.6793L30.5096 11.963ZM30.4926 5.554L29.7808 4.85158L29.7761 4.85638L30.4926 5.554ZM36.8336 5.554L36.1077 6.24174L36.1146 6.24908L36.1217 6.25628L36.8336 5.554ZM31.8866 7.866L30.9233 7.59773L30.5701 8.866H31.8866V7.866ZM35.5416 7.866V8.866H36.8581L36.505 7.59773L35.5416 7.866ZM37.9726 8.77H31.9376V10.77H37.9726V8.77ZM30.9959 10.1063C31.2108 10.7081 31.5978 11.2005 32.1562 11.5263C32.6953 11.8407 33.3246 11.96 33.9776 11.96V9.96C33.5539 9.96 33.3049 9.88092 33.164 9.79872C33.0424 9.7278 32.9478 9.62521 32.8794 9.43366L30.9959 10.1063ZM33.9776 11.96C34.8934 11.96 35.7248 11.665 36.3452 10.9915L34.8741 9.63652C34.7011 9.82434 34.4445 9.96 33.9776 9.96V11.96ZM35.1111 11.1809L37.1511 12.3539L38.1481 10.6201L36.1081 9.44709L35.1111 11.1809ZM36.8337 10.9088C36.2238 11.7693 35.3182 12.238 33.9436 12.238V14.238C35.8557 14.238 37.4207 13.5393 38.4655 12.0652L36.8337 10.9088ZM33.9436 12.238C32.7419 12.238 31.8629 11.8852 31.2074 11.2467L29.8119 12.6793C30.9016 13.7408 32.312 14.238 33.9436 14.238V12.238ZM31.2167 11.2559C30.5692 10.6084 30.2346 9.79872 30.2346 8.75H28.2346C28.2346 10.2853 28.75 11.6176 29.8025 12.6701L31.2167 11.2559ZM30.2346 8.75C30.2346 7.72516 30.5631 6.91501 31.2091 6.25162L29.7761 4.85638C28.7447 5.91566 28.2346 7.23617 28.2346 8.75H30.2346ZM31.2044 6.25641C31.8475 5.60468 32.6699 5.262 33.7566 5.262V3.262C32.1913 3.262 30.8377 3.78065 29.7808 4.85159L31.2044 6.25641ZM33.7566 5.262C34.7301 5.262 35.4891 5.5888 36.1077 6.24174L37.5596 4.86625C36.5461 3.79653 35.2538 3.262 33.7566 3.262V5.262ZM36.1217 6.25628C36.7457 6.88885 37.0746 7.69297 37.0746 8.75H39.0746C39.0746 7.22303 38.5762 5.89648 37.5455 4.85172L36.1217 6.25628ZM37.0746 8.75C37.0746 9.05034 37.0464 9.3195 36.9948 9.56047L38.9504 9.97953C39.0348 9.58584 39.0746 9.175 39.0746 8.75H37.0746ZM31.8866 8.866H35.5416V6.866H31.8866V8.866ZM36.505 7.59773C36.3355 6.98907 36.0189 6.44241 35.5017 6.05694C34.9868 5.67323 34.3721 5.523 33.7396 5.523V7.523C34.0591 7.523 34.2207 7.5966 34.3065 7.66056C34.39 7.72275 34.4984 7.8476 34.5783 8.13427L36.505 7.59773ZM33.7396 5.523C33.0975 5.523 32.4734 5.66968 31.95 6.04905C31.4207 6.43267 31.0949 6.98125 30.9233 7.59773L32.85 8.13427C32.9276 7.85542 33.0353 7.73249 33.1237 7.66845C33.2179 7.60015 33.3957 7.523 33.7396 7.523V5.523ZM42.0709 4.5H43.0709V3.5H42.0709V4.5ZM42.0709 6.013H41.0709L43.0293 6.29848L42.0709 6.013ZM43.0059 4.772L42.4796 3.92168L42.4704 3.92749L43.0059 4.772ZM44.6209 4.33H45.6209V3.33H44.6209V4.33ZM44.6209 7.22L44.4623 8.20733L45.6209 8.39355V7.22H44.6209ZM42.8699 7.543L43.3681 8.41011L43.3749 8.40616L43.3817 8.4021L42.8699 7.543ZM42.0709 13V14H43.0709V13H42.0709ZM39.5209 13H38.5209V14H39.5209V13ZM39.5209 4.5V3.5H38.5209V4.5H39.5209ZM41.0709 4.5V6.013H43.0709V4.5H41.0709ZM43.0293 6.29848C43.1199 5.99449 43.2829 5.78052 43.5415 5.61651L42.4704 3.92749C41.7997 4.35282 41.3393 4.96618 41.1126 5.72752L43.0293 6.29848ZM43.5323 5.62226C43.8386 5.43266 44.1921 5.33 44.6209 5.33V3.33C43.8484 3.33 43.1253 3.52201 42.4796 3.92173L43.5323 5.62226ZM43.6209 4.33V7.22H45.6209V4.33H43.6209ZM44.7796 6.23267C43.9226 6.09493 43.1002 6.24179 42.3581 6.6839L43.3817 8.4021C43.705 8.20955 44.05 8.14107 44.4623 8.20733L44.7796 6.23267ZM42.3718 6.67589C41.4465 7.20746 41.0709 8.13541 41.0709 9.158H43.0709C43.0709 8.63925 43.228 8.49054 43.3681 8.41011L42.3718 6.67589ZM41.0709 9.158V13H43.0709V9.158H41.0709ZM42.0709 12H39.5209V14H42.0709V12ZM40.5209 13V4.5H38.5209V13H40.5209ZM39.5209 5.5H42.0709V3.5H39.5209V5.5ZM52.8399 11.946L53.547 12.6531L53.547 12.6531L52.8399 11.946ZM46.4479 11.946L45.7408 12.6531L45.7408 12.6531L46.4479 11.946ZM52.8399 5.571L52.1328 6.27811L52.8399 5.571ZM48.2499 10.195L48.957 9.48789L48.957 9.48789L48.2499 10.195ZM51.0379 10.195L50.3308 9.48789L50.3308 9.48789L51.0379 10.195ZM51.0379 7.305L50.3308 8.01211L50.3308 8.01211L51.0379 7.305ZM48.2499 7.305L48.957 8.01211L48.957 8.01211L48.2499 7.305ZM52.1328 11.2389C51.4676 11.9041 50.6605 12.238 49.6439 12.238V14.238C51.166 14.238 52.4895 13.7106 53.547 12.6531L52.1328 11.2389ZM49.6439 12.238C48.6274 12.238 47.8202 11.9041 47.155 11.2389L45.7408 12.6531C46.7983 13.7106 48.1218 14.238 49.6439 14.238V12.238ZM47.155 11.2389C46.4739 10.5578 46.1389 9.74853 46.1389 8.75H44.1389C44.1389 10.2675 44.6766 11.5889 45.7408 12.6531L47.155 11.2389ZM46.1389 8.75C46.1389 7.76552 46.472 6.96111 47.155 6.27811L45.7408 4.86389C44.6785 5.92623 44.1389 7.24114 44.1389 8.75H46.1389ZM47.155 6.27811C47.8361 5.597 48.6454 5.262 49.6439 5.262V3.262C48.1264 3.262 46.805 3.79966 45.7408 4.86389L47.155 6.27811ZM49.6439 5.262C50.6424 5.262 51.4517 5.597 52.1328 6.27811L53.547 4.86389C52.4828 3.79966 51.1614 3.262 49.6439 3.262V5.262ZM52.1328 6.27811C52.8158 6.96111 53.1489 7.76552 53.1489 8.75H55.1489C55.1489 7.24114 54.6093 5.92623 53.547 4.86389L52.1328 6.27811ZM53.1489 8.75C53.1489 9.74853 52.8139 10.5578 52.1328 11.2389L53.547 12.6531C54.6112 11.5889 55.1489 10.2675 55.1489 8.75H53.1489ZM46.6889 8.75C46.6889 9.57139 46.959 10.3184 47.5428 10.9021L48.957 9.48789C48.7928 9.32364 48.6889 9.10728 48.6889 8.75H46.6889ZM47.5428 10.9021C48.1145 11.4738 48.8381 11.756 49.6439 11.756V9.756C49.339 9.756 49.1333 9.66418 48.957 9.48789L47.5428 10.9021ZM49.6439 11.756C50.4497 11.756 51.1733 11.4738 51.745 10.9021L50.3308 9.48789C50.1545 9.66418 49.9488 9.756 49.6439 9.756V11.756ZM51.745 10.9021C52.3288 10.3184 52.5989 9.57139 52.5989 8.75H50.5989C50.5989 9.10728 50.495 9.32364 50.3308 9.48789L51.745 10.9021ZM52.5989 8.75C52.5989 7.92861 52.3288 7.18164 51.745 6.59789L50.3308 8.01211C50.495 8.17635 50.5989 8.39272 50.5989 8.75H52.5989ZM51.745 6.59789C51.1733 6.02618 50.4497 5.744 49.6439 5.744V7.744C49.9488 7.744 50.1545 7.83582 50.3308 8.01211L51.745 6.59789ZM49.6439 5.744C48.8381 5.744 48.1145 6.02618 47.5428 6.59789L48.957 8.01211C49.1333 7.83582 49.339 7.744 49.6439 7.744V5.744ZM47.5428 6.59789C46.959 7.18164 46.6889 7.92861 46.6889 8.75H48.6889C48.6889 8.39272 48.7928 8.17635 48.957 8.01211L47.5428 6.59789ZM71.7073 5.231L70.9749 5.91197L70.9806 5.91801L71.7073 5.231ZM72.5913 13V14H73.5913V13H72.5913ZM70.0413 13H69.0413V14H70.0413V13ZM69.7183 6.982L68.9443 7.61524L68.96 7.63448L68.9767 7.65291L69.7183 6.982ZM67.8313 7.033L67.0655 6.38981L67.0579 6.39897L67.0504 6.4083L67.8313 7.033ZM67.4912 13V14H68.4912V13H67.4912ZM64.9413 13H63.9413V14H64.9413V13ZM64.6183 6.982L63.8443 7.61524L63.86 7.63448L63.8767 7.65291L64.6183 6.982ZM62.7313 7.033L61.9655 6.38981L61.9579 6.39897L61.9504 6.4083L62.7313 7.033ZM62.3913 13V14H63.3913V13H62.3913ZM59.8413 13H58.8413V14H59.8413V13ZM59.8413 4.5V3.5H58.8413V4.5H59.8413ZM62.3913 4.5H63.3913V3.5H62.3913V4.5ZM62.3913 5.282H61.3913V8.51786L63.2169 5.84619L62.3913 5.282ZM66.8963 5.384L66.0642 5.9387L66.8779 7.15923L67.7166 5.95579L66.8963 5.384ZM69.3613 5.262C70.0752 5.262 70.582 5.48938 70.9749 5.91194L72.4396 4.55006C71.6312 3.68062 70.5739 3.262 69.3613 3.262V5.262ZM70.9806 5.91801C71.3526 6.31144 71.5913 6.89167 71.5913 7.781H73.5913C73.5913 6.51699 73.2406 5.39723 72.4339 4.54399L70.9806 5.91801ZM71.5913 7.781V13H73.5913V7.781H71.5913ZM72.5913 12H70.0413V14H72.5913V12ZM71.0413 13V8.002H69.0413V13H71.0413ZM71.0413 8.002C71.0413 7.40613 70.8953 6.79246 70.4598 6.31109L68.9767 7.65291C68.9779 7.65423 68.9918 7.66886 69.0072 7.71739C69.0237 7.76964 69.0413 7.85995 69.0413 8.002H71.0413ZM70.4922 6.34876C70.0548 5.81417 69.4377 5.608 68.8173 5.608V7.608C68.9122 7.608 68.9515 7.62298 68.9566 7.62509C68.959 7.62608 68.9564 7.62521 68.9515 7.62161C68.9466 7.61799 68.9441 7.61503 68.9443 7.61524L70.4922 6.34876ZM68.8173 5.608C68.1466 5.608 67.5202 5.84853 67.0655 6.38981L68.597 7.67619C68.6183 7.6508 68.6492 7.608 68.8173 7.608V5.608ZM67.0504 6.4083C66.637 6.92508 66.4912 7.56443 66.4912 8.206H68.4912C68.4912 7.85024 68.5722 7.70759 68.6121 7.6577L67.0504 6.4083ZM66.4912 8.206V13H68.4912V8.206H66.4912ZM67.4912 12H64.9413V14H67.4912V12ZM65.9413 13V8.002H63.9413V13H65.9413ZM65.9413 8.002C65.9413 7.40613 65.7953 6.79246 65.3598 6.31109L63.8767 7.65291C63.8779 7.65423 63.8918 7.66886 63.9072 7.71739C63.9237 7.76964 63.9413 7.85995 63.9413 8.002H65.9413ZM65.3922 6.34876C64.9548 5.81417 64.3377 5.608 63.7173 5.608V7.608C63.8122 7.608 63.8515 7.62298 63.8566 7.62509C63.859 7.62608 63.8564 7.62521 63.8515 7.62161C63.8466 7.61799 63.8441 7.61503 63.8443 7.61524L65.3922 6.34876ZM63.7173 5.608C63.0466 5.608 62.4202 5.84853 61.9655 6.38981L63.497 7.67619C63.5183 7.6508 63.5492 7.608 63.7173 7.608V5.608ZM61.9504 6.4083C61.537 6.92508 61.3913 7.56443 61.3913 8.206H63.3913C63.3913 7.85024 63.4722 7.70759 63.5121 7.65769L61.9504 6.4083ZM61.3913 8.206V13H63.3913V8.206H61.3913ZM62.3913 12H59.8413V14H62.3913V12ZM60.8413 13V4.5H58.8413V13H60.8413ZM59.8413 5.5H62.3913V3.5H59.8413V5.5ZM61.3913 4.5V5.282H63.3913V4.5H61.3913ZM63.2169 5.84619C63.4436 5.51443 63.8421 5.262 64.6693 5.262V3.262C63.3884 3.262 62.2682 3.68957 61.5656 4.71781L63.2169 5.84619ZM64.6693 5.262C65.3591 5.262 65.7712 5.49926 66.0642 5.9387L67.7283 4.8293C67.0239 3.77274 65.9514 3.262 64.6693 3.262V5.262ZM67.7166 5.95579C68.007 5.53914 68.4811 5.262 69.3613 5.262V3.262C67.9974 3.262 66.8281 3.73286 66.0759 4.81221L67.7166 5.95579ZM81.6104 11.946L82.3175 12.6531L82.3175 12.6531L81.6104 11.946ZM75.2184 11.946L74.5113 12.6531L74.5113 12.6531L75.2184 11.946ZM81.6104 5.571L80.9033 6.27811L81.6104 5.571ZM77.0204 10.195L77.7275 9.48789L77.7275 9.48789L77.0204 10.195ZM79.8084 10.195L79.1013 9.48789L79.1013 9.48789L79.8084 10.195ZM79.8084 7.305L79.1013 8.01211L79.1013 8.01211L79.8084 7.305ZM77.0204 7.305L77.7275 8.01211L77.7275 8.01211L77.0204 7.305ZM80.9033 11.2389C80.2381 11.9041 79.431 12.238 78.4144 12.238V14.238C79.9365 14.238 81.26 13.7106 82.3175 12.6531L80.9033 11.2389ZM78.4144 12.238C77.3979 12.238 76.5907 11.9041 75.9255 11.2389L74.5113 12.6531C75.5688 13.7106 76.8923 14.238 78.4144 14.238V12.238ZM75.9255 11.2389C75.2444 10.5578 74.9094 9.74853 74.9094 8.75H72.9094C72.9094 10.2675 73.4471 11.5889 74.5113 12.6531L75.9255 11.2389ZM74.9094 8.75C74.9094 7.76552 75.2425 6.96111 75.9255 6.27811L74.5113 4.86389C73.449 5.92623 72.9094 7.24114 72.9094 8.75H74.9094ZM75.9255 6.27811C76.6066 5.597 77.4159 5.262 78.4144 5.262V3.262C76.8969 3.262 75.5755 3.79966 74.5113 4.86389L75.9255 6.27811ZM78.4144 5.262C79.4129 5.262 80.2222 5.597 80.9033 6.27811L82.3175 4.86389C81.2533 3.79966 79.9319 3.262 78.4144 3.262V5.262ZM80.9033 6.27811C81.5863 6.96111 81.9194 7.76552 81.9194 8.75H83.9194C83.9194 7.24114 83.3799 5.92623 82.3175 4.86389L80.9033 6.27811ZM81.9194 8.75C81.9194 9.74853 81.5844 10.5578 80.9033 11.2389L82.3175 12.6531C83.3818 11.5889 83.9194 10.2675 83.9194 8.75H81.9194ZM75.4594 8.75C75.4594 9.57139 75.7296 10.3184 76.3133 10.9021L77.7275 9.48789C77.5633 9.32364 77.4594 9.10728 77.4594 8.75H75.4594ZM76.3133 10.9021C76.885 11.4738 77.6086 11.756 78.4144 11.756V9.756C78.1096 9.756 77.9038 9.66418 77.7275 9.48789L76.3133 10.9021ZM78.4144 11.756C79.2202 11.756 79.9438 11.4738 80.5155 10.9021L79.1013 9.48789C78.925 9.66418 78.7193 9.756 78.4144 9.756V11.756ZM80.5155 10.9021C81.0993 10.3184 81.3694 9.57139 81.3694 8.75H79.3694C79.3694 9.10728 79.2656 9.32364 79.1013 9.48789L80.5155 10.9021ZM81.3694 8.75C81.3694 7.92861 81.0993 7.18164 80.5155 6.59789L79.1013 8.01211C79.2656 8.17635 79.3694 8.39272 79.3694 8.75H81.3694ZM80.5155 6.59789C79.9438 6.02618 79.2202 5.744 78.4144 5.744V7.744C78.7193 7.744 78.925 7.83582 79.1013 8.01211L80.5155 6.59789ZM78.4144 5.744C77.6086 5.744 76.885 6.02618 76.3133 6.59789L77.7275 8.01211C77.9038 7.83582 78.1096 7.744 78.4144 7.744V5.744ZM76.3133 6.59789C75.7296 7.18164 75.4594 7.92861 75.4594 8.75H77.4594C77.4594 8.39272 77.5633 8.17635 77.7275 8.01211L76.3133 6.59789ZM90.5328 5.299L89.7717 5.94773L91.5328 8.01354V5.299H90.5328ZM90.5328 1.1V0.0999992H89.5328V1.1H90.5328ZM93.0828 1.1H94.0828V0.0999992H93.0828V1.1ZM93.0828 13V14H94.0828V13H93.0828ZM90.5328 13H89.5328V14H90.5328V13ZM90.5328 12.201H91.5328V9.48646L89.7717 11.5523L90.5328 12.201ZM85.1268 11.946L84.3912 12.6235L84.3912 12.6235L85.1268 11.946ZM85.1268 5.571L84.3916 4.89312L84.3912 4.89352L85.1268 5.571ZM87.0478 10.263L87.7549 9.55589L87.7549 9.55589L87.0478 10.263ZM89.9718 10.263L89.2647 9.55589L89.2647 9.55589L89.9718 10.263ZM87.0478 7.237L87.7549 7.94411L87.7549 7.94411L87.0478 7.237ZM91.5328 5.299V1.1H89.5328V5.299H91.5328ZM90.5328 2.1H93.0828V0.0999992H90.5328V2.1ZM92.0828 1.1V13H94.0828V1.1H92.0828ZM93.0828 12H90.5328V14H93.0828V12ZM91.5328 13V12.201H89.5328V13H91.5328ZM89.7717 11.5523C89.4122 11.9741 88.8737 12.238 87.9998 12.238V14.238C89.3245 14.238 90.4747 13.8106 91.2938 12.8497L89.7717 11.5523ZM87.9998 12.238C87.1707 12.238 86.4756 11.9344 85.8623 11.2685L84.3912 12.6235C85.3645 13.6802 86.5848 14.238 87.9998 14.238V12.238ZM85.8623 11.2685C85.254 10.608 84.9368 9.79128 84.9368 8.75H82.9368C82.9368 10.2474 83.4129 11.5613 84.3912 12.6235L85.8623 11.2685ZM84.9368 8.75C84.9368 7.72265 85.2523 6.91073 85.8623 6.24848L84.3912 4.89352C83.4145 5.95394 82.9368 7.26135 82.9368 8.75H84.9368ZM85.8619 6.24888C86.4919 5.5657 87.1892 5.262 87.9998 5.262V3.262C86.589 3.262 85.371 3.83097 84.3916 4.89312L85.8619 6.24888ZM87.9998 5.262C88.8737 5.262 89.4122 5.52595 89.7717 5.94773L91.2938 4.65027C90.4747 3.68938 89.3245 3.262 87.9998 3.262V5.262ZM85.4868 8.75C85.4868 9.59313 85.7425 10.3719 86.3407 10.9701L87.7549 9.55589C87.605 9.40607 87.4868 9.17621 87.4868 8.75H85.4868ZM86.3407 10.9701C86.9282 11.5576 87.683 11.824 88.5098 11.824V9.824C88.1351 9.824 87.9153 9.71637 87.7549 9.55589L86.3407 10.9701ZM88.5098 11.824C89.3365 11.824 90.0913 11.5576 90.6789 10.9701L89.2647 9.55589C89.1042 9.71637 88.8844 9.824 88.5098 9.824V11.824ZM90.6789 10.9701C91.277 10.3719 91.5328 9.59313 91.5328 8.75H89.5328C89.5328 9.17621 89.4145 9.40608 89.2647 9.55589L90.6789 10.9701ZM91.5328 8.75C91.5328 7.90687 91.277 7.12807 90.6789 6.52989L89.2647 7.94411C89.4145 8.09392 89.5328 8.32379 89.5328 8.75H91.5328ZM90.6789 6.52989C90.0913 5.94237 89.3365 5.676 88.5098 5.676V7.676C88.8844 7.676 89.1042 7.78363 89.2647 7.94411L90.6789 6.52989ZM88.5098 5.676C87.683 5.676 86.9282 5.94237 86.3407 6.52989L87.7549 7.94411C87.9153 7.78363 88.1351 7.676 88.5098 7.676V5.676ZM86.3407 6.52989C85.7425 7.12807 85.4868 7.90687 85.4868 8.75H87.4868C87.4868 8.32379 87.605 8.09392 87.7549 7.94411L86.3407 6.52989ZM103.267 9.77V10.77H104.075L104.244 9.97953L103.267 9.77ZM97.2316 9.77V8.77H95.8125L96.2898 10.1063L97.2316 9.77ZM100.904 10.314L101.402 9.44709L100.709 9.0488L100.168 9.63652L100.904 10.314ZM102.944 11.487L103.759 12.0652L104.395 11.1682L103.442 10.6201L102.944 11.487ZM95.8036 11.963L95.0964 12.6702L95.1058 12.6793L95.8036 11.963ZM95.7866 5.554L95.0748 4.85158L95.0701 4.85638L95.7866 5.554ZM102.128 5.554L101.402 6.24174L101.409 6.24908L101.416 6.25628L102.128 5.554ZM97.1806 7.866L96.2172 7.59773L95.864 8.866H97.1806V7.866ZM100.836 7.866V8.866H102.152L101.799 7.59773L100.836 7.866ZM103.267 8.77H97.2316V10.77H103.267V8.77ZM96.2898 10.1063C96.5047 10.7081 96.8918 11.2005 97.4502 11.5263C97.9893 11.8407 98.6186 11.96 99.2716 11.96V9.96C98.8478 9.96 98.5988 9.88092 98.4579 9.79872C98.3364 9.7278 98.2417 9.62521 98.1733 9.43366L96.2898 10.1063ZM99.2716 11.96C100.187 11.96 101.019 11.665 101.639 10.9915L100.168 9.63652C99.995 9.82434 99.7385 9.96 99.2716 9.96V11.96ZM100.405 11.1809L102.445 12.3539L103.442 10.6201L101.402 9.44709L100.405 11.1809ZM102.128 10.9088C101.518 11.7693 100.612 12.238 99.2376 12.238V14.238C101.15 14.238 102.715 13.5393 103.759 12.0652L102.128 10.9088ZM99.2376 12.238C98.0358 12.238 97.1569 11.8852 96.5013 11.2467L95.1058 12.6793C96.1956 13.7408 97.6059 14.238 99.2376 14.238V12.238ZM96.5107 11.2559C95.8632 10.6084 95.5286 9.79872 95.5286 8.75H93.5286C93.5286 10.2853 94.0439 11.6176 95.0964 12.6701L96.5107 11.2559ZM95.5286 8.75C95.5286 7.72516 95.8571 6.91501 96.503 6.25162L95.0701 4.85638C94.0387 5.91566 93.5286 7.23617 93.5286 8.75H95.5286ZM96.4983 6.25641C97.1415 5.60468 97.9638 5.262 99.0506 5.262V3.262C97.4853 3.262 96.1316 3.78065 95.0748 4.85159L96.4983 6.25641ZM99.0506 5.262C100.024 5.262 100.783 5.5888 101.402 6.24174L102.854 4.86625C101.84 3.79653 100.548 3.262 99.0506 3.262V5.262ZM101.416 6.25628C102.04 6.88885 102.369 7.69297 102.369 8.75H104.369C104.369 7.22303 103.87 5.89648 102.839 4.85172L101.416 6.25628ZM102.369 8.75C102.369 9.05034 102.34 9.3195 102.289 9.56047L104.244 9.97953C104.329 9.58584 104.369 9.175 104.369 8.75H102.369ZM97.1806 8.866H100.836V6.866H97.1806V8.866ZM101.799 7.59773C101.629 6.98907 101.313 6.44241 100.796 6.05694C100.281 5.67323 99.6661 5.523 99.0336 5.523V7.523C99.353 7.523 99.5147 7.5966 99.6005 7.66056C99.6839 7.72275 99.7924 7.8476 99.8722 8.13427L101.799 7.59773ZM99.0336 5.523C98.3914 5.523 97.7674 5.66968 97.244 6.04905C96.7147 6.43267 96.3889 6.98125 96.2172 7.59773L98.1439 8.13427C98.2216 7.85542 98.3293 7.73249 98.4177 7.66845C98.5119 7.60015 98.6897 7.523 99.0336 7.523V5.523ZM107.365 4.5H108.365V3.5H107.365V4.5ZM107.365 6.013H106.365L108.323 6.29848L107.365 6.013ZM108.3 4.772L107.773 3.92168L107.764 3.92749L108.3 4.772ZM109.915 4.33H110.915V3.33H109.915V4.33ZM109.915 7.22L109.756 8.20733L110.915 8.39355V7.22H109.915ZM108.164 7.543L108.662 8.41011L108.669 8.40616L108.676 8.4021L108.164 7.543ZM107.365 13V14H108.365V13H107.365ZM104.815 13H103.815V14H104.815V13ZM104.815 4.5V3.5H103.815V4.5H104.815ZM106.365 4.5V6.013H108.365V4.5H106.365ZM108.323 6.29848C108.414 5.99449 108.577 5.78052 108.835 5.61651L107.764 3.92749C107.094 4.35282 106.633 4.96618 106.406 5.72752L108.323 6.29848ZM108.826 5.62226C109.133 5.43266 109.486 5.33 109.915 5.33V3.33C109.142 3.33 108.419 3.52201 107.774 3.92173L108.826 5.62226ZM108.915 4.33V7.22H110.915V4.33H108.915ZM110.074 6.23267C109.217 6.09493 108.394 6.24179 107.652 6.6839L108.676 8.4021C108.999 8.20955 109.344 8.14107 109.756 8.20733L110.074 6.23267ZM107.666 6.67589C106.74 7.20746 106.365 8.13541 106.365 9.158H108.365C108.365 8.63925 108.522 8.49054 108.662 8.41011L107.666 6.67589ZM106.365 9.158V13H108.365V9.158H106.365ZM107.365 12H104.815V14H107.365V12ZM105.815 13V4.5H103.815V13H105.815ZM104.815 5.5H107.365V3.5H104.815V5.5ZM118.349 5.197L117.622 5.88404L117.629 5.89114L118.349 5.197ZM119.267 13V14H120.267V13H119.267ZM116.717 13H115.717V14H116.717V13ZM116.309 7.016L117.016 6.30889L117.016 6.30889L116.309 7.016ZM114.065 7.067L113.331 6.38759L113.33 6.38872L114.065 7.067ZM113.657 13V14H114.657V13H113.657ZM111.107 13H110.107V14H111.107V13ZM111.107 4.5V3.5H110.107V4.5H111.107ZM113.657 4.5H114.657V3.5H113.657V4.5ZM113.657 5.299H112.657V8.33905L114.462 5.89265L113.657 5.299ZM116.088 5.262C116.752 5.262 117.236 5.4756 117.622 5.88401L119.076 4.50999C118.283 3.67173 117.259 3.262 116.088 3.262V5.262ZM117.629 5.89114C118.021 6.29799 118.267 6.88801 118.267 7.781H120.267C120.267 6.49799 119.9 5.36535 119.069 4.50286L117.629 5.89114ZM118.267 7.781V13H120.267V7.781H118.267ZM119.267 12H116.717V14H119.267V12ZM117.717 13V8.155H115.717V13H117.717ZM117.717 8.155C117.717 7.47688 117.522 6.81521 117.016 6.30889L115.602 7.72311C115.639 7.76079 115.717 7.85845 115.717 8.155H117.717ZM117.016 6.30889C116.528 5.82107 115.902 5.608 115.238 5.608V7.608C115.458 7.608 115.546 7.66693 115.602 7.72311L117.016 6.30889ZM115.238 5.608C114.52 5.608 113.84 5.83749 113.331 6.38759L114.799 7.74641C114.856 7.68451 114.959 7.608 115.238 7.608V5.608ZM113.33 6.38872C112.828 6.93235 112.657 7.64472 112.657 8.359H114.657C114.657 7.93994 114.757 7.79098 114.8 7.74528L113.33 6.38872ZM112.657 8.359V13H114.657V8.359H112.657ZM113.657 12H111.107V14H113.657V12ZM112.107 13V4.5H110.107V13H112.107ZM111.107 5.5H113.657V3.5H111.107V5.5ZM112.657 4.5V5.299H114.657V4.5H112.657ZM114.462 5.89265C114.73 5.52927 115.192 5.262 116.088 5.262V3.262C114.762 3.262 113.604 3.68606 112.852 4.70535L114.462 5.89265Z" fill="url(#paint0_linear_2_181)"/>
                                <path d="M13.56 12H10.585L9.99 10.13H5.57L4.975 12H2L6.046 0.0999992H9.514L13.56 12ZM7.78 3.211L6.386 7.58H9.174L7.78 3.211ZM19.4707 3.262C20.3887 3.262 21.1424 3.57367 21.7317 4.197C22.3437 4.83167 22.6497 5.693 22.6497 6.781V12H20.0997V7.155C20.0997 6.66767 19.9637 6.288 19.6917 6.016C19.4197 5.744 19.0627 5.608 18.6207 5.608C18.122 5.608 17.731 5.761 17.4477 6.067C17.1757 6.36167 17.0397 6.79233 17.0397 7.359V12H14.4897V3.5H17.0397V4.299C17.5497 3.60767 18.36 3.262 19.4707 3.262ZM29.3818 3.5V5.948H27.6308V8.957C27.6308 9.28567 27.7612 9.501 28.0218 9.603C28.2825 9.69367 28.7358 9.722 29.3818 9.688V12C27.7725 12.17 26.6505 12.017 26.0158 11.541C25.3925 11.0537 25.0808 10.1923 25.0808 8.957V5.948H23.7208V3.5H25.0808V1.885L27.6308 1.12V3.5H29.3818ZM38.9726 8.77H32.9376C33.2209 9.56333 33.9009 9.96 34.9776 9.96C35.6689 9.96 36.2129 9.74467 36.6096 9.314L38.6496 10.487C37.8223 11.6543 36.5869 12.238 34.9436 12.238C33.5269 12.238 32.3823 11.813 31.5096 10.963C30.6596 10.113 30.2346 9.042 30.2346 7.75C30.2346 6.48067 30.6539 5.41533 31.4926 4.554C32.3426 3.69267 33.4306 3.262 34.7566 3.262C35.9919 3.262 37.0176 3.69267 37.8336 4.554C38.6609 5.39267 39.0746 6.458 39.0746 7.75C39.0746 8.11267 39.0406 8.45267 38.9726 8.77ZM32.8866 6.866H36.5416C36.2923 5.97067 35.6916 5.523 34.7396 5.523C33.7536 5.523 33.1359 5.97067 32.8866 6.866ZM43.0709 3.5V5.013C43.2296 4.48033 43.5413 4.06667 44.0059 3.772C44.4819 3.47733 45.0203 3.33 45.6209 3.33V6.22C44.9863 6.118 44.4026 6.22567 43.8699 6.543C43.3373 6.849 43.0709 7.38733 43.0709 8.158V12H40.5209V3.5H43.0709ZM53.8399 10.946C52.9786 11.8073 51.9132 12.238 50.6439 12.238C49.3746 12.238 48.3092 11.8073 47.4479 10.946C46.5752 10.0733 46.1389 9.008 46.1389 7.75C46.1389 6.50333 46.5752 5.44367 47.4479 4.571C48.3206 3.69833 49.3859 3.262 50.6439 3.262C51.9019 3.262 52.9672 3.69833 53.8399 4.571C54.7126 5.44367 55.1489 6.50333 55.1489 7.75C55.1489 9.008 54.7126 10.0733 53.8399 10.946ZM48.6889 7.75C48.6889 8.33933 48.8759 8.821 49.2499 9.195C49.6239 9.569 50.0886 9.756 50.6439 9.756C51.1992 9.756 51.6639 9.569 52.0379 9.195C52.4119 8.821 52.5989 8.33933 52.5989 7.75C52.5989 7.16067 52.4119 6.679 52.0379 6.305C51.6639 5.931 51.1992 5.744 50.6439 5.744C50.0886 5.744 49.6239 5.931 49.2499 6.305C48.8759 6.679 48.6889 7.16067 48.6889 7.75ZM70.3613 3.262C71.3246 3.262 72.1066 3.585 72.7073 4.231C73.2966 4.85433 73.5913 5.70433 73.5913 6.781V12H71.0413V7.002C71.0413 6.56 70.9336 6.22 70.7183 5.982C70.5143 5.73267 70.2139 5.608 69.8173 5.608C69.3979 5.608 69.0693 5.74967 68.8313 6.033C68.6046 6.31633 68.4912 6.70733 68.4912 7.206V12H65.9413V7.002C65.9413 6.56 65.8336 6.22 65.6183 5.982C65.4143 5.73267 65.1139 5.608 64.7173 5.608C64.2979 5.608 63.9693 5.74967 63.7313 6.033C63.5046 6.31633 63.3913 6.70733 63.3913 7.206V12H60.8413V3.5H63.3913V4.282C63.8559 3.602 64.6153 3.262 65.6693 3.262C66.6553 3.262 67.3976 3.636 67.8963 4.384C68.4176 3.636 69.2393 3.262 70.3613 3.262ZM82.6104 10.946C81.7491 11.8073 80.6837 12.238 79.4144 12.238C78.1451 12.238 77.0797 11.8073 76.2184 10.946C75.3457 10.0733 74.9094 9.008 74.9094 7.75C74.9094 6.50333 75.3457 5.44367 76.2184 4.571C77.0911 3.69833 78.1564 3.262 79.4144 3.262C80.6724 3.262 81.7377 3.69833 82.6104 4.571C83.4831 5.44367 83.9194 6.50333 83.9194 7.75C83.9194 9.008 83.4831 10.0733 82.6104 10.946ZM77.4594 7.75C77.4594 8.33933 77.6464 8.821 78.0204 9.195C78.3944 9.569 78.8591 9.756 79.4144 9.756C79.9697 9.756 80.4344 9.569 80.8084 9.195C81.1824 8.821 81.3694 8.33933 81.3694 7.75C81.3694 7.16067 81.1824 6.679 80.8084 6.305C80.4344 5.931 79.9697 5.744 79.4144 5.744C78.8591 5.744 78.3944 5.931 78.0204 6.305C77.6464 6.679 77.4594 7.16067 77.4594 7.75ZM91.5328 4.299V0.0999992H94.0828V12H91.5328V11.201C90.9434 11.8923 90.0991 12.238 88.9998 12.238C87.8778 12.238 86.9201 11.8073 86.1268 10.946C85.3334 10.0847 84.9368 9.01933 84.9368 7.75C84.9368 6.492 85.3334 5.43233 86.1268 4.571C86.9314 3.69833 87.8891 3.262 88.9998 3.262C90.0991 3.262 90.9434 3.60767 91.5328 4.299ZM87.4868 7.75C87.4868 8.38467 87.6738 8.889 88.0478 9.263C88.4218 9.637 88.9091 9.824 89.5098 9.824C90.1104 9.824 90.5978 9.637 90.9718 9.263C91.3458 8.889 91.5328 8.38467 91.5328 7.75C91.5328 7.11533 91.3458 6.611 90.9718 6.237C90.5978 5.863 90.1104 5.676 89.5098 5.676C88.9091 5.676 88.4218 5.863 88.0478 6.237C87.6738 6.611 87.4868 7.11533 87.4868 7.75ZM104.267 8.77H98.2316C98.5149 9.56333 99.1949 9.96 100.272 9.96C100.963 9.96 101.507 9.74467 101.904 9.314L103.944 10.487C103.116 11.6543 101.881 12.238 100.238 12.238C98.8209 12.238 97.6762 11.813 96.8036 10.963C95.9536 10.113 95.5286 9.042 95.5286 7.75C95.5286 6.48067 95.9479 5.41533 96.7866 4.554C97.6366 3.69267 98.7246 3.262 100.051 3.262C101.286 3.262 102.312 3.69267 103.128 4.554C103.955 5.39267 104.369 6.458 104.369 7.75C104.369 8.11267 104.335 8.45267 104.267 8.77ZM98.1806 6.866H101.836C101.586 5.97067 100.986 5.523 100.034 5.523C99.0476 5.523 98.4299 5.97067 98.1806 6.866ZM108.365 3.5V5.013C108.524 4.48033 108.835 4.06667 109.3 3.772C109.776 3.47733 110.314 3.33 110.915 3.33V6.22C110.28 6.118 109.697 6.22567 109.164 6.543C108.631 6.849 108.365 7.38733 108.365 8.158V12H105.815V3.5H108.365ZM117.088 3.262C118.006 3.262 118.76 3.57367 119.349 4.197C119.961 4.83167 120.267 5.693 120.267 6.781V12H117.717V7.155C117.717 6.66767 117.581 6.288 117.309 6.016C117.037 5.744 116.68 5.608 116.238 5.608C115.739 5.608 115.348 5.761 115.065 6.067C114.793 6.36167 114.657 6.79233 114.657 7.359V12H112.107V3.5H114.657V4.299C115.167 3.60767 115.977 3.262 117.088 3.262Z" fill="url(#paint1_linear_2_181)"/>
                            </g>
                            <defs>
                                <linearGradient id="paint0_linear_2_181" x1="17.2353" y1="-1.99999" x2="106.721" y2="29.2633" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#72B2CF"/>
                                    <stop offset="1" stop-color="#E12B81"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear_2_181" x1="18.2353" y1="-2.99999" x2="107.721" y2="28.2633" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#72B2CF"/>
                                    <stop offset="1" stop-color="#E12B81"/>
                                </linearGradient>
                                <clipPath id="clip0_2_181">
                                    <rect width="120" height="14" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    <p class="font-medium text-xs ">Copyright © yaninayakusheva.com. All Rights Reserved.</p>
                </div>
                <div class="w-1/3 flex flex-col">
                    <b class="mb-2">Information</b>
                    <a href="" class="mb-1">Privacy Policy</a>
                    <a href="" class="mb-1">Terms and conditions</a>
                    <a href="" class="mb-1">Contact</a>
                </div>
                <div class="w-1/3 flex flex-col">
                    <b class="mb-2">Our Offers</b>
                    <a href="" class="mb-1">News</a>
                    <a href="" class="mb-1">Shop</a>
                </div>
                <div class="w-1/3 flex flex-col">
                    <b class="mb-2">Newsletter</b>
                    <p class="text-sm">Enjoy our newsletter to stay updated with the latest news and special sales. Let’s your email address here!</p>
                    <div class="flex">
                        <input type="text" class="bg-white h-10 border-0 outline-none text-black pl-2 hover:bg-slate-100 focus:bg-slate-200 duration-200 rounded-sm mt-4">
                    </div>
                </div>
            </div>
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
