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
