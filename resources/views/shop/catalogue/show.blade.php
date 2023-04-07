@extends('layouts.main')

@section('title')
    {{ __('Order') . " " . $product->getTitle() . " " . __('from shop') }} {{ \Illuminate\Support\Facades\Config::get('app.name') }}
@endsection

@section('content')
    <div class="py-5">
        <div class="breadcrumb mb-6">
            <a href="{{ route('catalogue.index') }}" class="underline hover:no-underline">{{ __('Shop') }}</a> / {{ $product->getTitle() }}
        </div>
        <div class="flex lg:flex-row lg:justify-start sm:justify-center sm:flex-row">
            <img src="/storage/products/{{ $product->img }}" width="300px" alt="">
            <div class="flex flex-col ml-12">
                <h1 class="font-bold text-xl">{{ $product->getTitle() }}</h1>
                <p class="mt-2">{{ $product->getFormatedPrice() }}</p>
                <div class="flex items-center mt-4">
                    @if ((new \App\Services\Shop\CartService())->checkExists($product->id))
                        <a href="{{ route('cart.view') }}">
                            <button class="to-cart-btn whitespace-nowrap p-2 px-5 bg-gray-100 hover:bg-gray-300 active:scale-95 text-black duration-200 flex items-center">
                                {{ __('Add to cart') }}
                            </button>
                        </a>
                    @else
                        <input type="text" class="border h-10 w-14 text-center outline-none focus:bg-slate-100 duration-200" min="1" max="100" value="1">
                        <button class="to-cart-btn whitespace-nowrap p-2 px-5 bg-slate-900 hover:bg-slate-700 active:scale-95 text-white duration-200"
                                data-product-price="{{ $product->getPrice() }}"
                                data-product-id="{{ $product->id }}">
                            {{ __('Add to cart') }}
                        </button>
                    @endif
                </div>
                <hr class="my-5">
                <!-- PERSON -->
                <h3 class="text-lg">Ravenna</h3>
                <a href="" class="border-b text-teal-500 text-sm w-fit border-teal-500 duration-100 hover:border-transparent font-medium">My universe</a>
            </div>
        </div>

        <hr class="my-10 mb-8">

        <h2 class="mb-3 text-lg font-semibold">{{ __('Description') }}</h2>
        {!! $product->getDescription() !!}

        <hr class="my-10 mb-8">

        <div class="my-8 flex sm:justify-around">
            <div class="flex items-center">
                <img src="https://yaninayakusheva.com/wp-content/uploads/2018/06/policy-1.png" alt="" class="mr-3">
                <div class="flex flex-col">
                    <span class="text-base my-0">Бесплатная доставка</span>
                    <span class="text-sm my-0 max-w-xs">Бесплатная доставка при любом заказе в США или на сумму свыше 200 долларов</span>
                </div>
            </div>
            <div class="flex items-center">
                <img src="https://yaninayakusheva.com/wp-content/uploads/2018/06/policy-2.png" alt="" class="mr-3">
                <div class="flex flex-col">
                    <span class="text-base my-0">Поддержка 24/7</span>
                    <span class="text-sm my-0 max-w-md">Поддержка на связи круглосуточно</span>
                </div>
            </div>
            <div class="flex items-center">
                <img src="https://yaninayakusheva.com/wp-content/uploads/2018/06/policy-4.png" alt="" class="mr-3">
                <div class="flex flex-col">
                    <span class="text-base my-0">100% Платежная безопасность</span>
                    <span class="text-sm my-0 max-w-md">Мы обеспечиваем безопасную оплату с помощью PEV</span>
                </div>
            </div>
        </div>
    </div>
@endsection
