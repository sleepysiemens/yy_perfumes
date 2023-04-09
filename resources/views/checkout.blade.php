@extends('layouts.main')

@section('title')
    {{ __('Checkout order') }}
@endsection

@php
    $cartTotals = (new \App\Services\Shop\CartService())->getCart();
    $cart = Session::has('cart') ? Session::get('cart') : [];
@endphp

@section('content')
    @if (count($cart) < 1)
        <h2 class="font-bold text-2xl mt-4 mb-1">В корзине еще нет товаров</h2>
        <a href="{{ route('catalogue.index') }}" class="underline">В каталог</a>
    @else
        <div class="flex flex-wrap mt-3">
            <form action="{{ route('order.store') }}" method="post" class="lg:w-1/3 lg:mb-0 mx-auto w-full mb-5">
                @csrf
                <h1 class="text-xl font-semibold mb-5">{{ __('Checkout order') }}</h1>
                <div class="form-group">
                    <label for="" class="font-medium">{{ __('Name') }}</label>
                    <input type="text" name="name" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder="{{ __('Enter name') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="" class="font-medium">{{ __('Email') }}</label>
                    <input type="email" name="email" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder="{{ __('Enter email') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="" class="font-medium">{{ __('Country') }}</label>
                    <input type="text" name="country" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder="{{ __('Country') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="" class="font-medium">{{ __('Address') }}</label>
                    <input type="text" name="address" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder="{{ __('Address') }}">
                </div>
                <div class="my-3 mb-5">
                    <a href="">{{ __('When placing an order, I agree to the terms') }}</a>
                </div>
                <button class="to-cart-btn whitespace-nowrap p-2 px-5 bg-zinc-900 hover:bg-zinc-700 active:scale-95 text-white duration-200 flex items-center">{{ __('Confirm order') }}</button>
            </form>
            <div class="lg:w-1/3 w-full">
                @php
                    $cart = Session::has('cart') ? Session::get('cart') : [];
                    $cartTotals = (new \App\Services\Shop\CartService())->getCart();
                @endphp
                @if (count($cart) > 0)
                    @foreach ($cart as $item => $itemArray)
                        @php
                            $product = $item != 'undefined' && isset($item) ? \App\Models\Product::find($item) : null;
                        @endphp

                        @if ($product)
                            <div class="flex items-start justify-between my-5 py-5 border-t border-b">
                                <div class="flex items-center">
                                    <img src="/storage/products/{{ $product->img }}" class="rounded-sm" width="50px" alt="">
                                    <div class="ml-4">
                                        <div class="flex">
                                            <h2 class="font-bold text-2xl">{{ $product->getTitle() }}</h2>
                                            <div class="flex items-center justify-center p-1 px-3 rounded-md ml-3 text-sm bg-gray-200">{{ $itemArray }}</div>
                                        </div>
                                        <p class="text-md">{{ $product->getDescription() }}</p>
                                    </div>
                                </div>
                                <div class="flex pr-3 flex-col">
                                    {{ $product->getFormatedPrice() }}
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="flex justify-start">
                        <div class="flex items-start">
                            <span class="">{{ __('Total') }}:</span>
                            <span class="font-bold ml-2">{{ $cartTotals['currency'] }} {{ $cartTotals['total'] }}</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection
