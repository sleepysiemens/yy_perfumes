@extends('layouts.main')

@section('title')
    {{ __('Cart') }}
@endsection

@php
    $cartTotals = (new \App\Services\Shop\CartService())->getCart();
@endphp

@section('content')
    <div class="breadcrumb mb-6">
        <a href="{{ route('shop') }}" class="underline hover:no-underline">{{ __('Shop') }}</a>
        /
        <a href="{{ route('catalogue.index') }}" class="underline hover:no-underline">{{ __('Catalogue') }}</a>
        /
        {{ __('Cart') }}
    </div>

    @if (count($cart) > 0)
        @foreach ($cart as $item => $itemArray)
            @php
                $product = $item != 'undefined' && isset($item) ? \App\Models\Product::find($item) : null;
            @endphp

            @if ($product)
                <div class="flex items-start justify-between my-5 py-5 border-t border-b">
                    <div class="flex items-start">
                        <img src="/storage/products/{{ $product->img }}" class="rounded-sm" width="80px" alt="">
                        <div class="ml-4">
                            <div class="flex">
                                <h2 class="font-bold text-2xl">{{ $product->getTitle() }}</h2>
                                <div class="flex items-center justify-center p-1 px-3 rounded-md ml-3 text-sm bg-gray-200">{{ $itemArray }}</div>
                            </div>
                            <p class="text-md">{{ $product->getDescription() }}</p>
                            <span class="font-semibold">
                                {{ $product->getFormatedPrice() }}
                            </span>
                        </div>
                    </div>
                    <div class="flex pr-3 flex-col">
                        {{--                    <input type="text" class="w-15 text-sm text-center py-1 px-5 bg-gray-100 outline-none">--}}
                        <a href="{{ route('cart.remove', $product->id) }}">
                            <svg width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 7 4 C 6.744125 4 6.4879687 4.0974687 6.2929688 4.2929688 L 4.2929688 6.2929688 C 3.9019687 6.6839688 3.9019687 7.3170313 4.2929688 7.7070312 L 11.585938 15 L 4.2929688 22.292969 C 3.9019687 22.683969 3.9019687 23.317031 4.2929688 23.707031 L 6.2929688 25.707031 C 6.6839688 26.098031 7.3170313 26.098031 7.7070312 25.707031 L 15 18.414062 L 22.292969 25.707031 C 22.682969 26.098031 23.317031 26.098031 23.707031 25.707031 L 25.707031 23.707031 C 26.098031 23.316031 26.098031 22.682969 25.707031 22.292969 L 18.414062 15 L 25.707031 7.7070312 C 26.098031 7.3170312 26.098031 6.6829688 25.707031 6.2929688 L 23.707031 4.2929688 C 23.316031 3.9019687 22.682969 3.9019687 22.292969 4.2929688 L 15 11.585938 L 7.7070312 4.2929688 C 7.5115312 4.0974687 7.255875 4 7 4 z"/></svg>
                        </a>
                    </div>
                </div>
            @endif
        @endforeach

        <div class="flex justify-between flex-wrap">
            <div class="flex items-start sm:w-fit sm:mb-0 mb-4 w-full">
                <span class="">{{ __('Total') }}:</span>
                <span class="font-bold ml-2">{{ $cartTotals['currency'] }} {{ $cartTotals['total'] }}</span>
            </div>
            <div class="sm:w-fit w-full">
                <a href="{{ route('checkout') }}">
                    <button class="to-cart-btn whitespace-nowrap p-2 px-5 bg-zinc-900 hover:bg-zinc-700 active:scale-95 text-white duration-200 flex items-center">
                        {{ __('Continue checkout') }}
                    </button>
                </a>
            </div>
        </div>
    @else
        <h2 class="font-bold text-2xl mt-4 mb-1">В корзине еще нет товаров</h2>
        <a href="{{ route('catalogue.index') }}" class="underline">В каталог</a>
    @endif
@endsection
