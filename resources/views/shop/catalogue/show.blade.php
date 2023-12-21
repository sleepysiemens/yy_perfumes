@extends('layouts.main')

@section('title')
    {{ __('Order') . " " . $product->getTitle() . " " . __('from shop') }} {{ \Illuminate\Support\Facades\Config::get('app.name') }}
@endsection

@section('og-title')
    Закажите {{ $product->title['ru'] }} в магазине Парфюмерия Янины Якушевой | Янина Якушева Парфюмерия - Сделано во Франции
@endsection

@section('seo-description'){{ str_replace(["\n", '    ', '      ', '  '], ' ', $product->description['ru']) }}@endsection
@section('og-description'){{ str_replace(["\n", '    ', '      ', '  '], ' ', $product->description['ru']) }}@endsection

@section('og-image'){{ config('app.url') . $product->getImage() }}@endsection

@section('content')
    <div class="py-5">
        <div class="breadcrumb mb-6">
            <a href="{{ route('catalogue.index') }}" class="underline hover:no-underline">{{ __('Shop') }}</a> / {{ $product->getTitle() }}
        </div>
        <div class="flex lg:flex-row flex-wrap sm:flex-row flex-col sm:justify-start justify-start sm:flex-row">
            <a data-fancybox data-src="{{ $product->getImage() }}" data-caption="{{ $product->getTitle() }}" href="{{ $product->getImage() }}" class="block--gallery"><img src="{{ $product->getImage() }}" class="sm:mb-0 mb-5" width="300px" alt=""></a>
            <div class="flex flex-col sm:ml-12">
                <h1 class="font-bold text-xl mb0">{{ $product->getTitle() }}</h1>
                @if($product->vendor_code!=NULL)
                    <p class="vendor_code mt-0" style="font-size: 13px;color:rgba(0,0,0,.5);">{{ __('Vendor code: ') }}{{$product->vendor_code}}</p>
                @endif
                <p class="mt-2">{{ $product->getFormatedPrice() }}</p>
                <div class="flex items-center mt-4">
                    @if ((new \App\Services\Shop\CartService())->checkExists($product->id))
                        {{-- =================================== NO PRODUCTS IN CART =================================== --}}
                        <a href="{{ route('cart.view') }}">
                            <button class="whitespace-nowrap p-2 px-5 bg-gray-100 hover:bg-gray-300 active:scale-95 text-black duration-200 flex items-center">
                                {{ __('In cart') }}
                            </button>
                        </a>
                        @php
                            $cart=(new \App\Services\Shop\CartService())->getCart();
                        @endphp
                        <input type="number" id="product_amount_{{$product->id}}" class="border h-10 w-14 text-center outline-none focus:bg-slate-100 duration-200" min="1" max="100" value="{{$cart['cart'][$product->id]}}" onchange="press_btn()">
                        <a href="{{ route('cart.remove', $product->id) }}" style="height: 100%;">
                            <button class="whitespace-nowrap p-2 px-5 bg-gray-100 hover:bg-gray-300 active:scale-95 text-black duration-200 flex items-center" style="height: 100%">
                                <svg width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 7 4 C 6.744125 4 6.4879687 4.0974687 6.2929688 4.2929688 L 4.2929688 6.2929688 C 3.9019687 6.6839688 3.9019687 7.3170313 4.2929688 7.7070312 L 11.585938 15 L 4.2929688 22.292969 C 3.9019687 22.683969 3.9019687 23.317031 4.2929688 23.707031 L 6.2929688 25.707031 C 6.6839688 26.098031 7.3170313 26.098031 7.7070312 25.707031 L 15 18.414062 L 22.292969 25.707031 C 22.682969 26.098031 23.317031 26.098031 23.707031 25.707031 L 25.707031 23.707031 C 26.098031 23.316031 26.098031 22.682969 25.707031 22.292969 L 18.414062 15 L 25.707031 7.7070312 C 26.098031 7.3170312 26.098031 6.6829688 25.707031 6.2929688 L 23.707031 4.2929688 C 23.316031 3.9019687 22.682969 3.9019687 22.292969 4.2929688 L 15 11.585938 L 7.7070312 4.2929688 C 7.5115312 4.0974687 7.255875 4 7 4 z"/></svg>
                            </button>
                        </a>
                        <button class="to-cart-btn" style="display: none" data-product-price="{{ $product->getPrice() }}" data-product-id="{{ $product->id }}"></button>
                    @else
                        {{-- =================================== PRODUCTS IN CART =================================== --}}
                        <button class="to-cart-btn whitespace-nowrap p-2 px-5 bg-slate-900 hover:bg-slate-700 active:scale-95 text-white duration-200"
                                data-product-price="{{ $product->getPrice() }}"
                                data-product-id="{{ $product->id }}">
                            {{ __('Add to cart') }}
                        </button>
                        <input type="number" id="product_amount_{{$product->id}}" class=" border h-10 w-14 text-center outline-none focus:bg-slate-100 duration-200" min="1" max="100" value="1">
                        <a href="{{ route('cart.remove', $product->id) }}" style="height: 100%;" class="del-btn-hidden" id="del_btn">
                            <button class="whitespace-nowrap p-2 px-5 bg-gray-100 hover:bg-gray-300 active:scale-95 text-black duration-200 flex items-center" style="height: 100%">
                                <svg width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 7 4 C 6.744125 4 6.4879687 4.0974687 6.2929688 4.2929688 L 4.2929688 6.2929688 C 3.9019687 6.6839688 3.9019687 7.3170313 4.2929688 7.7070312 L 11.585938 15 L 4.2929688 22.292969 C 3.9019687 22.683969 3.9019687 23.317031 4.2929688 23.707031 L 6.2929688 25.707031 C 6.6839688 26.098031 7.3170313 26.098031 7.7070312 25.707031 L 15 18.414062 L 22.292969 25.707031 C 22.682969 26.098031 23.317031 26.098031 23.707031 25.707031 L 25.707031 23.707031 C 26.098031 23.316031 26.098031 22.682969 25.707031 22.292969 L 18.414062 15 L 25.707031 7.7070312 C 26.098031 7.3170312 26.098031 6.6829688 25.707031 6.2929688 L 23.707031 4.2929688 C 23.316031 3.9019687 22.682969 3.9019687 22.292969 4.2929688 L 15 11.585938 L 7.7070312 4.2929688 C 7.5115312 4.0974687 7.255875 4 7 4 z"/></svg>
                            </button>
                        </a>
                        <button class="to-cart-btn" style="display: none" data-product-price="{{ $product->getPrice() }}" data-product-id="{{ $product->id }}"></button>
                    @endif
                </div>
                <hr class="my-5">
                <!-- PERSON -->
                <h3 class="text-lg">{{ __('Ravenna') }}</h3>
                <a href="" class="border-b text-teal-500 text-sm w-fit border-teal-500 duration-100 hover:border-transparent font-medium">{{ __('My universe') }}</a>
                @if($product->weight!=NULL)
                    <p class="mt-3">{{ __('Weight: ') }}{{$product->weight}}{{ __('g') }}</p>
                @endif
            </div>
            <div class="flex flex-col xs:items-end xs:mt-0 mt-4 sm:ml-12 ms:block w-64">
                <div class="w-fit">
                    <a href="{{ route('contact') }}" class="border-b text-sm w-fit border-900 duration-100 hover:border-transparent font-medium block">Связаться с нами</a>
                    <a href="{{ route('store-locator') }}" class="border-b text-sm w-fit border-900 duration-100 hover:border-transparent font-medium mt-2">Ближайшие магазины</a>
                    @if($product->barcode!=NULL)
                        <p class="barcode mt-5">{{$product->barcode}}</p>
                    @endif
                </div>
            </div>
        </div>

        <hr class="my-10 mb-8">

        <h2 class="mb-3 text-lg font-semibold">{{ __('Description') }}</h2>
        {!! $product->getDescription() !!}

        <hr class="my-10 mb-8">

        <div class="my-8 flex sm:justify-around flex-wrap mt-8">
            <div class="flex items-center lg:w-1/3 w-full my-3">
                <img src="https://yaninayakusheva.com/wp-content/uploads/2018/06/policy-1.png" alt="" class="mr-3">
                <div class="flex flex-col">
                    <span class="text-base my-0">{{ __('Free Shipping') }}</span>
                    <span class="text-sm my-0 max-w-xs">{{ __('Free shipping on all US order or order above $200') }}</span>
                </div>
            </div>
            <div class="flex items-center lg:w-1/3 w-full my-3">
                <img src="https://yaninayakusheva.com/wp-content/uploads/2018/06/policy-2.png" alt="" class="mr-3">
                <div class="flex flex-col">
                    <span class="text-base my-0">{{ __('Support 24/7') }}</span>
                    <span class="text-sm my-0 max-w-md">{{ __('Contact us 24 hours a day, 7 days a week') }}</span>
                </div>
            </div>
            <div class="flex items-center lg:w-1/3 w-full my-3">
                <img src="https://yaninayakusheva.com/wp-content/uploads/2018/06/policy-4.png" alt="" class="mr-3">
                <div class="flex flex-col">
                    <span class="text-base my-0">{{ __('100% Payment Secure') }}</span>
                    <span class="text-sm my-0 max-w-md">{{ __('We ensure secure payment with PEV') }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var blocks = ['.block--description', '.block--gallery'];

        var style = document.createElement('link');
        style.rel = 'stylesheet';
        style.href = 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css';
        document.getElementsByTagName('head')[0].appendChild(style);

        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js';
        script.addEventListener('load', function () {
            var fancyBoxClass = 'image-fancybox';
            blocks.forEach(function (block) {
                $(block)
                    .find('[data-bg]')
                    .toArray()
                    .forEach(function (element) {
                        var url = element.getAttribute('data-bg')
                            .replace('url(', '')
                            .replace(')', '')
                            .replace('"', '')
                            .trim();
                        if (url === '') {
                            return;
                        }
                        $(element)
                            .parent()
                            .wrap('<a style="width: 100%; height: 100%;" class="' + fancyBoxClass + '" href="' + url + '"></a>');
                    });
            });

            $('.' + fancyBoxClass)
                .fancybox();
        }, false);
        document.getElementsByTagName('body')[0].appendChild(script);
    </script>
    <script>
        $('.to-cart-btn').on('click', function () {
            $(this).html('{{ __('In cart') }}');
            $(this).addClass('in-basket');
            $('#del_btn').removeClass('del-btn-hidden');
        });
    </script>
@endpush
